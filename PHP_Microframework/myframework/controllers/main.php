<?

class main extends AppController{

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
		$this->getView("progress");
		$this->getView("footer");

		// $myfilestring = fopen("./assets/users.txt", "r");
		// 	if ($myfilestring) {
		// 		//var_dump(file_get_contents("./assets/fruits.txt"));
		// 		//echo "file found";
		// 		//var_dump(fgets($myfilestring));
		// 		//readfile("./assets/fruits.txt");

		// 		foreach(file("./assets/users.txt") as $x) {
		// 			//echo $x;
		// 			var_dump($x);
		// 			//check for conditions within this for loop 
		// 			if (strpos($x, "Mike@aol.com") !== false) {

		// 				echo "I am mike";

		// 			} else if(strpos($x, "Joe@aol.com") !== false) {

		// 				echo "I am Joe";

		// 			} else {
		// 				echo "not working";
		// 			}
		// 		}

		// 	} 

	}

}

?>