<?php
session_start();
include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
include 'functions.php';
validateSession();

$sql = "DELETE FROM table_player WHERE playerId = " . $_GET['playerId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>