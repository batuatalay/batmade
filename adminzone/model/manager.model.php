<?php
class ManagerModel extends Mysql
{
	private $id;
	private $name;
	private $phone;
	private $username;
	private $password;
	private $status;
	private $lastLogin;
	private $tableName = "MANAGERS";
	private $process;
	
	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}
	public function get() {
		if($this->username) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE username = ?");
			$result->execute([$this->username]); 
			$managers = $result->fetch(PDO::FETCH_ASSOC);
		}else if($this->id) {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName ." WHERE id = ?");
			$result->execute([$this->id]); 
			$managers = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $this->pdo->prepare("SELECT * FROM " . $this->tableName);
			$result->execute(); 
			$managers = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $managers;
		
	}

	public function save() {
		if($this->process == "New") {
			$sql = "INSERT INTO " . $this->tableName . " (name, phone, username, password, status) VALUES (?, ?, ?, ?, ?) ";
			$manager = $this->pdo->prepare($sql);
			$status = $manager->execute([$this->name, $this->phone, $this->username, $this->password, $this->status]);
			if($status === false) {
				return ['code' => 400, 'message' => "Bu kullanıcı adı mevcut lütfen başka bir kullanıcı adı belirleyin"];
			} else {
				return ['code' => 200, 'message' => 'Başarılı'];
			}
		}
		else {
			$sql = "UPDATE " . $this->tableName . " SET name = ?, phone = ?, username = ?, password = ?, status = ?, lastLogin = ? WHERE id = ?";
			$manager = $this->pdo->prepare($sql);
			$status = $manager->execute([$this->name, $this->phone, $this->username, $this->password, $this->status, $this->lastLogin, $this->id]);
			if($status === false) {
				return ['code' => 400, 'message' => $manager->errorInfo()];
			} else {
				return ['code' => 200, 'message' => 'Başarılı'];
			}
		}
		

	}
}