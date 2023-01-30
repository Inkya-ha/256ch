<?php 
require_once __DIR__ . "/../connect_db.php";//pdo接続用 
class Thread{

    //スレッドID
	protected $threadId;
	
	//スレッド番号を受け取り代入するコンストラクタ。
	function __construct($threadId){
        $this->threadId = $threadId;
	}

	//メソッドの定義
	//現在のスレ内レス数を返すメソッド。
	function less_count_(){
        $pdo = connect();
		$sql = "SELECT * FROM contribution_list WHERE  thread_id = :threadid";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':threadid',$this->threadId,PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		return count($row);
	}
}