<nav>
	<ul>
		<?
    //var_dump($data);
			foreach($data as $page){
				echo "<li";
        echo $page["urlname"] == $page["pagename"]?' class="active"':'';
  
        echo "><a href='".$page["link"]."'>".$page["pagename"]."</a></li>";
			}
		?>
    <span style="color:white"><?=@$_REQUEST["msg"]?$_REQUEST["msg"]:'';?></span>
     <?if(@$_SESSION["loggedin"] && @$_SESSION["loggedin"] == 1) {?>
        <li><a href="/profile">Profile</a></li>
        <li><a href="/auth/logout">Logout</a></li>
      <?}else{?>
        <li><button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#myModal">Log in</button></li>
        <li><a href="/register" class="btn btn-primary navbar-btn">Register</a></li>
      <?}?>
	</ul>
</nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Log in</h4>
      </div>
      <div class="modal-body">
        <form action="/auth/login" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" id="login">Log in</button>
        </form>
      </div>
    </div>
  </div>
</div>

<h1>BootStrap Assignment</h1>