<!DOCTYPE html>
<html>
<head>
    <title>IoT Group Assignment</title>
    <link rel="stylesheet" href="./css/bootstrap.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php
        include "dbconnect.php";
	$query = "UPDATE state SET smartfan = -1";
	$conn->query($query);
	$conn->close();
    ?>
    <header>
	<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
            <a href="index.php" class="navbar-brand">IoT Group Assignment</a>
	    <ul class="navbar-nav">
	        <li class="nav-item"><a href="smartfan.php" class="nav-link">Smart Fan</a></li>
                <li class="nav-item"><a href="memorygame.php" class="nav-link">Memory Game</a></li>
	    </ul>
	</nav>
    </header>

    <main class="container lead">
        <div class="row">
            <h1 class="display-1">Welcome!</h1>
	</div>
	
	<div class="row">
	    <p>
	        You are currently looking at the product of our collective blood, sweat, and tears over the course of many weeks.<br />
		This project is was developed by:
	    </p>
	</div>

	<div class="row">
	    <ul class="list-group list-group-flush col-auto">
	        <li class="list-group-item">Ang Yu Fan</li>
	        <li class="list-group-item">Daniel Coady</li>
	        <li class="list-group-item">Gareth Clauson</li>
	        <li class="list-group-item">James Hassall</li>
	        <li class="list-group-item">Josiah Sonsie</li>
	    </ul>
	</div>

	<div class="row">
	    <p>
	        This website is comprised of two parts: the smart fan and memory game. To use one of these features, click on the corresponding
		link in the navigation bar at the top of the screen.
	    </p>
	</div>
    </main>
</body>
</html>
