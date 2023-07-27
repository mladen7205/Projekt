<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Administracija</title>

    <style>
        main h1 {
            text-align: center;
            margin-top: 20px;
            color: rgb(0, 77, 222);
        }

        form {
            margin: 20px 0;
            border: 1px solid grey;
            border-radius: 10px;
            width: 96%;
            background-color: rgb(225, 217, 209);
            padding: 1%;
        }

        form img {
            display: block;
            margin: 10px 0;
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

        form input[name="title"],
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

        form input[name="title"] {
            height: 25px;
        }

        form button {
            padding: 5px;
            text-align: center;
        }

        form input[name="image"] {
            max-width: 185px;
        }

        main span {
            display: block;
            width: fit-content;
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<?php
include "../Database connection/connect.php";

$query = "SELECT * FROM news;";
$result = mysqli_query($dbc, $query);
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
                <li><a href="../Odjava/odjava.php">ODJAVA</a></li>
                <li><a href="#">ADMINISTRACIJA</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>VIJESTI</h1>
        <?php while ($rows = mysqli_fetch_array($result)): ?>
            <form action="../Skripte/skripta_administracija.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $rows["id"]; ?>">
                <div>
                    <label for="title">Naslov vijesti:</label>
                    <input type="text" name="title" required value="<?php echo $rows["title"]; ?>">
                </div>
                <div>
                    <label for="short-content">Kratki sadržaj vijesti (do 50 znakova):</label>
                    <textarea name="short-content" required rows="15"><?php echo $rows["short_content"]; ?></textarea>
                </div>
                <div>
                    <label for="content">Sadržaj vijesti:</label>
                    <textarea name="content" rows="15" required><?php echo $rows["content"]; ?></textarea>
                </div>
                <div>
                    <label for="image">Slika:</label>
                    <img src="../images/<?php echo $rows["image"]; ?>" width="200px" alt="">
                    <input type="file" name="image" style="width: fit-content;">
                </div>
                <div>
                    <?php
                    if ($rows["news_category"] == "Sport") {
                        $sportSelected = "selected";
                        $svijetSelected = "";
                    } else if ($rows["news_category"] == "Svijet") {
                        $sportSelected = "";
                        $svijetSelected = "selected";
                    }
                    ?>
                    <label for="news-category">Kategorija vijesti:</label>
                    <select name="news-category">
                        <option value="" disabled>Odaberi</option>
                        <option value="Sport" <?php echo $sportSelected; ?>>Sport</option>
                        <option value="Svijet" <?php echo $svijetSelected; ?>>Svijet</option>
                    </select>
                </div>
                <div>
                    <label for="archives">Arhiva:</label>
                    <input type="checkbox" name="archives" <?php if ($rows["archives"] == 1)
                        echo "checked"; ?>
                        style="width: fit-content;">
                </div>
                <button type="submit" name="delete">Izbriši</button>
                <button type="submit" id="change" name="change">Izmijeni</button>
            </form>
        <?php endwhile; ?>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

<?php
mysqli_close($dbc);
?>

</html>