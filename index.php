<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AULIA SINTA_1122</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
  <style>
    aside {
      float: left;
      width: 20%;
      margin-left: 40px;
    }

    .container {
      float: right;
      width: 70%;
      margin-right: 40px;
    }
  </style>
</head>

<body style="background-color: #242424">
  <!-- Title -->
  <div class="my-3">
    <h1 class="text-light text-center">CINEPOLIS MOVIES</h1>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end me-lg-5 mb-lg-3">
    <a class="btn btn-primary" type="button"><i class="fas fa-plus-circle me-1"></i> Create Movie</a>
  </div>
  <aside>
    <!-- Sorting Card -->
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-sort-alpha-down "></i> Sorting
      </div>
      <div class="card-body">
        <p class="card-text">Sort by Movie Title</p>
        <select class="form-select" id="sort" aria-label="Default select example">
          <option value="ASC">Ascending</option>
          <option value="DESC">Descending</option>
        </select>
      </div>
    </div>
    <!-- Filter Card -->
    <div class="card">
      <div class="card-header">
        <i class="fas fa-filter"></i> Filters
      </div>
      <div class="card-body">
        <p class="card-text">Filter by Movie Rating</p>
        <select class="form-select mb-3" id="filter" aria-label="Default select example">
          <option class="text-muted" selected>Movie rating</option>
          <?php
          require_once 'connect.php';
          $query = mysqli_query($conn, "SELECT DISTINCT rating FROM film");
          while ($row = mysqli_fetch_object($query)) :
          ?>
            <option value="<?= $row->rating; ?>"><?= $row->rating; ?></option>
          <?php endwhile; ?>
        </select>
        <p class="card-text">Search by Movie Title</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="search" placeholder="Search title..." aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
  </aside>
  <div class="container">
    <!-- Content -->
    <div class="row" id="content">
      <?php
      require_once 'connect.php';
      $query = mysqli_query($conn, "SELECT * FROM film");
      while ($row = mysqli_fetch_object($query)) :
      ?>
        <div class="col-sm-3 mb-3">
          <div class="card" style="width: 15rem">
            <!-- Image -->
            <a href="detail.php?id=<?= $row->film_id; ?>">
              <img src="https://altfilmlens.files.wordpress.com/2015/11/the_good_dinosaur_promo_art_03.jpg" class="card-img-top" alt="" />
            </a>
            <!-- Body -->
            <div class="card-body">
              <h5 class="card-title"><?= $row->title; ?> (<?= $row->release_year; ?>)</h5>
              <div class="row">
                <div class="col-8">
                  <p class="card-text">Rating: <?= $row->rating; ?></p>
                </div>
                <!-- Button Edit -->
                <div class="col-2">
                  <i class="fas fa-edit fa-lg text-primary mr-1"></i>
                </div>
                <!-- Button Delete -->
                <div class="col-2">
                  <i class="fas fa-trash-alt fa-lg text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // Search Ajax
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      // Filter Ajax
      $('#filter').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'filter.php',
          data: {
            filter: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      // Sort Ajax
      $('#sort').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'sort.php',
          data: {
            sort: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });
    });
  </script>
</body>

</html>