<html>
    <head>

    </head>
    
    <body>
        <?php
            include "../includes/header.php";
            $_SESSION["email"]="";
            $_SESSION["password"]="";
            $_SESSION["id"]="";
            header("Location: login.php");
        ?>
    </body>
</html>