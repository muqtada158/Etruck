<?PHP
	//DATABASE DEFINITION PAGE//
	class user{
		//change these credentials according to your hosting credentials.
		public $localhost = "localhost";
		public $username = "root";
		public $password = "";
		public $database = "etruck";
		public $con = "";
		
		function __construct()
		{
			$this->con = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
		}
	}
?>