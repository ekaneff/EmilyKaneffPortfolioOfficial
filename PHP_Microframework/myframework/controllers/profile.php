<?

class profile extends AppController {
	public function __construct(){

		if (@$_SESSION['loggedin'] && $_SESSION["loggedin"]==1) {

		} else {
			header("location:/main");
		}
	}

	public function index($pars) {
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
		echo "This is the profile page";
		//echo $_SESSION["par"];
	}
}

?>