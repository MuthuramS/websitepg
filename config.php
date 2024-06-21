<?php
$host = "localhost";
$uname = "root";
$psw = "";
$db = "propguid_crm";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $uname, $psw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "success"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
