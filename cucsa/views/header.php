<!doctype html>
<html lang="en">
  <head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110921645-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-110921645-2');
    </script>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<link rel="stylesheet" href="styles.css">
      
    <link rel="icon" href="favicon.png">
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>CUCSA</title>
  </head>

  <body>

		<nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
		  <a class="navbar-brand" href="https://www.cheerclubchula.com/cucsa/">CUCSA</a>

			<?php echo $_SESSION['menu']; ?>

		</nav>

