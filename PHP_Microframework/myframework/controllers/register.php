<?

class register extends AppController {
	public function __construct($parent) {
		$this->parent = $parent;

		$pars = $this->parent->urlPathParts[0];
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
		$this->getView("register");
		$this->getView("footer");

	}

	public function registerUser(){
		$data = $this->parent->getModel("users")->add("insert into users (username,password) values (:username, :password)", array(":username"=>$_REQUEST["username"], ":password"=>sha1($_REQUEST["password"])));
		$_SESSION["loggedin"] = 1;
		header("location:/main");
	}
}

?>