
<?php
session_name("afpa");
session_id("123456");
session_start();
echo"- session ID : ".session_id();

echo "<br>";

$_SESSION["login"] = "webmaster";
$_SESSION["role"] = "admin";

echo $_SESSION["login"];
echo "<br>";
echo $_SESSION["role"];

var_dump($_SESSION);

echo"- session ID : ".session_id();
echo "<br>";
session_start();
//Test si autentification par 2 méthodes
//Méthode 1
if ($_SESSION["login"])
{
    echo"Vous êtes autorisé à voir cette page.";
}
else
{
    echo"Cette page nécessite une identification.";
}

?>