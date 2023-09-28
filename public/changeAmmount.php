<?php
$product = products::getByQR($_GET['qrid']);
$img = json_decode($product->json_img_url);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        /* Custom CSS for styling */
        .product-image {
            background-image: url('<?php echo $img[0]; ?>'); /* Replace with your product image URL */
            background-size: cover;
            background-position: center;
            height: 500px;
            border: 1px solid #ddd;
        }

        .thumbnail-image {
            background-size: cover;
            background-position: center;
            height: 80px;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .thumbnail-image:hover {
            border: 1px solid #007bff;
        }

        .product-details {
            padding: 20px;
        }
    </style>
    <title>Warehouse - Product</title>
</head>
<body>
<?php require_once "../private/includes/nav.php"; ?>

<div class="container mt-3 ">

    <div class="col-md-6">
        <h1><?php echo $product->name; ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="product-image" id="main-image"></div>
            <div class="col-md-6">
                <div class="product-details">
                    <form method="post">
                        <input type="number" min="0">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeImage(imageUrl) {
            console.log(imageUrl);
            document.getElementById('main-image').style.backgroundImage = `url(${imageUrl})`;
        }


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

    <?php require_once "../private/includes/footer.php"; ?>
</body>
</html>