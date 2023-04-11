<?= $this->extend('layout/template'); ?>
<? //php session_start(); 
?>
<?= $this->section('content'); ?>


<div class="container">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  

  
</head>
<body>
 
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 
  <script src="/js/jquery-1.11.2.min.js"></script> 
  <script type="text/javascript">
  $(function() {
    
    //$( "#tags" ).autocomplete({
     // source: availableTags
    //});
	var A = "http://localhost:8080/coba_autocomplete/fungsi";
	$( "#tags" ).autocomplete({
      //source: "<?php echo "http:/localhost:8080/"?>supplier_contact/"
        //source: "http://localhost:8080/supplier_contact",
		source: A,
		minLength: 1
    });
  });
  </script>
</body>
        
</div>
<?= $this->endSection(); ?>

