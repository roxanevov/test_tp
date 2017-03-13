<?php
$pdo = new PDO('sqlite:../database.sqlite');

$arts=$_GET['id_art'];

if(!empty($arts)){
	$stmt = $pdo->prepare("DELETE FROM article WHERE  id=:id");
	$stmt->execute(['id'=>$arts]);
	$count = $stmt->rowCount();
	if($count == 0){
		http_response_code(404);
		return;
	}
}

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
 	<?php foreach ($articles as $art) :?>

	<div class="col-md-6">
 		<article class="panel panel-default">

 			<h2 class="panel-heading"><?php echo $art['title']; ?></h2>
			<div class="panel-body">
 		 		<p><?php echo $art['description'];?></p>
 		 		<a href="<?php echo $art['link'];?>"><?php echo $art['link'];?></a>
 		 		<p><?php echo $art['author'];?></p>
			</div>
			<a href="?id_art=<?php echo $art['id'];?>" class="btn"><button class=" glyphicon glyphicon-remove" data-id"<?php echo $art['id'];?>"></button></a>

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

