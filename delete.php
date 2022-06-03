<?php
/// require connect database
require_once 'connect.php';

// delete db
$id = $_GET['id'];

// query delete
$query = mysqli_query($conn, "DELETE FROM film WHERE film_id=$id");

// Redirect to index
header("Location:index.php");
