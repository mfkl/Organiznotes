<?php

header("Content-Type: text/plain");

session_start();

//echo '$_SESSION["id"] = '.$_SESSION['id'];

if (isset($_SESSION['id'])&& isset($_GET["idTopic"]) && isset($_GET["sIdCategoryToEdit"]) && isset($_GET["sNewNote"])) {
	
	//echo "coucou dans editNote ! ";
	
	//echo '$_GET["idTopic"]= '.$_GET["idTopic"];
	
	include '../../log_in_bdd.php';

	$isCategory = "1";

	$sNewNote = htmlspecialchars($_GET["sNewNote"]);
	
	$reqUpdateContent = $bdd -> prepare('UPDATE notes SET content=:content WHERE idUser=:idUser AND idTopic=:idTopic AND idNote=:idNote AND isCategory=:isCategory'); // changer la date aussi ??
		$reqUpdateContent -> execute(array(
		'content' => $sNewNote,
		'idUser' => $_SESSION['id'],
		'idTopic' => $_GET["idTopic"], 
		'idNote' => $_GET["sIdCategoryToEdit"],
		'isCategory' => $isCategory));
	$reqUpdateContent -> closeCursor();	
}

else {
	echo 'Une des variables n\'est pas d�finie ou la session n\'est pas ouverte !!!';	
}
?>