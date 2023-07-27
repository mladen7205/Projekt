<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Registracija</title>

    <style>
        form {
            margin-top: 10px;
            width: 100%;
        }

        form>div {
            margin-bottom: 20px;
        }

        form input {
            display: block;
            width: 25%;
            margin-top: 5px;
            background-color: rgb(249, 249, 249);
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
        }

        form button {
            padding: 5px;
            text-align: center;
        }

        main span {
            display: block;
            width: fit-content;
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        #message {
            margin-top: 10px;
            font-size: 13px;
            color: red;
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
        <form action="#" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Ime:</label>
                <input type="text" name="name" id="name">
                <span id="name_error"></span>
            </div>
            <div>
                <label for="surname">Prezime:</label>
                <input type="text" name="surname" id="surname">
                <span id="surname_error"></span>
            </div>
            <div>
                <label for="username">Korisničko ime:</label>
                <input type="text" name="username" id="username">
                <span id="username_error"></span>
            </div>
            <div>
                <label for="password">Lozinka:</label>
                <input type="password" name="password" id="password">
                <span id="password_error"></span>
            </div>
            <div>
                <label for="password_verify">Ponovi lozinku:</label>
                <input type="password" name="password_verify" id="password_verify">
                <span id="password_verify_error"></span>
            </div>
            <button type="submit" name="register" id="register">Registriraj se</button>
        </form>
        <script src="../Validacija/validacija_registracija.js" type="text/javascript"></script>
        <?php
        if (isset($_POST["register"])) {
            include "../Database connection/connect.php";

            $username = $_POST["username"];

            $query = "SELECT username FROM users WHERE username = ?;";

            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }

            if (mysqli_stmt_num_rows($stmt) > 0) {
                mysqli_close($dbc);

                echo "<div id='message'>" . "Korisničko ime zauzeto! Molimo odaberite novo!" . "</div>";
            } else {
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $password = password_hash($_POST["password"], CRYPT_BLOWFISH);

                $query = "INSERT INTO users (name, surname, username, password, level) VALUES (?, ?, ?, ?, 0);";

                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $username, $password);
                    mysqli_execute($stmt);
                }

                mysqli_close($dbc);

                $_SESSION["current_username"] = $username;
                $_SESSION["current_level"] = 0;

                header("Location: ../Početna/index.php");
                exit();
            }
        }
        ?>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>