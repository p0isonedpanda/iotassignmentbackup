
// update displays dynamically
setInterval(() => {
    $.ajax({url: "playerinfo.php"}).done((output) => {
    	$("#playerinfo").html(output);
    });
}, 50);
