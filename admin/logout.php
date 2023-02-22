<html>
    <head>

    </head>
    
    <body>
        <?php
            include "../includes/header.php";
            $_SESSION["email"]="";
            $_SESSION["password"]="";
            $_SESSION["id"]="";
            $_SESSION["admin"]="";
            header("Location: login.php");
        ?>
    </body>
</html>