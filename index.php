<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="Number one">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" placeholder="Number two">
        <button>Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        exit();
        header("Location: ../index.php");
    }
    $num01 = filter_input(INPUT_POST, 'num01', FILTER_SANITIZE_NUMBER_FLOAT);
    $num02 = filter_input(INPUT_POST, 'num02', FILTER_SANITIZE_NUMBER_FLOAT);
    $operator = htmlspecialchars($_POST['operator']);

    $errors = false;

    if (empty($num01) || empty($num02) || empty($operator)) {
        echo "<p>fill in all fields</p>";
        $errors = true;
    }

    if (!is_numeric($num01) || !is_numeric(($num02))) {
        echo "<p>only write numbers</p>";
        $errors = true;
    }
    ?>
</body>

</html>