<?php
include('mongo.php');


if(isset($_POST['name'])){
	$people->insert(array(
		'name' => $_POST['name'],
		'job' => $_POST['job']
	));
}


$cursor = $people->find();


?>
<!DOCTYPE html>
<head>
	<title>Datos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/margin.css" />
</head>
<body>
<section class="container">
	<form method="post">
		<div class="input-group">
			<input type="text" name="name" placeholder="Name:" class="form-control" />
		</div>
		<div class="input-group">
			<input type="text" name="job" placeholder="Job:" class="form-control" />
		</div>
		<div>
			<button class="btn btn-info">Add</button>
		</div>
	</form>

<?php if($cursor->count() > 0): ?>
<ul>
	<?php foreach($cursor as $doc): ?>
	<li>
		<h3><?php echo $doc['name']; ?>(<?php echo $doc['job']; ?>)</h3>
		<p><a href="update.php?id=<?php echo $doc['_id']; ?>">Update</a></p>
		<p><a href="delete.php?id=<?php echo $doc['_id']; ?>">Delete</a></p>
	</li>
	<?php endforeach; ?>
</ul>
<?php else: ?>
	<p>No people</p>

<?php endif; ?>
</section>
</body>