// update displays dynamically
setInterval(() => {
    $.ajax({url: "playerinfo.php"}).done((output) => {
    	$("#playerinfo").html(output);
    });
}, 50);

setInterval(() => {
    $.ajax({url: "highscores.php"}).done((output) => {
    	$("#highscores").html(output);
    });
}, 50);
