<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BlogsWatch</title>
  <?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Blog List</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Log Out</a></li> -->
        <?= anchor('login/logout', 'Logout', ['class'=> 'navbar-brand']); ?>

      </ul>
    </div>
  </div>
</nav>