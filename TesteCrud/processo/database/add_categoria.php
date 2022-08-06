<?php
    require 'connect.php';
    if (isset($_POST['nomeCategoria'])) {
        $query = "INSERT INTO categoria (nome_categoria) VALUES ('".$_POST['nomeCategoria']."')" ;
        mysqli_query($conn, $query);
    }
    header("Location: ../index.php");
?>