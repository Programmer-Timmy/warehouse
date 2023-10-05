<?php
$user = users::get($_GET['id']);

if ($_POST){
    users::edit($_GET['id'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Warehouse - Gebruiker bewerken</title>
</head>
<body>
<?php require_once "../private/includes/nav.php"; ?>

<div class="container mt-3">
    <h1>Gebruiker: <?php echo $user->firstname . " " . $user->lastname ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <form method="post">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Voornaam</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required
                           value="<?php echo $user->firstname ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Achternaam</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required
                           value="<?php echo $user->lastname ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email adres</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required
                           value="<?php echo $user->email ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input type="password" class="form-control" id="password" value="" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Bewerk</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "../private/includes/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
