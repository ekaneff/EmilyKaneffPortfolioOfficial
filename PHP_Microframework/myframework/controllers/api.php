<?

class api extends AppController {
	public function __construct($parent) {
		$this->parent = $parent;
	}

	public function ga() {

		include './google-api-php-client/src/Google/autoload.php';

		$client_id = '857619807526-so7rsgaslnnincfgo6qoih6s75utbn4m.apps.googleusercontent.com'; 
		$client_secret = 'f_9O1E3MNf2VIjP9Nr34r-Bj';
		$redirect_uri = 'http://127.0.0.1/api/ga';


		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");

		$service = new Google_Service_Oauth2($client);

		//var_dump($service);

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $client->getAccessToken();
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		  exit;
		}

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $client->setAccessToken($_SESSION['access_token']);
		} else {
		  $authUrl = $client->createAuthUrl();
		}

		echo '<div style="margin:20px">';
		if (isset($authUrl)){ 
		    //show login url
		    echo '<div align="center">';
		    echo '<h3>Login with Google -- Demo</h3>';
		    echo '<div>Please click login button to connect to Google.</div>';
		    echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
		    echo '</div>';
		    
		} else {
		    
		    $user = $service->userinfo->get(); //get user info 
		    
		  
		    //show user picture
		    //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
		    
		    //print user details
		    echo '<pre>';
		    print_r($user);
		    echo '</pre>';
		}
		echo '</div>';
		
	}

	public function showApi() {
		include './google-api-php-client/src/Google/autoload.php';

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

		//var_dump($this->parent->getModel("api"));

		$data = $this->parent->getModel("apiModel")->googleBooks("Henry David Thoreau");

		$this->getView("navigation", $buttons);	
		$this->getView("api", $data);
		$this->getView("footer");

	} 

	public function stackApi(){

		$pars = $this->parent->urlPathParts[0];
		$buttons = array(
			"main"=>array("pagename"=>"main","title"=>"home title","link"=>"/main","urlname"=>$pars),
			"carousel"=>array("pagename"=>"carousel","title"=>"car title","link"=>"/carousel","urlname"=>$pars),
			"form"=>array("pagename"=>"form","title"=>"form","link"=>"/form","urlname"=>$pars),
			"about"=>array("pagename"=>"about","title"=>"about","link"=>"/about","urlname"=>$pars),
			"SO Api"=>array("pagename"=>"soapi","title"=>"Stack Overflow","link"=>"/api/stackApi","urlname"=>$pars),
			"Books Api"=>array("pagename"=>"booksapi","title"=>"Google Books","link"=>"/api/showApi","urlname"=>$pars)
			);

		// $feed = "http://api.stackexchange.com/2.2/questions?order=desc&sort=activity&site=stackoverflow";

		$data = $this->parent->getModel("apiModel")->stack("https://api.stackexchange.com/2.2/questions?order=desc&sort=activity&site=stackoverflow");

		$this->getView("header");
		$this->getView("navigation", $buttons);	
		$this->getView("stack", $data);
		$this->getView("footer");

		// $feed = json_decode($feed,true);
		// $title = $feed['items'][0]["title"];
		// $author = $feed['items'][0]["owner"]["display_name"];
		// echo $title;
		// echo $author;


	}
}

?>