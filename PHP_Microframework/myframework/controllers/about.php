<?php

class about extends AppController{

	public function __construct($parent) {
		$this->parent = $parent;
		$this->showList();
	}

	public function showList() {
		$pars = $this->parent->urlPathParts[0];
		$buttons = array(
			"main"=>array("pagename"=>"main","title"=>"home title","link"=>"/main","urlname"=>$pars),
			"carousel"=>array("pagename"=>"carousel","title"=>"car title","link"=>"/carousel","urlname"=>$pars),
			"form"=>array("pagename"=>"form","title"=>"form","link"=>"/form","urlname"=>$pars),
			"about"=>array("pagename"=>"about","title"=>"about","link"=>"/about","urlname"=>$pars),
			"SO Api"=>array("pagename"=>"soapi","title"=>"Stack Overflow","link"=>"/api/stackApi","urlname"=>$pars),
			"Books Api"=>array("pagename"=>"booksapi","title"=>"Google Books","link"=>"/api/showApi","urlname"=>$pars)
			);

		$data = $this->parent->getModel("fruits")->select("select * from fruit_table");

		$this->getView("header");
		$this->getView("navigation", $buttons);	
		$this->getView("about", $data);
		
	}

	public function showAddForm() {
		$pars = $this->parent->urlPathParts[0];
		$buttons = array(
			"main"=>array("pagename"=>"main","title"=>"home title","link"=>"/main","urlname"=>$pars),
			"carousel"=>array("pagename"=>"carousel","title"=>"car title","link"=>"/carousel","urlname"=>$pars),
			"form"=>array("pagename"=>"form","title"=>"form","link"=>"/form","urlname"=>$pars),
			"about"=>array("pagename"=>"about","title"=>"about","link"=>"/about","urlname"=>$pars)
			);

		//$data = $this->parent->getModel("fruits")->select("select * from fruit_table");

		$this->getView("header");
		$this->getView("navigation", $buttons);	
		$this->getView("addform");
		$this->getView("footer");

	}

	public function editForm() {
		//change this so that you are getting the data based on the id number you selected
		$data = $this->parent->getModel("fruits")->select("select * from fruit_table where id = :id", array(":id"=>$this->parent->urlPathParts[2]));
	
		$this->getView("editform", $data);
	}

	public function delete() {
		$data = $this->parent->getModel("fruits")->delete("delete from fruit_table where id = :id", array(":id"=>$this->parent->urlPathParts[2]));
		header("location:/about");
	}

	public function update() {

		$data = $this->parent->getModel("fruits")->update("update fruit_table set name = :name where id = :id", array(":name"=>$_REQUEST["name"], ":id"=>(int)$this->parent->urlPathParts[2]));
		header("location:/about");

	}

	public function addAction() {

		$data = $this->parent->getModel("fruits")->add("insert into fruit_table (name) values (:name)", array(":name"=>$_REQUEST["name"]));
		header("location:/about");

	}
}

?>