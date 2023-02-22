<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="glowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        echo '<h1>Zaawansowane Szczegóły:</h1>
        <div class="details">Nazwa: '.$cos[$_GET["id"]][1].'<br>
        Typ: '.$cos[$_GET["id"]][3].'<br>
        Opis: '.$cos[$_GET["id"]][2].'<br>
        zdjecie </div>';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '<br><br><input name="1" type="submit" value="usun"></a>';
        
        if($_POST!=null)
            {
            if($_POST["1"]=="usun")
            {
                $sqlquery = "DELETE FROM `film` WHERE `film`.`id` = ".$cos[$_GET["id"]][0]."";
                $con->query($sqlquery);
                header('location: ../index.php?page=1');
            }
        }
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>