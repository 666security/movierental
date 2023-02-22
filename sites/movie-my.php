<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
    <?php
        include "../includes/header.php";

        echo '<form method="POST">';
        if($_SESSION["email"])
        {
            echo '<div class="glowny1"><h1>Wypożyczalnia Filmów</h1> Zalogowany Jako: '.$_SESSION["email"].'<br>';
            echo '<div class="panel">
            <a href="../sites/logout.php">Wyloguj sie</a>
            <a href="../index.php?page=1">Strona Glowna</a>
            <a href="movie-add.php">Dodaj film</a>';
        }else
        {
            echo '<div class="glowny1"><h1>Wypożyczalnia Filmów</h1>';
            echo '<div class="panel">
            <a href="sites/login.php">Zaloguj sie</a>
            <a href="sites/register.php">Zarejestruj sie</a>';
        }
        echo '<input name="search"><input type="submit"><br>Twoje filmy:</div>';

        if($_POST!=null)
        {
            $_SESSION["search"]=$_POST["search"];
            header("Location: sites/movie-search.php?page=1");
        }
        $con = new mysqli("127.0.0.1","root","","projekt");
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM user");
        $cos1 = $res1->fetch_all();

        $res12 = $con->query("SELECT * FROM user_has_film");
        $cos12 = $res12->fetch_all();

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM film LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos12);$i++)
        {
            if($_SESSION["id"]==$cos12[$i][0])
            {
            echo '<div class="blok"><div class="lewy">Nazwa: '.$cos22[$i][1].'<br>Typ: '.$cos22[$i][3].'<br> Opis: '.$cos22[$i][2].'<br></div><div class="prawy">foto</div><div class="lewydol">';
                if($_SESSION["admin"]==null)
                {
                   echo '<a href="sites/movie-details.php?id='.$i.'">Szczegóły</a>';
                }
                if($_SESSION["admin"]==1)
                {
                    echo '<a href="sites/movie-details.php?id='.$i.'">Podgląd</a>';
                    echo '<a href="admin/movie-details.php?id='.$i.'">Szczegóły administratora</a>';
                }
                echo '</div></div><br>';
            }
        }
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '<br><div class="dol">';
        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a href="movie-my.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';
    ?>
        </center>
    </body>
</html>