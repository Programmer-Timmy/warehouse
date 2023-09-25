<?php
require_once '../static/database.php';
require_once '../private/autoloader.php';

$alert = "";
if($_POST){
    $alert = users::login($_POST['email'], $_POST['password']);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Warehouse - Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid" style="padding-left: 20px; padding-right: 20px;">
        <a class="navbar-brand" href="home">Dennies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Week overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Gebruikers</a>
            </li>
        </ul>
            <ul class="navbar-nav">
                <li class="nav-item" >
                    <a class="nav-link" style="font-size: 30px; float:left;" href="#"><i class="fa-solid fa-plus fa-lg"></i></a>
                    <a class="nav-link" style="font-size: 30px; float: left" href="#"><i class="fa-solid fa-qrcode"></i></i></a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
