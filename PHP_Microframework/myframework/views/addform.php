<div class="container">

<h1>add a fruit</h1>

<?php

	foreach($data as $fruit) {
		echo $fruit["name"]."<br>";
	}
?>

<form action="/about/addAction" method="POST">
<input type="text" name="name" placeholder="insert name"/>

<button type="submit" class="btn btn-primary">Submit</button>


</form>

</div>