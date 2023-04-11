<head>
	<title>Autocomplete Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-Nr7on1JF0rR7+FdpKPJUuV7a1/mX4uVZGnTyzTAsV6Lw//6UuV7NghYLuYcAD7lck9E9+J7AeNXzHb/7zfBQ2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="ui-widget">
		<label for="autocomplete-input">Search:</label>
		<input type="text" id="autocomplete-input">
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha384-XXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

	<script>
		// Define the autocomplete function
		$(function() {

			var availableTags = ["apple", "banana", "cherry", "date"]; // Replace with your array of data

			$("#autocomplete-input").autocomplete({
				source: availableTags
			});
		});
	</script>
</body>
