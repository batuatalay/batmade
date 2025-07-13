<?php
class CategoryModel extends Mysql
{
	private $id;
	private $parent_id;
	private $code;
	private $title;
	private $isMain;
	private $active = "1";
	private $pdo;
	private $tableName = "CATEGORIES";
	private $process;


	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}

	public function get($order = "") {
		if($this->code) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE code = ? " . $order);
			$result->execute([$this->code]); 
			$categories = $result->fetch(PDO::FETCH_ASSOC);
		} else if($this->parent_id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where parent_id = ? " . $order);
			$result->execute([$this->parent_id]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if (gettype($this->isMain) == "string" && gettype($this->active) == "string" ) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where isMain = ? and active = ? " . $order);
			$result->execute([$this->isMain, $this->active]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if (gettype($this->isMain) == "string") {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where isMain = ? " . $order);
			$result->execute([$this->isMain]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if($this->id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE id = ? " . $order);
			$result->execute([$this->id]); 
			$categories = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." " . $order);
			$result->execute(); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $categories;
		
	}

	public function save() {
		$this->code = self::seflink($this->title);
		if($this->process == "New") {
			$sql = "INSERT INTO " . $this->tableName . " (parent_id, code, title, isMain, active) VALUES (?, ?, ?, ?, ?) ";
			$category = $this->pdo->prepare($sql);
			$status = $category->execute([$this->parent_id, $this->code, $this->title, $this->isMain, $this->active]);
			if($status === false) {
				return ['code' => 400, 'message' => $category->errorInfo()];
			} else {
				return ['code' => 200, 'message' => 'Başarılı'];
			}
		}
		else {
			$sql = "UPDATE " . $this->tableName . " SET parent_id = ?, code = ?, title = ?, isMain = ?, active = ? WHERE id = ?";
			$category = $this->pdo->prepare($sql);
			$status = $category->execute([$this->parent_id, $this->code, $this->title, $this->isMain, $this->active, $this->id]);
			if($status === false) {
				return ['code' => 400, 'message' => $category->errorInfo()];
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