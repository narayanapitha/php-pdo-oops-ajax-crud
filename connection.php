class Connection{

	protected static $instance;
	private static $dsn = 'mysql:host=localhost;dbname=test';
	private static $username ='root';
	private static $password = 'root';

	private function __construct(){
		try{
			self::$instance = new PDO (self::$dsn, self::$username, self::$password);
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}catch(PDOException $e){
			echo "Mysql Connection Error :" .$e->getMessge();
		}
	}

	public static function getinstance(){
		if(!self::$instance){
			new Connection();
		}
		return self::$instance;
	}
}
