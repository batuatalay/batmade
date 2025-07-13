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
		if (gettype($this->isMain) == "string" && gettype($this->active) == "string" && empty($this->parent_id) == false) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where isMain = ? and active = ?  and parent_id = ? " . $order);
			$result->execute([$this->isMain, $this->active, $this->parent_id]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if (gettype($this->isMain) == "string" && gettype($this->active) == "string" ) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where isMain = ? and active = ? " . $order);
			$result->execute([$this->isMain, $this->active]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		} else if($this->code) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE code = ? " . $order);
			$result->execute([$this->code]); 
			$categories = $result->fetch(PDO::FETCH_ASSOC);
		} else if($this->parent_id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName . " Where parent_id = ? " . $order);
			$result->execute([$this->parent_id]); 
			$categories = $result->fetchAll(PDO::FETCH_ASSOC);
		}   else if (gettype($this->isMain) == "string") {
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
}