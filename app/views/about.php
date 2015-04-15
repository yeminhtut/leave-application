<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel and Angular Comment System</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/commentService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commentApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">
	<!-- PAGE TITLE -->
	<div class="page-header">
		<h2>Here is the lsit of users</h2>		
	</div>
	<div id="users_list">

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.getJSON( "http://localhost:8000/api/comments", function( data ) {			
			  var items = [];
			  $.each(data, function(idx, obj) {					
					items.push( "<li id='" + obj.author + "'>" + obj.author + "</li>" );
				});
			  console.log(items);
			 
			  $( "<ul/>", {
			    "class": "my-new-list",
			    html: items.join( "" )
			  }).appendTo( "#users_list" );
			});
	});

</script>
</body>
</html>
