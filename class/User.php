<?php 
require_once __DIR__ . "/../connect_db.php";//pdo接続用 
class User{
	protected $uuid;
	
	//コンストラクタ。ユニークキーの種類、ユニークキーの値を受け取り、個人を特定する。
	function __construct($dataType,$dataBody){
		//dataTypeはemail,uuidから指定。
		if($dataType == "uuid"){
			$this->uuid = $dataBody;
		}else if($dataType == "email"){
			$pdo = connect();
			$sql = "SELECT * FROM userdata WHERE EMAIL = :email";
			$statement = $pdo->prepare($sql);
			$statement->bindValue(':email',$dataBody,PDO::PARAM_STR);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$this->uuid = $row['UUID'];
			//echo ($this->uuid);
		}
	}
	//メソッドの定義
	//uuidを取得
	function uuid(){
		return $this->uuid;
	}
	//メールアドレスを取得
	function email(){
		$pdo = connect();
		$sql = "SELECT * FROM userdata WHERE UUID = :uuid";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':uuid',$this->uuid,PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		return $row['EMAIL'];
	}
}