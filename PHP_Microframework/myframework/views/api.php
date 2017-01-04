<div class="container">

	<h2>Books</h2>

	<?
		foreach($data as $item){
			echo $item["volumeInfo"]["title"]."<br /> \n";
		}

	?>

</div>