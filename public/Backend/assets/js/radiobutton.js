$(document).ready(function () {

	$('input[type=radio]').bind('touchstart mousedown', function() {
	    	this.checked = !this.checked;

	    if(!(this.checked))
    	{
      		$("#add-email-setting").hide();
    	}
    	    else{
      		$("#add-email-setting").show();

        }
	}).bind('click touchend', function(e) {
    	e.preventDefault();
	});
});          
