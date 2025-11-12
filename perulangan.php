<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan</title>
</head>

<body>
    <h1>FOR</h1>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "Perulangan ke: " . $i . '<br />';
    }


    for ($i = 10; $i >= 1; $i--) {
        echo "Perulangan ke: " . $i . '<br />';
    }
    ?>
    <h1>WHILE</h1>
    <?php
    $i = 1;
    while ($i <= 10) {
        echo "Perulangan ke: " . $i . " <br />";
        $i++;
    }
    ?>
    <h1>DO-WHILE</h1>
    <?php
    $i = 1;
    do {
        echo "Perulangan ke: " . $i . '<br />';
        $i++;
    } while ($i <= 10);
    ?>
</body>

</html>