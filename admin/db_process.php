<?php

function dd($data)
{
    echo "<pre>", var_dump($data), "</pre>";    
}

$dbHost = "127.0.0.1";
$dbName = "24wheels";
$dbUser = "root";
$dbPassword = "";

$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

$query = "SELECT * FROM clients";
$dbResult = mysqli_query($link, $query);

$arResult = [];

/* извлечение ассоциативного массива */
while ($row = mysqli_fetch_assoc($dbResult)) 
{
    $arResult[$row['id']] = $row;
}
mysqli_close($link);
?>