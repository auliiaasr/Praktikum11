<?php
// require connect database
require_once 'connect.php';

// edit page
// query fetch by id
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM film WHERE film_id=$id");
// fetch as associative
$data = mysqli_fetch_object($query);

// alert
$alert = null;
$errorTitle = $errorDescription = $errorReleaseYear = $errorLanguageId = $errorRentalDuration = null;
$errorRentalRate = $errorLength = $errorReplacementCost = $errorRating = $errorSpecialFeatures = null;

// update db
if (isset($_POST['update'])) {
    $id = $_POST['id'];
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
        $errorTitle = "*Title cannot be empty!";
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

    // change format
    $release_year = date('Y', strtotime("01-01-" . $release_year));
    $special_features = implode(",", $special_features);

    // if not empty
    if (
        !empty($title) && !empty($description) && !empty($release_year)
        && !empty($language_id) && !empty($rental_duration) && !empty($rental_rate)
        && !empty($length) && !empty($replacement_cost)
        && !empty($rating) && !empty($special_features)
    ) {
        // query update
        $query = mysqli_query($conn, "UPDATE film SET title='$title', description='$description', 
            release_year='$release_year', language_id='$language_id', rental_duration='$rental_duration',
            rental_rate='$rental_rate', length='$length', replacement_cost'$replacement_cost', 
            rating='$rating', special_features='$special_features' WHERE film_id=$id");

        // change alert
        $alert = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AULIA SINTA_1122</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #242424">
    <!-- Title -->
    <div class="my-3">
        <h1 class="text-light text-center">EDIT MOVIE</h1>
    </div>
    <div class="mb-5 text-center">
        <a href="index.php" class="btn btn-secondary shadow" type="button"><i class="fas fa-arrow-circle-left me-1"></i> Back</a>
    </div>
    <div class="container">
        <!-- Content -->
        <div class="p-4 shadow p-3 mb-5 bg-white rounded">
            <form action="" method="post" class="col-12">
                <!-- alert -->
                <?php if ($alert == "success") : ?>
                    <div class="alert alert-success" role="alert">Update Data Success! <a href="index.php">Show</a></div>
                <?php elseif ($alert == "failed") : ?>
                    <div class="alert alert-danger" role="alert">Update Data Failed!</div>
                <?php endif; ?>

                <!-- form -->
                <input type="hidden" name="id" value="<?= $data->film_id; ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="<?= $data->title; ?>">
                    <small class="form-text text-danger"><?= $errorTitle; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description"><?= $data->description; ?></textarea>
                    <small class="form-text text-danger"><?= $errorDescription; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Release Year</label>
                    <input type="text" class="form-control" name="release_year" placeholder="Release Year" value="<?= $data->release_year; ?>">
                    <small class="form-text text-danger"><?= $errorReleaseYear; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Language</label>
                    <select class="form-control" name="language_id">
                        <option value="1" <?php if ($data->language_id == '1') : ?> selected <?php endif; ?>>English</option>
                        <option value="2" <?php if ($data->language_id == '2') : ?> selected <?php endif; ?>>Italian</option>
                        <option value="3" <?php if ($data->language_id == '3') : ?> selected <?php endif; ?>>Japanese</option>
                        <option value="4" <?php if ($data->language_id == '4') : ?> selected <?php endif; ?>>Mandarin</option>
                        <option value="5" <?php if ($data->language_id == '5') : ?> selected <?php endif; ?>>French</option>
                        <option value="6" <?php if ($data->language_id == '6') : ?> selected <?php endif; ?>>German</option>
                    </select>
                    <small class="form-text text-danger"><?= $errorLanguageId; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Rental Duration (Days)</label>
                    <input type="number" class="form-control" name="rental_duration" placeholder="Rental Duration" value="<?= $data->rental_duration; ?>">
                    <small class="form-text text-danger"><?= $errorRentalDuration; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Rental Rate ($)</label>
                    <input type="number" class="form-control" name="rental_rate" placeholder="Rental Rate" step=".01" value="<?= $data->rental_rate; ?>">
                    <small class="form-text text-danger"><?= $errorRentalRate; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Length (Minutes)</label>
                    <input type="number" class="form-control" name="length" placeholder="Length" value="<?= $data->length; ?>">
                    <small class="form-text text-danger"><?= $errorLength; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Replacement Cost ($)</label>
                    <input type="number" class="form-control" name="replacement_cost" placeholder="Replacement Cost" step=".01" value="<?= $data->replacement_cost; ?>">
                    <small class="form-text text-danger"><?= $errorReplacementCost; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Rating</label>
                    <select class="form-control" name="rating">
                        <option value="PG" <?php if ($data->rating == 'PG') : ?> selected <?php endif; ?>>PG</option>
                        <option value="PG-13" <?php if ($data->rating == 'PG-13') : ?> selected <?php endif; ?>>PG-13</option>
                        <option value="NC-17" <?php if ($data->rating == 'NC-17') : ?> selected <?php endif; ?>>NC-17</option>
                        <option value="G" <?php if ($data->rating == 'G') : ?> selected <?php endif; ?>>G</option>
                        <option value="R" <?php if ($data->rating == 'R') : ?> selected <?php endif; ?>>R</option>
                    </select>
                    <small class="form-text text-danger"><?= $errorRating; ?></small>
                </div><br>
                <label for="">Special Features</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="special_features[]" value="Trailers" id="check0" <?php if (strpos($data->special_features, 'Trailers') !== false) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="check0">
                        Trailers
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="special_features[]" value="Commentaries" id="check1" <?php if (strpos($data->special_features, 'Commentaries') !== false) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="check1">
                        Commentaries
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="special_features[]" value="Deleted Scenes" id="check2" <?php if (strpos($data->special_features, 'Deleted Scenes') !== false) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="check2">
                        Deleted Scenes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="special_features[]" value="Behind the Scenes" id="check3" <?php if (strpos($data->special_features, 'Behind the Scenes') !== false) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="check3">
                        Behind the Scenes
                    </label><br>
                    <small class="form-text text-danger"><?= $errorSpecialFeatures; ?></small>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="update" class="btn btn-warning shadow bg-warning"><i class="fas fa-pen me-1"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</body>

</html>