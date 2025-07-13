<?php
class MainModel extends Mysql
{
	private $id;
	private $attr;
	private $value;
	private $tableName = "DASHBOARD";

	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}

	public function get() {
		$result = $this->pdo->prepare("SELECT attr, value FROM " . $this->tableName);
		$result->execute(); 
		$site_settings = $result->fetchAll(PDO::FETCH_ASSOC);
		return $site_settings;	
	}

	public function save() {
		$sql = "INSERT INTO " . $this->tableName . " (attr, value) VALUES (?, ?)";
		$projectProperty  = $this->pdo->prepare($sql);
		$status = $projectProperty->execute([ $this->attr, $this->value]);
		if($status === false) {
			return ['code' => 400, 'message' => $projectProperty->errorInfo()];
		} else {
			return ['code' => 200, 'message' => "Ekleme işlemi başarılı"];
		}
	}
	public function delete() {
		$sql = "DELETE FROM " . $this->tableName;
		$projectProperty  = $this->pdo->prepare($sql);
		$status = $projectProperty->execute([$this->pid]);
		if($status === false) {
			return ['code' => 400, 'message' => $projectProperty->errorInfo()];
		} else {
			return ['code' => 200, 'message' => "Başarıyla silindi"];
		}
	}
}

?>