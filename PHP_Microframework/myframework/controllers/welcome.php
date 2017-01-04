<?

class welcome extends AppController{

	public function __construct() {

		$this->getView("header",array("pagename"=>"welcome"));

		$this->getView("welcome");

	}

}

?>