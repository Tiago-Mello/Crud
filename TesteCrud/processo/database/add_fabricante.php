<?php
    require 'connect.php';
    if (isset($_POST['nomeFabricante'])) {
        $query = "INSERT INTO fabricante (nome_fabricante) VALUES ('".$_POST['nomeFabricante']."')" ;
        mysqli_query($conn, $query);
    }
    header("Location: ../index.php");
?>