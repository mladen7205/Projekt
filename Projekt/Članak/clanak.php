<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Članak</title>
    <style>
        main {
            text-align: center;
        }

        main h1 {
            font-size: 13px;
            color: rgb(0, 77, 222);
            font-weight: bold;
            margin: 20px 0;
        }

        main article {
            width: 100%;
        }

        main article h2 {
            font-size: 30px;
        }

        main article h3 {
            font-size: 18px;
            color: rgb(73, 72, 72);
            margin: 20px 0; 
        }

        #date {
            font-size: 11px;
            color: rgb(125, 127, 125);
            margin-bottom: 20px;
        }

        .paragraph {
            width: 70%;
            margin: 20px auto 10px auto;
            text-align: left;
        }
    </style>
</head>

<?php
include "../Database connection/connect.php";

$id = $_GET["id"];

$query = "SELECT date, title, short_content, content, image, news_category, author FROM news WHERE id = $id;";
$row = mysqli_fetch_array(mysqli_query($dbc, $query));
?>

<body>
    <header>
        <h1><i class="fa-solid fa-layer-group" style="color: #f36c2a;"></i>debate</h1>
        <nav>
            <ul>
                <li><a href="../Početna/index.php">POČETNA</a></li>
                <li><a href="../Unos/unos.php">UNOS</a></li>
                <li><a href="../Kategorija/kategorija.php?id='Sport'">SPORT</a></li>
                <li><a href="../Kategorija/kategorija.php?id='Svijet'">SVIJET</a></li>
                <?php
                if (isset($_SESSION["current_level"])) {
                    if ($_SESSION["current_level"] == 1) {
                        echo "<li><a href='../Odjava/odjava.php'>ODJAVA</a></li>";
                        echo "<li><a href='../Administracija/administracija.php'>ADMINISTRACIJA</a></li>";
                    } elseif ($_SESSION["current_username"] == "") {
                        echo "<li><a href='../Prijava/prijava.php'>PRIJAVA</a></li>";
                    } elseif ($_SESSION["current_username"] != "") {
                        echo "<li><a href='../Odjava/odjava.php'>ODJAVA</a></li>";
                    }
                } else {
                    echo "<li><a href='../Prijava/prijava.php'>PRIJAVA</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>
            <?php echo strtoupper($row["news_category"]); ?>
        </h1>
        <article>
            <h2><?php echo $row["title"] ?></h2>
            <h3><?php echo $row["short_content"]; ?></h3>
            <p id="date"><?php echo $row["author"] . " - " . $row["date"]; ?></p>
            <img src="<?php echo '../images/' . $row['image']; ?>" alt="" width="100%">
            <p class="paragraph"><?php echo $row["content"]; ?></p>
        </article>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

<?php
mysqli_close($dbc);
?>

</html>