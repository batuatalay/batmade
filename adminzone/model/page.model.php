<?php
class PageModel extends Mysql
{
	private $id;
	private $category_id;
	private $code;
	private $title;
	private $content;
	private $file;

	private $pdo;
	private $tableName = "PAGES";
	private $process;

	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}

	public function get($order = "") {		
		if($this->id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE id = ? " . $order);
			$result->execute([$this->id]); 
			$blogs = $result->fetch(PDO::FETCH_ASSOC);
		} else if($this->process == "Last") {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." ORDER BY ID DESC LIMIT 1 " . $order);
			$result->execute(); 
			$blogs = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." " . $order);
			$result->execute(); 
			$blogs = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $blogs;
		
	}

	public function save() {
		$this->code = self::seflink($this->title);
		if($this->process == "New") {
			$sql = "INSERT INTO " . $this->tableName . " (category_id, code, title, content, file) VALUES (?, ?, ?, ?, ?) ";
			$manager = $this->pdo->prepare($sql);
			$status = $manager->execute([$this->category_id, $this->code, $this->title, $this->content, $this->file]);
			if($status === false) {
				return ['code' => 400, 'message' => $manager->errorInfo()];
			} else {
				return ['code' => 200, 'message' => 'Başarılı'];
			}
		}
		else {
			$sql = "UPDATE " . $this->tableName . " SET category_id=?, code=?, title = ?, content = ?, file = ? WHERE id = ?";
			$manager = $this->pdo->prepare($sql);
			$status = $manager->execute([$this->category_id, $this->code, $this->title, $this->content, $this->file, $this->id]);
			if($status === false) {
				return ['code' => 400, 'message' => $manager->errorInfo()];
			} else {
				return ['code' => 200, 'message' => 'Başarılı'];
			}
		}
	}

	public function delete() {
		$sql = "DELETE FROM " . $this->tableName . " WHERE id = ?";
		$category = $this->pdo->prepare($sql);
		$status = $category->execute([$this->id]);
		if($status === false) {
			return ['code' => 400, 'message' => $category->errorInfo()];
		} else {
			return ['code' => 200, 'message' => 'Başarılı'];
		}
	}
}