<?php 
    include_once('./lib/auth-required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap</title>
</head>
<body>
    <h1>Home</h1>
    <?php include("./lib/nav.php") ?>

    <?php 
        if ($logedin == TRUE) {
            echo "hello " . $_SESSION["name"];
        }else{
            echo "hello User";
        }
    ?>

</body>
</html>