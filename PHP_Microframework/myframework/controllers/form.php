<?
class form extends AppController{

	public function __construct($pars) {

		//var_dump($pars);

	}

	public function index($pars){
		//$this->getView("header",array("pagename"=>"home"));
	$pars = $pars->urlPathParts[0];
		$buttons = array(
			"main"=>array("pagename"=>"main","title"=>"home title","link"=>"/main","urlname"=>$pars),
			"carousel"=>array("pagename"=>"carousel","title"=>"car title","link"=>"/carousel","urlname"=>$pars),
			"form"=>array("pagename"=>"form","title"=>"form","link"=>"/form","urlname"=>$pars),
			"about"=>array("pagename"=>"about","title"=>"about","link"=>"/about","urlname"=>$pars),
			"SO Api"=>array("pagename"=>"soapi","title"=>"Stack Overflow","link"=>"/api/stackApi","urlname"=>$pars),
			"Books Api"=>array("pagename"=>"booksapi","title"=>"Google Books","link"=>"/api/showApi","urlname"=>$pars)
			);
		

		$this->getView("header");
		$this->getView("navigation", $buttons);	
		$random = substr( md5(rand()), 0, 7);
		$this->getView("form",array("cap"=>$random));
		$this->getView("footer");

	}

	public function getInputs(){
		if($_POST["captcha"] == $_SESSION["captcha_string"]){
			//var_dump($_POST);
			echo "captcha passed";
			if(@$_POST["email"] == "mike@aol.com"){

				if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){

					echo "Email invalid";
					echo "<br><a href='/form'>Click here to go back</a>";

				} else {
					echo "Email valid";
				}

			}
		} else {
			echo "Invalid captcha";
			echo "<br><a href='/form'>Click here to go back</a>";
		}
	}

	public function ajaxStuff(){
		if (@$_POST["username"] == "root" && @$_POST["password"] == "root") {
			echo "You logged in successfully!";
		} else {
			echo "Invalid username";
		}
	}
}
?>