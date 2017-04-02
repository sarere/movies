<?php

include_once 'connect.php';
$id = $_GET['id'];
$query = 'SELECT * FROM `movies` WHERE id=' . $id;
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
unlink($data['cover']);
$query = 'DELETE FROM `movies` WHERE id=' . $id;
$result = mysqli_query($link, $query);

if ($result) {
    header('location:index.php');
}else{
    die('can\'t delete');
}

?>