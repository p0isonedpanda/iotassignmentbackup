// update displays dynamically
setInterval(() => {
    $.ajax({url: "sensortemp.php"}).done((output) => {
    	$("#sensortemp").html(output);
    });
}, 50);

// update user input into db
$().ready(() => {
    $.post("updatetargettemp.php", { target: $("#targettemp-control").val() })
	.done(() => {
            $.ajax({url: "targettemp.php"}).done((output) => {
                $("#targettemp").html(output);
            });
    });

    $("#targettemp-control").change(() => {
    	$.post("updatetargettemp.php", { target: $("#targettemp-control").val() })
	    .done(() => {
                $.ajax({url: "targettemp.php"}).done((output) => {
                    $("#targettemp").html(output);
                });
	});
    });
});
