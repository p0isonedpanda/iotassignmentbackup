<!DOCTYPE html>
<html>
<head>
    <title>Smart Fan</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="./smartfan.js"></script>

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
            <h1 class="display-1">Smart Fan</h1>
        </div>

        <div class="row">
            <div class="col">
                <?php include "weather.php"; ?>
            </div>
            <div class="col" id="sensortemp">
                <!-- <?php include "sensortemp.php" ?> -->
            </div>
            <div class="col">
                <!-- <?php include "targettemp.php" ?> -->
                <div id="targettemp"></div>
		<input type="range" class="custom-range" id="targettemp-control" name="targettemp" min="0" max="50"/>
            </div>
        </div>
    </main>
</body>
</html>
