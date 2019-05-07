// update displays dynamically
setInterval(() => {
    $.ajax({url: "sensortemp.php"}).done((output) => {
    	$("#sensortemp").html(output);
    });
}, 50);

setInterval(() => {
    $.ajax({url: "targettemp.php"}).done((output) => {
    	$("#targettemp").html(output);
    });
}, 50);

// update user input into db
$().ready(() => {
    $("#targettemp-control").change(() => {
    	$.post("updatetargettemp.php", { target: $("#targettemp-control").val() });
    });
});
