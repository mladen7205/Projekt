<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Početna</title>

    <style>
        main {
            margin-top: 20px;
        }

        section {
            border-bottom: 1px solid rgb(216, 216, 216);
            width: 100%;
            padding-bottom: 50px;
            margin-bottom: 70px;
        }

        section h2 {
            width: 100%;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .article-wrapper {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .article-wrapper article {
            width: 24%;
            margin-right: 1%;
        }

        .article-wrapper h3 {
            font-size: 10px;
            color: rgb(0, 77, 222);
            font-weight: bold;
            margin-top: 10px;
        }

        .article-p1 {
            font-weight: bold;
            font-size: 15px;
            margin: 10px 0px;
        }

        .article-p2 {
            font-size: 10px;
            margin: 10px 0px;
            color: rgb(174, 174, 174);
        }

        main article a:link,
        main article a:visited {
            text-decoration: none;
            color: black;
        }

        main article a:hover {
            text-decoration: underline;
        }

        /* Responsive articles */
        @media(max-width: 900px) {
            .article-wrapper article {
                width: 49%;
                margin-right: 1%;
            }
        }

        @media(max-width: 468px) {
            .article-wrapper article {
                width: 99%;
                margin-right: 1%;
            }
        }
    </style>
</head>

<?php
include "../Database connection/connect.php";
?>

<body>
    <header>
        <h1><i class="fa-solid fa-layer-group" style="color: #f36c2a;"></i>debate</h1>
        <nav>
            <ul>
                <li><a href="#">POČETNA</a></li>
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
        <section>
            <?php
            $query = "SELECT id, title, image, short_content, date, author FROM news WHERE archives = 0 AND news_category = 'Sport' ORDER BY date DESC LIMIT 4;";
            $result = mysqli_query($dbc, $query);
            ?>

            <h2><i class="fa-solid fa-newspaper" style="color: #4f8bf3;"></i> SPORT</h2>
            <div class="article-wrapper">
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <article>
                        <img src="<?php echo '../images/' . $row["image"]; ?>" alt="" width="100%" height="150px">
                        <h3>
                            <?php echo $row["title"]; ?>
                        </h3>
                        <p class="article-p1">
                            <a href="../Članak/clanak.php?id='<?php echo $row["id"]; ?>'"><?php echo $row["short_content"]; ?></a>
                        </p>
                        <p class="article-p2">
                            <?php echo $row["author"] . " - " . $row["date"]; ?>
                        </p>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
        <section>
            <?php
            $query = "SELECT id, title, image, short_content, date, author FROM news WHERE archives = 0 AND news_category = 'Svijet' ORDER BY date DESC LIMIT 4;";
            $result = mysqli_query($dbc, $query);
            ?>

            <h2><i class="fa-solid fa-newspaper" style="color: #4f8bf3;"></i> SVIJET</h2>
            <div class="article-wrapper">
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <article>
                        <img src="<?php echo '../images/' . $row["image"]; ?>" alt="" width="100%" height="150px">
                        <h3>
                            <?php echo $row["title"]; ?>
                        </h3>
                        <p class="article-p1">
                            <a href="../Članak/clanak.php?id='<?php echo $row["id"]; ?>'"><?php echo $row["short_content"]; ?></a>
                        </p>
                        <p class="article-p2">
                            <?php echo $row["author"] . " - " . $row["date"]; ?>    
                        </p>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

<?php
mysqli_close($dbc);
?>

</html>