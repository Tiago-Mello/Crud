<?php
    require 'connect.php';
    if (isset($_POST['del_produto'])) {
        $query = "DELETE FROM produtos WHERE id_produto = ".$_POST['del_produto'] ;
        mysqli_query($conn, $query);
    }
    header("Location: ../index.php");
?>