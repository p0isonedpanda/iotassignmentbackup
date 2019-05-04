setInterval(() => {
    $.ajax({url: "test.php"}).done((output) => {
    	$("#rescount").html(output);
    });
}, 50);
