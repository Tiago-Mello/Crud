<?php
    require 'connect.php';
    if (isset($_POST['nomeProduto'])) {
        $query = "INSERT INTO produtos (nome_produto, produto_fabricante, produto_categoria, preco_produto) VALUES ('".$_POST['nomeProduto']."','".$_POST['fabricanteProduto']."','".$_POST['categoriaProduto']."','".$_POST['precoProduto']."')" ;
        mysqli_query($conn, $query);
    }
    header("Location: ../index.php");
?>