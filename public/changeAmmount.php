<?php
$product = products::getByQR($_GET['qrid']);


if ($_POST) {
    if ($product->ammount - $_POST['amount'] < 0) {
        echo '<script>alert("Je totaal is minder dan 0!")</script>';
        return;
    } else {
        products::changeAmount($product->id, $_POST['amount'], $product->ammount);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Warehouse - Product</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
            text-align: center;
        }
    </style>
</head>
<body>
<?php require_once "../private/includes/nav.php"; ?>

<div class="container mt-3 text-center">
        <h1><?php echo $product->name; ?></h1>
    <form method="post">
        <div class="mb-3">
            <label for="amount" class="form-label">Aantal:</label>
            <div class="d-flex flex-row" style="width: 200px; margin: auto">
                <button type="button" onclick="amountUp()" class="btn btn-primary"><i class="fa-solid fa-angle-up"></i>
                </button>
                <input type="number" class="form-control" id="amount" name="amount" min="0" value="0" step="1">
                <button type="button" onclick="amountDown()" class="btn btn-primary"><i
                            class="fa-solid fa-angle-down"></i></button>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Doorgaan">
    </form>
    <script src="src/Value.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

    <?php require_once "../private/includes/footer.php"; ?>
</body>
</html>