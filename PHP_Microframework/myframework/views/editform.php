<div class="container">

<h1>Edit</h1>


<form action="/about/update/<?=$data[0]['id']?>" method="POST">
<input type="text" name="name" placeholder="insert name" value="<?=$data[0]["name"]?>"/>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>