<?php 
include __DIR__.'/../vendor/autoload.php';

$pdo = new PDO('sqlite:../database.sqlite');
$stmt = $pdo->prepare("INSERT INTO article (title, description, link) VALUES (:title, :description, :link)");
$feed = Zend\Feed\Reader\Reader::import('http://etin.yourphototravel.com/fr/etins.rss');

foreach($feed as $item){
	$stmt->execute([
		'title'=> $item->getTitle(),
		'description'=> $item->getDescription(),
		'link'=> $item->getLink(),
		//'author'=>$item->getAuthors(0)
		]);
}
print_r($stmt);

?>

//zend feed reader pour recuperer flux rss et mettre dans base de donée
