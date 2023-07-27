<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Administracija</title>
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
                <li><a href="../Odjava/odjava.php">ODJAVA</a></li>
                <li><a href="../Administracija/administracija.php">ADMINISTRACIJA</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>
            <?php
            include "../Database connection/connect.php";
            $id = $_POST["id"];

            if (isset($_POST["change"])) {
                $title = $_POST["title"];
                $short_content = $_POST["short-content"];
                $content = $_POST["content"];
                $news_category = $_POST["news-category"];
                $date = date("d.m.Y.");

                if (isset($_POST["archives"])) {
                    $archives = 1;
                } else {
                    $archives = 0;
                }

                if ($_FILES["image"]["name"] != "") {
                    $image = $_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $image);

                    $query = "UPDATE news SET date = '$date', title = '$title', short_content = '$short_content', content = '$content', image = '$image', news_category = '$news_category', archives = $archives WHERE id = $id;";
                } else {
                    $query = "UPDATE news SET date = '$date', title = '$title', short_content = '$short_content', content = '$content', news_category = '$news_category', archives = $archives WHERE id = $id;";
                }

                $message = "<br><b>Vijest izmijenjena.</b>";
            } elseif (isset($_POST["delete"])) {
                $query = "DELETE FROM news WHERE id = $id;";

                $message = "<br><b>Vijest izbrisana.</b>";
            }

            mysqli_query($dbc, $query);

            $query = "SELECT id FROM news ORDER BY id DESC LIMIT 1;";
            $row = mysqli_fetch_array(mysqli_query($dbc, $query));
            $max_id = $row["id"] + 1;
            $query = "ALTER TABLE news AUTO_INCREMENT = $max_id;";
            mysqli_query($dbc, $query);

            echo $message;

            mysqli_close($dbc);
            ?>
        </p>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>