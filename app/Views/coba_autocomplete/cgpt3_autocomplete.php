<head>
    <title>Autocomplete Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	
	</head>
<body>
    <div class="ui-widget">
        <label for="autocomplete-input">Search:</label>
        <input type="text" id="autocomplete-input">
    </div>

    
    <script>
        // Define the autocomplete function
        
		var availableTags = ["apple", "banana", "cherry", "date"]; // Replace with your array of data
		var temp = "http://localhost:8080/coba_autocomplete/fungsi";
		var mob = <?php echo json_encode("http://localhost:8080/coba_autocomplete/fungsi") ?>; // Replace $data with your array of data

		
		$(document).ready(function() {
			$("#autocomplete-input").autocomplete({
				source: availableTags,
				autoFocus: true,
				delay: 0,
				minLength: 1,
				open: function() {
				console.log("autocomplete suggestions shown");
				}
			  });
		});
    </script>
</body>
