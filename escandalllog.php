
<?php

session_start();
if (isset($_SESSION["usuari"])){

}
else if(isset($_POST["user"])){

    include ('inc/config.php');
    include ('class/mysqlclase.php');

    if (login($_POST["user"],$_POST["password"])){
        $_SESSION["USER"]=$_POST["user"];
        header("Location: escandallapp.html");
        die();
    }
    }
    else{ ?>

        <html>
        <head>
        <title>LOGGIN DE API ESCANDALLS</title>
        </head>
        
        
        <body>
        <div id=login>
            ERROR EN EL LOGIN!!
            <form action=escandalllog.php method=post>
            <label for="user">Usuari:</label>
            <input type=text size=20 name="user">
            <label for="password">Paraula Clau</label>
            <input type=password size=20 name="password">
            <input type="submit" name="entra">
        
        </form>
        
        </div>
        </body>   
        </html>
<?php
    }
}
else{

?>


<html>
<head>
<title>LOGGIN DE API ESCANDALLS</title>
</head>


<body>
<div id=login>
    <form action=escandalllog.php method=post>
    <label for="user">Usuari:</label>
    <input type=text size=20 name="user">
    <label for="password">Paraula Clau</label>
    <input type=password size=20 name="password">
    <input type="submit" name="entra">

</form>

</div>



</body>




</html>
<?php

}

?>