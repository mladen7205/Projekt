<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Unos</title>

    <style>
        form {
            margin-top: 10px;
        }

        form>div {
            margin-bottom: 20px;
        }

        form input,
        form textarea,
        form select {
            display: block;
            width: 40%;
            margin-top: 5px;
        }

        #title,
        form select,
        form textarea {
            background-color: rgb(249, 249, 249);
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
        }

        form select {
            height: 30px;
        }

        #title {
            height: 25px;
        }

        form button {
            padding: 5px;
            text-align: center;
        }

        form input[name="image"] {
            max-width: 185px;
        }

        main span{
            display: block;
            width: fit-content;
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1><i class="fa-solid fa-layer-group" style="color: #f36c2a;"></i>debate</h1>
        <nav>
            <ul>
                <li><a href="../Početna/index.php">POČETNA</a></li>
                <li><a href="#">UNOS</a></li>
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
        <form action="../Skripte/skripta_unos.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Naslov vijesti:</label>
                <input type="text" id="title" name="title">
                <span id="title_error"></span>
            </div>
            <div>
                <label for="short-content">Kratki sadržaj vijesti (do 50 znakova):</label>
                <textarea name="short-content" id="short-content" rows="15"></textarea>
                <span id="short-content_error"></span>
            </div>
            <div>
                <label for="content">Sadržaj vijesti:</label>
                <textarea name="content" id="content" rows="15"></textarea>
                <span id="content_error"></span>
            </div>
            <div>
                <label for="image">Slika:</label>
                <input type="file" name="image" id="image" style="width: fit-content;">
                <span id="image_error"></span>
            </div>
            <div>
                <label for="news-category">Kategorija vijesti:</label>
                <select name="news-category" id="news-category">
                    <option value="" selected disabled>Odaberi</option>
                    <option value="Sport">Sport</option>
                    <option value="Svijet">Svijet</option>
                </select>
                <span id="news-category_error"></span>
            </div>
            <div>
                <label for="archives">Spremiti u arhivu:</label>
                <input type="checkbox" name="archives" style="width: fit-content;">
            </div>
            <button type="reset" name="reset">Poništi</button>
            <button type="submit" id="submit" name="submit">Prihvati</button>
        </form>
        <script src="../Validacija/validacija_unos.js" type="text/javascript"></script>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>