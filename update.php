<?php
include('mongo.php');

if(isset($_GET['id'])){
	$person = $people->findOne(array( '_id' => new MongoID($_GET['id']) ));
} else if(isset($_POST['name'])){
	$people->update(
		array('_id' => new MongoID($_POST['id'])),
		array(
			'name' 	=> $_POST['name'],
			'job' 	=> $_POST['job']
		));
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/margin.css" />
</head>
<body>
<section class="container">
	<form method="post" action="update.php">
		<input type="hidden" name="id" value="<?php echo $person['_id']; ?>" />
		<div class="input-group">
			<input type="text" name="name" value="<?php echo $person['name']; ?>" class="form-control" />
		</div>
		<div class="input-group">
			<input type="text" name="job" value="<?php echo $person['job']; ?>" class="form-control" />
		</div>
		<div>
			<button class="btn btn-info">Update</button>
			<a href="index.php" class="btn btn-danger">Cancel</a>
		</div>
	</form>
</section>
</body>
</html>