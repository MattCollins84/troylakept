<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Troy Lake PT | Administration</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/signin.css" rel="stylesheet">
    <link href="/css/custom-styles.css" rel="stylesheet">
  </head>

  <body>

    <? if ($_SESSION['user']): ?>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/contacts">Contacts</a></li>
            <li><a href="/admin/about">About</a></li>
            <li><a href="/admin/quotes">Quotes</a></li>
            <li><a href="/admin/videos">Videos</a></li>
            <li><a href="/admin/services">Services</a></li>
            <li><a href="/admin/results">Results</a></li>
            <li><a href="/admin/blog">Blog</a></li>
            <!--<li><a href="/admin/media">Media</a></li>-->
            <li><a href="/admin/tips">Top Tips</a></li>
            <li><a href="/admin/images">Images</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="/admin/help" target="_blank">Help</a></li>
            <li class="active"><a href="/admin/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <? endif; ?>

    <div class="container">