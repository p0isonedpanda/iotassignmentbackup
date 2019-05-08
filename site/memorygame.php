<!DOCTYPE html>
<html>
<head>
    <title>Memory Game</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="./memorygame.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <header>
	<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
            <a href="index.html" class="navbar-brand">IoT Group Assignment</a>
	    <ul class="navbar-nav">
	        <li class="nav-item"><a href="smartfan.php" class="nav-link">Smart Fan</a></li>
                <li class="nav-item"><a href="memorygame.php" class="nav-link">Memory Game</a></li>
	    </ul>
	</nav>
    </header>
    
    <main class="container lead">
        <div class="row">
            <h1 class="display-1">Memory Game</h1>
        </div>
        
        <div class="row">
            <div class="col" id="highscores">
                <!-- <?php include "highscores.php"; ?> -->
            </div>
            <div class="col">
		<div id="playerinfo">
		    <!-- <?php include "playerinfo.php"; ?> -->
                </div>
            </div>
        </div>
    </main>
</body>
</html>
