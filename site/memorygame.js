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

// update user input into db
$().ready(() => {
    $.post("updateusername.php", { name: $("#name").val() });

    $("#name").change(() => {
        $.post("updateusername.php", { name: $("#name").val() });
    });

    $("#startgame").click(() => {
	$.post("startgame.php").done((data) => {
	    $("#test").html(data);
	});
    });
});
