<?php
require_once __DIR__.'/load_files.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SYSTEM_NAME.' - v'.SYSTEM_VERSION ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1><?php echo SYSTEM_NAME.' - v'.SYSTEM_VERSION ?></h1>  
</div>

<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <h2>Choose your language</h2>
  <form method="POST" action="">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="en-us" value="en-us">
        <label class="form-check-label" for="en-us">
            English - <img src="assets/images/en.png" alt="Flag en" />
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="pt-br" value="pt-br" checked>
        <label class="form-check-label" for="pt-br">
            Brazilian Portuguese - <img src="assets/images/brasil.png" alt="Flag Brazil" />
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Next</button>
  </form>
  </div>
</div>

	<div align="center">By <a href="https://ribafs.org">RibaFS</a></div> 
</body>
</html>