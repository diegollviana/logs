<?php
	if (sizeof($_POST)){
		$bar = $_POST['bar'];
		
		echo $bar;
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>teste</title>
</head>
<body>

<form id="foo">

    <label for="bar">A bar</label>
    <input id="bar" name="bar" type="text" value="" />

    <input type="submit" value="Send" />

</form>

<div id="result"></div>

<script src="js/libs/jquery-1.6.2.min.js"></script>

<script type="text/javascript">
	$("#foo").submit(function(event){
		// setup some local variables
		var $form = $(this),
		// let's select and cache all the fields
		$inputs = $form.find("input, select, button, textarea"),
		// serialize the data in the form
		serializedData = $form.serialize();
	
		// let's disable the inputs for the duration of the ajax request
		$inputs.attr("disabled", "disabled");
	
		// fire off the request to /form.php
		$.ajax({
			url: "teste_ajax_post.php",
			type: "post",
			data: serializedData,
			// callback handler that will be called on success
			success: function(response, textStatus, jqXHR){
				// log a message to the console
				console.log("Hooray, it worked!");
			},
			// callback handler that will be called on error
			error: function(jqXHR, textStatus, errorThrown){
				// log the error to the console
				console.log(
					"The following error occured: "+
					textStatus, errorThrown
				);
			},
			// callback handler that will be called on completion
			// which means, either on success or error
			complete: function(){
				// enable the inputs
				$inputs.removeAttr("disabled");
			}
		});
	
		// prevent default posting of form
		event.preventDefault();
	});
</script>

</body>
</html>