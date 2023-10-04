<?php
$users = users::getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Warehouse - Gebruikers</title>
</head>
<body>
<?php require_once "../private/includes/nav.php"; ?>
<div class="container">
    <h1 class="pt-3">Gebruikers</h1>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo "
            <tr>
            <td>$user->email</td>
            <td>$user->firstname</td>
            <td>$user->lastname</td>
            <td>
                <a href=\"#\" class=\"btn btn-primary\">...</a>
                <a href=\"?delete=$user->id\" onclick='return confirm(\"weet je het zeker?\")' class=\"btn btn-danger\">X</a>
            </td>
            </tr>
            ";
            }

            ?>


            </tbody>
        </table>
    </div>



<?php require_once "../private/includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>