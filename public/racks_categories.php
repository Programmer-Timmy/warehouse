<?php
$racks = racks::getAll();
$categories = category::getAll();
if(isset($_GET['rack'])){
    echo racks::delete($_GET['rack']);
}
if (isset($_GET['category'])) {
    echo category::delete($_GET['category']);
}

if($_POST){
    if(isset($_POST['catName'])) {
        category::add($_POST['catName']);
    }
    if(isset($_POST['number'])) {
        racks::add($_POST['number']);
    }
}
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
    <title>Warehouse - Stellingen & Categorieën</title>
</head>
<body>
<?php require_once "../private/includes/nav.php"; ?>
<div class="container" style="padding-bottom: 100px">
    <div class="row">
        <div class="col-md-6 px-5">
            <div>
                <h1>Stellingen</h1>
            </div>
            <form method="post" class="pb-3">
                <div class="row">
                    <div class="col-9">
                        <input type="number" name="number" class="form-control" id="number" min="1" placeholder="Stelling nummer">
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary" value="Toevoegen">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>Stelling</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($racks as $rack) {
                        echo "
                    <tr>
                    <td>$rack->number</td>
                    <td>
                        <a href=\"?rack=$rack->id\" onclick='return confirm(\"weet je het zeker?\")' class=\"btn btn-danger\">X</a>
                    </td>
                    </tr>
                    ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 px-5">
            <div class="d-flex align-items-center">
                <h1>Cattegorieën</h1>
            </div>
            <form method="post" class="pb-3">
                <div class="row">
                    <div class="col-9">
                        <input type="text" name="catName" class="form-control" id="name" placeholder="Naam">
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary" value="Toevoegen">
                    </div>
                </div>
            </form>
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>Stelling</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories as $category) {
                    echo "
                    <tr>
                    <td>$category->name</td>
                    <td>
                        <a href=\"?category=$category->id\" onclick='return confirm(\"weet je het zeker?\")' class=\"btn btn-danger\">X</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>




    <?php require_once "../private/includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>
</html>