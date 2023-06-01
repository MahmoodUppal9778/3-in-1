var $pw = $("#pw");
$pw.focus(function() {
    $pw.get(0).type = "text";
});
$pw.blur(function() {
    $pw.get(0).type = "password";   
});

var $closer = $(".close");
$closer.click(function(){
	$(".alert").div("hide");
});
