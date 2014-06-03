<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>enhanceWithin demo</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> 

<script>
	$.mobile.document.on("click", "#insert-content", function () {
            var km = $('#kmInput').val();
            var lp= $('#carLP').val();
            var cl = $('#carlocation').val();
           $.post("send.php", { kmInput: km , carLP: lp , carlocation: cl },
                function(data){
                  $(".ui-content").replaceWith("<div style='align:center;margin: 0;float: right;width: 50%;'><h1>" + data + "</h1><divp>"); 
                  //alert("Data Loaded: " + data);
                });
	});

</script>
</head>
<body>
 
 
<div data-role="page">
	<div data-role="header" height="100%">
                <img border="0" src="logo.png" alt="Logo, Tux" style="width:30%;float:left;display:inline"/>
                <h1>מערכת דווח רכבים</h1>
	</div>
	<div role="main" class="ui-content" id="page-content">
		<p align='center'>
		<form method="post" action="send.php">
		        <input type="number" name="kmInput" id="kmInput" value="" placeholder="מד מרחק" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;">
<?php if (isset($_GET["l"]))
{
?>
		        <input type="number" name="carLP" id="carLP" value="<?php echo $_GET["l"]; ?>" placeholder="מס רכב" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;" disabled>
<a href="index.php">לא הרכב שלי</a>
<?php }else{ ?>
		        <input type="number" name="carLP" id="carLP" value="" placeholder="מס רכב" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;">
<?php } ?>
		        <input type="hidden" name="carlocation" id="carlocation" value="">
			<div style="align:center;margin: 0;float: right;width: 50%;">
			<a href="#" class="center-button ui-shadow ui-btn ui-corner-all ui-btn-inline ui-btn-icon-left ui-icon-star" id="insert-content" data-role="button">שלח</a></div>
		</form>
		</p> 
	</div>
</div> 
style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;"
</body>
</html>
<script>
$(document).ready(function () {

var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;
 $('#carlocation').val( crd.latitude + ',' + crd.longitude);
};

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};

navigator.geolocation.getCurrentPosition(success, error, options);



});
</script>