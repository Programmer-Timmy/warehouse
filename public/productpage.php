<?php
$product = products::get($_GET['id']);
$imgs = json_decode($product->json_img_url);
if (isset($_GET['delete'])) {
    products::delete($_GET['delete'], $imgs);
}
$histories = history::getByProduct($_GET['id'])
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
            background-image: url('<?php echo $imgs[0]; ?>'); /* Replace with your product image URL */
            background-size: cover;
            background-position: center;
            height: 400px;
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

<div class="container mt-3" style="padding-bottom: 100px">
    <div class="d-flex">
        <div class="">
            <h1><?php echo $product->name; ?></h1>
        </div>
        <div class="ms-auto">
            <a href="editProduct?id=<?php echo $product->id; ?>" class="btn btn-primary">Bewerken</a>
            <a href="productpage?delete=<?php echo $product->id; ?>&id=<?php echo $product->id; ?>"
               class="btn btn-danger"
               onclick="return confirm('Weet je het zeker?');">Verwijderen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="product-image" id="main-image"></div>
            <div class="mt-2 d-flex flex-wrap">
                <?php foreach ($imgs as $img) {
                    $img = str_replace(' ', '%20', $img);
                    echo "
                    <div class=\"px-1\" '>
                        <div class=\"thumbnail-image\" style=\"background-image: url('$img'); width: 100px; height: 100px\"  onclick=\"changeImage('$img')\"></div>
                    </div>
                    ";
                }
                ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="product-details">
                <p><strong>Voorraad:</strong> <?php if ($product->ammount <= 0) {
                        echo 'Niet op voorraad';
                    } else {
                        echo 'Op voorraad';
                    } ?></p>
                <p><strong>Aantal:</strong> <?php echo $product->ammount; ?></p>
                <p><strong>Categorie:</strong> <?php echo $product->category; ?></p>
                <p><strong>Stelling:</strong> <?php echo $product->rack; ?></p>
                <img id="qr"
                     src="https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=http://warehouse/changeAmmount?qrid=<?php echo $product->qr_url; ?>">
            </div>
        </div>
    </div>
    <br>
    <h2>Overzicht</h2>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Aantal</th>
            <th>Totaal</th>
            <th>Datum</th>
            <th>Gebruiker</th>
        </tr>
        </thead>

        <?php
        foreach ($histories as $histoy) {
            echo "
            <tbody>
            <tr>
                <td>$histoy->ammount</td>
                <td>$histoy->total</td>
                <td>$histoy->date</td>
                <td>$histoy->firstname $histoy->lastname</td>

                </tr>
            </tbody>
            ";
        }
        ?>


    </table>
</div>

<script>
    function changeImage(imageUrl) {
        console.log(imageUrl);
        document.getElementById('main-image').style.backgroundImage = `url(${imageUrl})`;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<?php require_once "../private/includes/footer.php"; ?>
</body>
</html>