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

        echo '<h1>Szczegoly:</h1>
        <div class="details">Nazwa: '.$cos[$_GET["id"]][1].'<br>
        Typ: '.$cos[$_GET["id"]][3].'<br>
        Opis: '.$cos[$_GET["id"]][2].'<br>
        foto </div>';
        echo '<br><a href="../index.php?page=1">Strona Glowna</a>';
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>