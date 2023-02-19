<?php
// nhap du lieu
$Fullname = $_POST['txtname'];
$MSSV = $_POST['txtMSSV'];
$Mail = $_POST['txtMail'];
$Phone = $_POST['txtPhone'];

// connect csdl
require_once 'Connect.php';

// add resource by sql
$addsql = "INSERT INTO sinhvien
(Fullname,mssv,mail,phone) VALUES('$Fullname','$MSSV','$Mail','$Phone')";

//Finish requires
mysqli_query($conn, $addsql);
echo "<h1>Add Successful</h1>";
$conn -> close();