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
		if($this->category_id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE category_id = ? " . $order);
			$result->execute([$this->category_id]); 
			$pages = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if($this->code) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE code = ?");
			$result->execute([$this->code]); 
			$pages = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." " . $order);
			$result->execute(); 
			$pages = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $pages;
		
	}
}