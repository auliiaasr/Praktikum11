<?php
// require connect database
require_once 'connect.php';

// alert
$alert = null;
$errorTitle = $errorDescription = $errorReleaseYear = $errorLanguageId = $errorRentalDuration = null;
$errorRentalRate = $errorLength = $errorReplacementCost = $errorRating = $errorSpecialFeatures = null;

// create db
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $language_id = $_POST['language_id'];
    $rental_duration = $_POST['rental_duration'];
    $rental_rate = $_POST['rental_rate'];
    $length = $_POST['length'];
    $replacement_cost = $_POST['replacement_cost'];
    $rating = $_POST['rating'];
    $special_features = $_POST['special_features'];

    // validation
    if (empty($title)) {
        $alert = "failed";
        $errorFakultas = "*Title cannot be empty!";
    }
    if (empty($description)) {
        $alert = "failed";
        $errorDescription = "*Description cannot be empty!";
    }
    if (empty($release_year)) {
        $alert = "failed";
        $errorReleaseYear = "*Release Year cannot be empty!";
    }
    if (empty($language_id)) {
        $alert = "failed";
        $errorLanguageId = "*Language cannot be empty!";
    }
    if (empty($rental_duration)) {
        $alert = "failed";
        $errorRentalDuration = "*Rental Duration cannot be empty!";
    }
    if (empty($rental_rate)) {
        $alert = "failed";
        $errorRentalRate = "*Rental Rate cannot be empty!";
    }
    if (empty($length)) {
        $alert = "failed";
        $errorLength = "*Length cannot be empty!";
    }
    if (empty($replacement_cost)) {
        $alert = "failed";
        $errorReplacementCost = "*Replacement Cost cannot be empty!";
    }
    if (empty($rating)) {
        $alert = "failed";
        $errorRating = "*Rating cannot be empty!";
    }
    if (empty($special_features)) {
        $alert = "failed";
        $errorSpecialFeatures = "*Special Features cannot be empty!";
    }

    // if not empty
    if (
        !empty($title) && !empty($description) && !empty($release_year)
        && !empty($language_id) && !empty($rental_duration) && !empty($rental_rate)
        && !empty($length) && !empty($replacement_cost)
        && !empty($rating) && !empty($special_features)
    ) {
        // query create
        $query = mysqli_query($conn, "INSERT INTO film(title, description, release_year, language_id, 
            rental_duration, rental_rate, length, replacement_cost, rating, special_features)
            VALUES('$title', '$description', '$release_year', '$language_id', '$rental_duration',
            '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features')");

        // change alert
        $alert = "success";
    }
}
