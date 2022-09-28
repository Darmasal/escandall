
<?php

session_start();
if (isset($_SESSION["usuari"])){


}
else{



?>


<html>
<head>
<title>LOGGIN DE API ESCANDALLS</title>
</head>


<body>
<div id=login>
    <form action=escandallapp.html method=get>
    <label>Usuari</label>
    <input type=text size=20 name="user">
    <label>Paraula Clau</label>
    <input type=password size=20 name="password">
    <button type=send>

</form>

</div>



</body>


<?php

}

?>

</html>