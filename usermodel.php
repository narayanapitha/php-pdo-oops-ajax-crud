
require_once '/connection.php';

class UserModel{
	public $conn;

	public function __construct(){
		$this->conn = Connection::getinstance();
	}


	public function getUserInfo(){
		
		$userquery= "select * from ht_users";
		$stmt = $this->conn->prepare($userquery);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
		$data = $stmt->fetchAll();

		return $data;
	}

	public function updateUserInfo($mobile,$id){
		
		$userquery= "update ht_users set mobile = :mobile where user_id=:id;";
		$stmt = $this->conn->prepare($userquery);
		$params = array(':mobile'=>$mobile, ':id'=>$id);
		
		$data = $stmt->execute($params);
		if($data){
			return array('status'=>'ok','message'=>'Success');
		}else{
			return array('error'=>'fail' , 'message'=>'something wrong');
		}
	}

	public function deleteUserInfo($id){
		
		$userquery= "delete  from ht_users where user_id=:id;";
		$stmt = $this->conn->prepare($userquery);
		$params = array(':id'=>$id);
		
		$data = $stmt->execute($params);
		if($data){
			return array('status'=>'ok','message'=>'Success');
		}else{
			return array('error'=>'fail' , 'message'=>'something wrong');
		}
	}

}
