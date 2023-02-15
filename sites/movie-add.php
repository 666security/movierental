<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="glowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","movie");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        echo '<h1>Dodaj film:</h1>
        <div class="details">Nazwa: <input name="nazwa" value=""><br>
        Typ: <input name="typ" value=""><br>
        Opis: <input name="opis" value=""><br>
        foto </div>';
        echo '<input type="submit">';
        echo '<br><a href="../index.php?page=1">Strona Glowna</a>';
        echo '</form>';

        if($_POST!=NULL)
        {
            print_r($_POST);
            if($_POST["nazwa"]!="" && $_POST["typ"]!="" && $_POST["opis"]!="")
            {
                $sqlquery = "INSERT INTO `film` VALUES ('".count($cos1)."', '".$_POST['nazwa']."', '".$_POST['opis']."','".$_POST['typ']."');";
                $con->query($sqlquery);
                header('location: ../index.php?page=1');
            }
        }

    ?>
        </div>
        </center>
    </body>
</html>