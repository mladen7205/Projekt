<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Kategorija</title>
    <style>
        main h1 {
            margin: 20px 0;
            text-align: center;
            color: rgb(0, 77, 222);
        }

        main section{
            width: 100%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        main article {
            width: 50%;
            margin-bottom: 20px;
            text-align: center;
        }

        main img {
            max-width: 300px;
        }

        main h2{
            font-size: 15px;
            margin: 10px 0;
            font-weight: bold;
            color: rgb(73, 72, 72);
        }

        main article a:link, main article a:visited{
            text-decoration: none;
            color: black;
        }

        main article a:hover{
            text-decoration: underline;
        }

        #short-content{
            font-weight: bold;
            width: 50%;
            margin: 0 auto;
        }

        #date{
            margin-top: 10px;
            color: rgb(174, 174, 174);
            font-size: 13px;
        }

        footer{
            clear: both;
        }

        @media(max-width: 606px){
            main article {
                width: 100%;
            }
        }
    </style>
</head>

<?php
include "../Database connection/connect.php";

$id = $_GET["id"];
$page_title = substr($id, 1, strlen($id) - 2);

$query = "SELECT id, date, title, short_content, image FROM news WHERE news_category = $id AND archives = 0 ORDER BY date DESC;";
$result = mysqli_query($dbc, $query);
?>

<body>
    <header>
        <h1><i class="fa-solid fa-layer-group" style="color: #f36c2a;"></i>debate</h1>
        <nav>
            <ul>
                <li><a href="../Početna/index.php">POČETNA</a></li>
                <li><a href="../Unos/unos.php">UNOS</a></li>
                <li><a href="kategorija.php?id='Sport'">SPORT</a></li>
                <li><a href="kategorija.php?id='Svijet'">SVIJET</a></li>
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
        <h1><?php echo strtoupper($page_title); ?></h1>
        <section>
            <?php while($rows = mysqli_fetch_array($result)): ?>
            <article>
                <img src="<?php echo "../images/" . $rows["image"]; ?>" alt="">
                <h2><?php echo $rows["title"] ?></h2>
                <p id="short-content"><a href="../Članak/clanak.php?id='<?php echo $rows["id"]; ?>'"><?php echo $rows["short_content"]; ?></a></p>
                <p id="date"><?php echo $rows["date"]; ?></p>
            </article>
            <?php endwhile; ?>
        </section>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

<?php mysqli_close($dbc); ?>

</html>