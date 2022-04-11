<!doctype html>
<html>
<head>
    <title>Welcome to User CRUD</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">


<?php echo view('templates/navbar'); //Display a view in a view?>

    <h1><?= esc($title) ?></h1>