<!DOCTYPE html>
<html>
<head>
    <title>Memory Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
            <div class="col-auto">
                <?php include "highscores.php"; ?>
            </div>
        </div>
    </main>
</body>
</html>
