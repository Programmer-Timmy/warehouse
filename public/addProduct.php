<?php
$racks = racks::getAll();
$categories = category::getAll();

if($_POST){
    products::add($_POST['name'], $_POST['ammount'], $_POST['category_id'], $_POST['racks_id'], $_FILES['images']);
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
    <title>Warehouse - Product toevoegen</title>
</head>
<body>
<?php require_once '../private/includes/nav.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Naam</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
        <label for="ammount" class="form-label">Aantal</label>
        <input type="number" class="form-control" name='ammount' id="ammount">
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Categorie</label>
        <select class="form-select" name="category_id">
            <?php
            foreach ($categories as $category){
                echo"<option value='$category->id'>$category->name</option>";
            }
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="racks_id" class="form-label">Stelling</label>
        <select class="form-select" name="racks_id">
            <?php
            foreach ($racks as $rack){
                echo"<option value='$rack->id'>$rack->number</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">afbeeldingen</label>
        <input type="file" class="form-control" name="images[]"  accept="image/*" id="formFile" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>
        </div></div></div>
<?php require_once "../private/includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
