<!DOCTYPE html>

<html lang="en">
<style>
.single_sidebar .popular_post tr td a {
	display:block;
	background:#fff;
	margin-bottom:10px;
	font-size:12px;
	font-family:oswald;
	box-shadow:1px 4px 3px -2px #DDD;
	-webkit-box-shadow:1px 4px 3px -2px #DDD;
	-moz-box-shadow:1px 4px 3px -2px #DDD;
	-o-box-shadow:1px 4px 3px -2px #DDD;
	padding:10px;
}

.single_sidebar .popular_post tr td a:hover {
	/*background:#FFD500;*/
	background:#66BBCC;
	-webkit-transition:background 300ms ease-in;
	-moz-transition:background 300ms ease-in;
	-ms-transition:background 300ms ease-in;
	-o-transition:background 300ms ease-in;
	transition:background 300ms ease-in;
}

#preview{
	position:absolute;
	
	
	 background: #333;
  border: solid 1px #000;
  clear: left;
  display: block;
  max-width: 400px;
	}

</style>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title> JB-Exhibition </title>
		
		<!--
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
		
		<link href="css/styles.css" rel="stylesheet">
		-->
	
	
    <link rel="stylesheet" href="<?php echo site_url('asset/css2/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo site_url('asset/css2/styles.css')?>" />
	<link rel="stylesheet" href="<?php echo base_url('asset/css2/jquery.fancybox-1.3.4.css')?>" media="screen" />
	
    <script>
	
	$( document ).ready(function() {
	   $('.href_apply').each( function(){
			var nm = $(this).id;
			console.log(nm);
		});
	   
   
	});


//$("a").attr("href", "http://www.google.com/")
	
	</script>

	
	</head>
	
	<?php
	
	echo CI_VERSION; 
	?>