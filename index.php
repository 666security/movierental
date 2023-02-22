<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <center>
    <?php
        include "./includes/header.php";
        if($_GET==null)
        {
        header("Location: index.php?page=1");
        include "includes/nav.php";
        }
        $res1 = $con->query("SELECT * FROM user");
        $cos1 = $res1->fetch_all();
        if($_SESSION["email"])
        {
            echo '<div class="glowny1"><h1>Wypożyczalnia Filmów</h1> Zalogowany Jako: '.$_SESSION["email"].'<br>';
            echo '<div class="panel">
            <a href="sites/logout.php">Wyloguj sie</a>
            <a href="sites/movie-add.php">Dodaj film</a>
            <a href="sites/movie-my.php?page=1">Moje Filmy</a>';
        }else
        {
            echo '<div class="glowny1"><h1>Wypożyczalnia Filmów</h1>';
            echo '<div class="panel">
            <a href="sites/login.php">Zaloguj sie</a>
            <a href="sites/register.php">Zarejestruj sie</a>';
        }
        echo '<input name="search"><input type="submit"></div>';

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

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM film LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            echo '<div class="blok"><div class="lewy">Nazwa: '.$cos22[$i][1].'<br>Typ: '.$cos22[$i][3].'<br> Opis: '.$cos22[$i][2].'<br></div><div class="prawy">zdjecie</div><div class="lewydol">';
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

        echo '<br><div class="dol">';
        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';

        echo '</div><a href="admin/logout.php">Wyloguj Administratora</a>';
        if($_SESSION["id"])
        {
            if($cos1[$_SESSION["id"]][5]==1)
            {
                echo '<br>panel admina<br> <a href="admin/add-admin.php">Dodaj nowego Administratora</a><a href="admin/movie-list.php?page=1">Lista Wszystkich Filmów</a>';
            }
        }
    ?>
        </center>
    </body>
</html>