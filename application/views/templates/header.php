<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/album.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/simple-sidebar.css"); ?>" />
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url("categories"); ?>"><strong>BMS</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url("categories"); ?>">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("books"); ?>">Books</a>
      </li> -->

      <?php if($this->session->userdata('admin') == null ){
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="/CW1/categories">Home</a>';
        echo '</li>';

        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="/CW1/books">Books</a>';
        echo '</li>';

        echo '</ul>';
        echo '<form class="form-inline my-2 my-lg-0">';
        echo '<a class="btn btn-outline-success my-2 my-sm-0" href="/CW1/admin"> Login</a>';
        echo '</form>';
      } else {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="/CW1/categories">Home</a>';
        echo '</li>';

        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="/CW1/books">Books</a>';
        echo '</li>';

        echo '<li class="nav-item">';
        echo '<a class="nav-link" base href="/CW1/books/create">Add Books</a>';
        echo '</li>';

        echo '<li class="nav-item">';
        echo '<a class="nav-link" base href="/CW1/categories/create">Add Category</a>';
        echo '</li>';

        echo '</ul>';
        echo '<form class="form-inline my-2 my-lg-0">';
        echo '<a class="btn btn-outline-danger my-2 my-sm-0" href="/CW1/admin/dashboard/logout"> Logout</a>';
        echo '</form>';
      }?>

      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    <!-- </ul>
    <form class="form-inline my-2 my-lg-0">
			<a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo base_url("admin"); ?>">Login</a>
    </form> -->
  </div>
</nav>