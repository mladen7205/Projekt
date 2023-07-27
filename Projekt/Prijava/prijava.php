<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d031afde7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Prijava</title>

    <style>
        form {
            margin-top: 10px;
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

        #reg {
            font-size: 13px;
            color: blue;
        }

        #message {  
            margin-top: 10px;
            font-size: 13px;
            color: red;
        }

        form a:link, a:visited{
            text-decoration: none;
            color: blue;
        }

        form a:hover{
            text-decoration: underline;
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

<body>
    <header>
        <h1><i class="fa-solid fa-layer-group" style="color: #f36c2a;"></i>debate</h1>
        <nav>
            <ul>
                <li><a href="../Početna/index.php">POČETNA</a></li>
                <li><a href="../Unos/unos.php">UNOS</a></li>
                <li><a href="../Kategorija/kategorija.php?id='Sport'">SPORT</a></li>
                <li><a href="../Kategorija/kategorija.php?id='Svijet'">SVIJET</a></li>
                <li><a href="../Prijava/prijava.php">PRIJAVA</a></li>  
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
        <form action="#" method="post" enctype="multipart/form-data">
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
            <div id="reg">
                <a href="../Registracija/registracija.php">Nemate račun? Registirajte se ovdje.</a>
            </div>
            <button type="submit" name="login" id="login">Prijava</button>
            <script src="../Validacija/validacija_prijava.js" type="text/javascript"></script>
        </form>
        <?php
        if (isset($_POST["login"])) {
            if ($_POST["username"] != "" && $_POST["password"] != "") {
                include "../Database connection/connect.php";

                $username = $_POST["username"];

                $query = "SELECT username, password, level FROM users WHERE username = ?;";

                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                if (mysqli_stmt_num_rows($stmt) == 0) {
                    $message = "Korisnik s tim korisničkim imenom ne postoji!";
                } else {
                    $password = $_POST["password"];
                    mysqli_stmt_bind_result($stmt, $username_check, $password_check, $level_check);
                    mysqli_stmt_fetch($stmt);

                    if (password_verify($password, $password_check)) {
                        mysqli_close($dbc);
                        
                        $_SESSION["current_username"] = $username;
                        $_SESSION["current_level"] = $level_check;

                        header("Location: ../Početna/index.php");
                        exit();
                    } else {
                        $message = "Netočna lozinka!";
                    }
                }

                echo "<div id='message'>$message</div>";

                mysqli_close($dbc);
            }
        }
        ?>
    </main>
    <footer>
        Mladen Pavlović mpavlovi2@tvz.hr 2023
    </footer>
</body>

</html>