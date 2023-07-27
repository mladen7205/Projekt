<?php
session_start();

if (isset($_POST["submit"])) {
    include "../Database connection/connect.php";

    $title = $_POST["title"];
    $short_content = $_POST["short-content"];
    $content = $_POST["content"];
    $news_category = $_POST["news-category"];

    $image = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $image);

    $date = date("d.m.Y.");

    if (isset($_POST["archives"])) {
        $archives = 1;
    } else {
        $archives = 0;
    }

    if (isset($_SESSION["current_username"])) {
        $author = $_SESSION["current_username"];
    } else {
        $author = "Anonimno";
    }

    $query = "INSERT INTO news (date, title, short_content, content, image, news_category, archives, author) VALUES ('$date', '$title', '$short_content', '$content', '$image', '$news_category', '$archives', '$author');";
    mysqli_query($dbc, $query) or die("Error querying database!");

    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Preview</title>

    <style>
        main h1,
        main h2,
        main h3,
        main p,
        main img {
            margin-bottom: 10px;
        }

        main {
            margin-bottom: 20px;
        }

        main h1 {
            margin-top: 10px;
            font-size: 19px;
            border-bottom: 1px solid blue;
            width: fit-content;
        }

        main h2 {
            font-weight: 100;
            font-size: 20px;
        }

        main h3 {
            font-weight: normal;
            font-size: 13px;
            color: grey;
        }

        #paragraph {
            font-style: italic;
            font-size: 15px;
        }
    </style>
</head>

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
            <?php echo $news_category; ?>
        </h1>
        <h2>
            <?php echo $title; ?>
        </h2>
        <h3>AUTOR: <?php echo $author; ?></h3>
        <h3>OBJAVLJENO:
            <?php echo $date; ?>
        </h3>
        <img src="<?php echo '../images/' . $image; ?>" width="100%" alt="">
        <p id="paragraph">
            <?php echo $short_content; ?>
        </p>
        <p>
            <?php echo $content; ?>
        </p>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>