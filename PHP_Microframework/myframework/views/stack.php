<div class="container">

	<h2>Stack Overflow Questions</h2>

	<?
		$data = json_decode($data,true);
		//var_dump($data);
		//echo $data[0]["items"];

		foreach($data['items'] as $item) {
			echo '<h3><a href="'.$item["link"].'">'.$item["title"]."</a></h3>";
			echo "<h4>User: ".$item["owner"]["display_name"]."</h4>";
		}

	?>

</div>