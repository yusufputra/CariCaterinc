<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#button1').click(function(){
				var tampil = '<h1 id="h1" style="border: 1px solid black;">
				<b>' + $('#inputText').val() + '</b>
				<h1><br>';
				//console.log(tampil);
				$('#div1').append(tampil);
				});
			});

		</script>
	</head>

	<body>
		<div id="div1" >
		</div>
		<input type="text" id="inputText" >
		<button id="button1">Click Here</button>
	</body>
</html>


