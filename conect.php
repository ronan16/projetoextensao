<?php
$user="root";
$pass="";

try {
    $db = new PDO('mysql:host=localhost;dbname=junior_consultoria', $user, $pass);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
