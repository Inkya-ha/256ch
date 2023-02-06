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
	function less_count(){
        $pdo = connect();
		$sql = "SELECT * FROM contribution_list WHERE  thread_id = :threadid";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':threadid',$this->threadId,PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		return count($row);
	}
	//内容,投稿者を受け取って、レスを投稿する。
	function new_less($body,$uuid){
		$pdo = connect();
		$currentTime = (new DateTime())->format('y.m.d H:i:s');//現在時刻を取得
        $sql = "INSERT INTO contribution_list (thread_id,less_id,body,contributor_uuid,time,deleted) VALUES (:threadid,:lessid,:body,:uuid,:time,0)";
        $statement = $pdo->prepare($sql);
		$statement->bindValue(':threadid',$this->threadId,PDO::PARAM_STR);
        $statement->bindValue(':lessid',(($this->less_count())+1),PDO::PARAM_STR);
        $statement->bindValue(':body',$body,PDO::PARAM_STR);
        $statement->bindValue(':uuid',$uuid,PDO::PARAM_STR);
		$statement->bindValue(':time',$currentTime,PDO::PARAM_STR);
        $statement->execute();
	}
	//スレ内投稿を配列形式で返す
	function less_list(){
		$pdo = connect();
		$sql = "SELECT * FROM contribution_list WHERE  thread_id = :threadid";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':threadid',$this->threadId,PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);

		
		for($i=0;$i<count($row);$i++){
			$list[$row[$i]['less_id']]['uuid']=$row[$i]['contributor_uuid'];
			$list[$row[$i]['less_id']]['time']=$row[$i]['time'];
			//削除した場合に削除の反映
			if($row[$i]['deleted'] ==0){
				$list[$row[$i]['less_id']]['body']=$row[$i]['body'];
			}else{
				$list[$row[$i]['less_id']]['body']='この投稿は削除されました。';
			}
		}
		
		return $list;
	}
}