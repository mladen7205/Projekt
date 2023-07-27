<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Odjava</title>

    <style>
        form > div {
            margin: 20px 0 10px 0;
        }

        form button {
            padding: 5px 20px;
            text-align: center;
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
                <li><a href="../Odjava/odjava.php">ODJAVA</a></li>  
                <?php
                if (isset($_SESSION["current_level"])) {
                    if ($_SESSION["current_level"] == 1) {
                        echo "<li><a href='../Administracija/administracija.php'>ADMINISTRACIJA</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <form action="#" method="post">
            <div>Želite li se zaista odjaviti?</div>
            <button type="submit" name="logout">Da</button>
        </form>

        <?php
            if (isset($_POST["logout"])) {
                $_SESSION["current_username"] = "";
                $_SESSION["current_level"] = 0;

                header("Location: ../Početna/index.php");
                exit();
            }
        ?>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>