<?php
$products = products::getAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Warehouse - Home</title>
</head>
<body>
<?php require_once 'nav.php'; ?>
<div class="container">
    <div class="row">
        <?php
        foreach ($products as $product) {
            $img = json_decode($product->json_img_url);
            echo "
        <div class=\"col-sm-3 mt-3\">
            <div class=\"card\">
                <img src=\"$img[0]\" class=\"card-img-top\" height='300' style='object-fit: cover;' alt=\"...\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$product->name</h5>
                    <ul class=\"list-group list-group-flush\">
                        <li class=\"list-group-item\">Aantal: $product->ammount</li>
                        <li class=\"list-group-item\">Categorie: $product->category</li>
                        <li class=\"list-group-item\">Stelling: $product->rack</li>
                      </ul>
                    <a href=\"productpage/?id=$product->id\" class=\"btn btn-primary\">Product weergeven</a>
                </div>
            </div>
        </div>
        ";
        }
        ?>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
