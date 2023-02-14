<!--

脆弱性テスト求む
陰キャ男子

-->

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
		$statement->bindValue(':threadid',htmlspecialchars($this->threadId, ENT_QUOTES),PDO::PARAM_STR);
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
		$statement->bindValue(':threadid',htmlspecialchars($this->threadId, ENT_QUOTES),PDO::PARAM_STR);
        $statement->bindValue(':lessid',(($this->less_count())+1),PDO::PARAM_STR);
        $statement->bindValue(':body',htmlspecialchars($body, ENT_QUOTES),PDO::PARAM_STR);
        $statement->bindValue(':uuid',htmlspecialchars($uuid, ENT_QUOTES),PDO::PARAM_STR);
		$statement->bindValue(':time',htmlspecialchars($currentTime, ENT_QUOTES),PDO::PARAM_STR);
        $statement->execute();
	}
	//スレ内投稿を配列形式で返す
	function less_list(){
		$pdo = connect();
		$sql = "SELECT * FROM contribution_list WHERE  thread_id = :threadid";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':threadid',htmlspecialchars($this->threadId, ENT_QUOTES),PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);

		$list = array(); // create the array to hold the post data
		
		for($i=0;$i<count($row);$i++){
			$list[$row[$i]['less_id']]['uuid']=htmlspecialchars($row[$i]['contributor_uuid'], ENT_QUOTES);
			$list[$row[$i]['less_id']]['time']=htmlspecialchars($row[$i]['time'], ENT_QUOTES);
			//削除した場合に削除の反映
			if($row[$i]['deleted'] ==0){
				$list[$row[$i]['less_id']]['body']=htmlspecialchars($row[$i]['body'], ENT_QUOTES);
			}else{
				$list[$row[$i]['less_id']]['body']='この投稿は削除されました。';
			}
		}
		
		return $list;
	}
}
