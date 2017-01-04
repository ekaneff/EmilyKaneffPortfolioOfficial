<?

class auth extends AppController {
	public function __construct($parent) {
		$this->parent = $parent;

	}

	public function login() {

		if($_REQUEST["username"] && $_REQUEST["password"]) {
			$data = $this->parent->getModel("users")->select("select * from users where username = :username and password = :password", array(":username"=>$_REQUEST["username"], ":password"=>sha1($_REQUEST["password"])));

			if ($data) {
				$_SESSION["loggedin"] = 1;
				header("location:/main");
			} else {
				header("location:/main?msg=Bad Login");
			}
		}
	}

		// $myfilestring = fopen("./assets/users.txt", "r");
		// if ($myfilestring) {
		// 	//var_dump(file_get_contents("./assets/fruits.txt"));
		// 	//echo "file found";
		// 	//var_dump(fgets($myfilestring));
		// 	//readfile("./assets/fruits.txt");

		// 	foreach(file("./assets/users.txt") as $x) {
		// 		//echo $x;
		// 		//check for conditions within this for loop
		// 		$strArray = explode("|", $x); 

		// 		if ($_REQUEST["username"] == $strArray[0]) {

		// 			if ($_REQUEST["password"] == $strArray[1]) {
						
		// 				$_SESSION["loggedin"]=1;

		// 				$_SESSION["par"] = $strArray[2];

		//  				header("location:/main");

		//  				return;
		// 			}
	
		//  		} else {

		// 		 	header("location:/main?msg=Bad login");
		// 		}
		// 	}

		// } 


		//recieve username and password from the form
		// if(@$_REQUEST["username"] && @$_REQUEST["password"]) {

		// 	if($_REQUEST["username"] == "mike@aol.com" && $_REQUEST["password"] == "password") {

		// 		//set sessions
		// 		$_SESSION["loggedin"]=1;

		// 		header("location:/main");

		// 	} else {

		// 		header("location:/main?msg=Bad login"); 
		// 	}

		// } else {

		// 	header("location:/main?msg=Bag login");
		// }

	public function logout() {
		session_destroy();

		header("location:/main");
	}
}


?>