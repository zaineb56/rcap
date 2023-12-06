<?php 
    include("./lib/db_connect.php");

    $search = '';
    if (isset($_GET) && $_GET && $_GET['search']){
        $search = $_GET['search'];
        $sql = "SELECT * FROM `product` WHERE `title` LIKE '%" . $_GET['search'] . "%' or `description` LIKE '%" . $_GET['search'] . "%';";
    }else {
        $sql = "SELECT * FROM `product`";
    }

    $result = $conn->query($sql);
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap</title>
</head>
<body>
    <h1>Products</h1>
    <?php include("./lib/nav.php") ?>

    <form>
        <label for="search">Search</label>
        <input type="text" name="search" id="search" placeholder="Search" value="<?= $search ?>">
        <input type="submit" value="Search"/>
    </form>
    <ul>
        <?php 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>
                    <li>
                        <h2><?= $row["title"] ?></h2>
                        <img src="<?= $row["image_src"] ?>" alt="test">
                        <p><?= $row["description"] ?></p>
                    </li>
                <?php }
            } else {
                echo "0 results";
            }
        ?>
    </ul>
</body>
</html>