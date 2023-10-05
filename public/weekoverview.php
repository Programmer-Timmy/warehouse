<?php
if (!isset($_GET['week'])) {
    header('location:weekoverview?week=' . date('W'));
}
$histories = history::getAllByWeek($_GET['week']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Warehouse - Week overzicht</title>
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

<div class="container" style="margin-bottom: 100px">
    <div class="d-flex flex-row align-items-center pt-3">
        <div class="col-md-6">
            <h1 class="title">Week: <?php echo $_GET['week'] ?></h1>
        </div>
        <div class="col-md-6 text-end" style="margin-left: auto">
            <form method="get" id="myPost" class="d-flex flex-row " style="width: 200px; margin-left: auto ">
                <button type="button" onclick="amountUpC()" class="btn btn-primary"><i class="fa-solid fa-angle-up"></i>
                </button>
                <input type="number" onchange="submit('week')" class="form-control" id="week" name="week" min="0"
                       value="<?php echo $_GET['week']; ?>" step="1">
                <button type="button" onclick="amountDownC()" class="btn btn-primary"><i
                            class="fa-solid fa-angle-down"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Naam</th>
            <th>Aantal</th>
            <th>Totaal</th>
            <th>Datum</th>
            <th>Week</th>
            <th>Gebruiker</th>
        </tr>
        </thead>

        <?php
        foreach ($histories as $histoy) {
            echo "
            <tbody>
            <tr>
                <td>$histoy->name</td>
                <td>$histoy->ammount</td>
                <td>$histoy->total</td>
                <td>$histoy->date</td>
                <td>$histoy->week</td>
                <td>$histoy->firstname $histoy->lastname</td>

                </tr>
            </tbody>
            ";
        }
        ?>


    </table>
    </div>
</div>


<?php require_once "../private/includes/footer.php"; ?>
<script src="src/Value.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>