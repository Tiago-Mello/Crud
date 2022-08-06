<?php
require 'database/connect.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processo Seletivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="addProdutos">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h2>FABRICANTE E CATEGORIA</h2>
                    <form method="POST" action="database/add_fabricante.php">
                        <h3>FABRICANTE</h3>
                        <input required name="nomeFabricante" type="text" placeholder="Digite o nome do fabricante">
                        <input type="submit" value="Adicionar">
                    </form>
                    <form method="POST" action="database/add_categoria.php" style="margin-top: 30px;">
                        <h3>CATEGORIA</h3>
                        <input required name="nomeCategoria" type="text" placeholder="Digite o nome da categoria">
                        <input type="submit" value="Adicionar">
                    </form>

                </div>
                <div class="col-md-6">

                    <form method="POST" action="database/add_produto.php">
                        <h2>PRODUTOS</h2>
                        <h3>NOME DO PRODUTO</h3>
                        <input required type="text" placeholder="Digite o nome do produto" name="nomeProduto">

                        <h3>FABRICANTE</h3>
                        <select required style="display: block; margin-bottom: 20px; width: 100%; padding: 10px; border-radius: 5px" name="fabricanteProduto">
                            <option selected hidden disabled>Selecione um fabricante</option>
                            <?php
                            $query2 = "SELECT * FROM fabricante";
                            $result2 = mysqli_query($conn, $query2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "<option value='" . $row2['id_fabricante'] . "'>" . $row2['nome_fabricante'] . "</option>";
                            }
                            ?>
                        </select>

                        <h3>CATEGORIA</h3>
                        <select required style="display: block; margin-bottom: 20px; width: 100%; padding: 10px; border-radius: 5px" name="categoriaProduto">
                            <option selected hidden disabled>Selecione uma categoria</option>
                            <?php
                            $query3 = "SELECT * FROM categoria";
                            $result3 = mysqli_query($conn, $query3);
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo "<option value='" . $row3['id_categoria'] . "'>" . $row3['nome_categoria'] . "</option>";
                            }
                            ?>
                        </select>

                        <h3>PREÇO</h3>
                        <input required name="precoProduto" type="number" placeholder="Digite o preço">
                        <input type="submit" value="Adicionar">
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="listaProdutos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nome Produto</th>
                            <th>Fabricante</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                        </tr>

                        <?php

                        $query4 = "SELECT * FROM produtos";
                        $result4 = mysqli_query($conn, $query4);

                        while ($row4 = mysqli_fetch_assoc($result4)) {

                            $query5 = "SELECT nome_fabricante FROM fabricante WHERE id_fabricante = ".$row4['produto_fabricante'];
                            $result5 = mysqli_query($conn, $query5);
                            $query6 = "SELECT nome_categoria FROM categoria WHERE id_categoria = ".$row4['produto_categoria'];
                            $result6 = mysqli_query($conn, $query6);    

                            echo "<tr>

                            <td>".$row4['id_produto']."</td>
                            <td>".$row4['nome_produto']."</td>
                            <td>".mysqli_fetch_assoc($result5)['nome_fabricante']."</td>
                            <td>".mysqli_fetch_assoc($result6)['nome_categoria']."</td>
                            <td>R$ ".$row4['preco_produto']."
                            
                            <form method='POST' action='database/del_produto.php' style='display:inline'>
                            <input name='del_produto' value='".$row4['id_produto']."' class='delprd' type='hidden'>
                            <input class='delprd' type='submit' value='deletar'>
                            </form>
                            
                            </td>
                            
                            </tr>";
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>