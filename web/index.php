<?php

$pdo = new PDO('sqlite:../database.sqlite');


$stmt = $pdo->prepare('SELECT * FROM article');
$stmt -> execute();
$articles = $stmt-> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
 <html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<div class="row">
 	<?php foreach ($articles as $article) :?>

	<div class="col-md-6">
 		<article class="panel panel-default" id="<?php echo $article['id'] ?>">

 			<h2 class="panel-heading"><?php echo $article['title']; ?></h2>
			<div class="panel-body">
 		 		<p><?php echo $article['description'];?></p>
 		 		<a href="<?php echo $article['link'];?>"><?php echo $article['link'];?></a>
 		 		<p><?php echo $article['author'];?></p>
			</div>
			<a class="btn" data-id="<?php echo $article['id'];?>" href="?id=<?php echo $article['id'];?>" ><button class=" glyphicon glyphicon-remove"></button></a>
 		 </article>
	</div>

 	<?php endforeach ?>
</div>
<div class="panel panel-default">
	<div class="panel-heading">Panel heading without title</div>
	<div class="panel-body">
		Panel content
	</div>
</div>
 	<script src="js/app.js"></script>
</html>

