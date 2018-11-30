<?php
session_start();
$owner = $_SESSION['id'];
$row["product_id"] = $_SEESION['del'];
$row["class_id"] = $_SESSION['class'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');

$select = "SELECT product.*,class.class_name,size.size_name,un.un_name,color.color_name
            FROM product
            INNER JOIN class ON product.product_class = class.class_id
            INNER JOIN size ON product.product_size = size.size_id
            INNER JOIN un ON product.product_un = un.un_id
            INNER JOIN color ON product.product_color = color.color_id
            WHERE product_owner = '$owner'";
$query = mysqli_query($connect,$select);

?>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MeG - Produtos</title>
    <meta charset="utf-8">
    <script language=javascript>
    cont = 0;
    function CheckAll() { 
       for (var i=0;i<document.formulario.elements.length;i++) {
            var x = document.formulario.elements[i];
            if (x.type== 'checkbox') { 
    x.checked = document.formulario.selall.checked;
            } 
        }
    } 
    
    function confirmarexclusao(){
        if(confirm ("Deseja realmente apagar os produtos selecionados? Essa ação não pode ser desfeita!"))
            return true;
        else
            return false;
    }
    
    function confirmarexclusaouni(){
        if(confirm ("Deseja realmente apagar este produto? Essa ação não pode ser desfeita!"))
            return true;
        else
            return false;
    }
    
    </script>
  </head>
  <body>
        <div class="btn-group" style="margin: auto;">
             <a name="product" class="btn btn-secondary" href="product.php">Cadastrar produto</a>
        </div>
        <div class="btn-group" style="margin: auto;">
             <a name="busca_produto" class="btn btn-secondary" href="busca_produto.html">Buscar produto</a>
        </div>
        <div class="btn-group" style="margin: auto;" >
             <a name="dash" class="btn btn-secondary" href="dash.php">Voltar<a/>
        </div><br>
        <br>
        <form name="formulario" method="POST" action="delete_product_all.php">
        <br>
        <input type="submit" class="btn btn-danger" name="Submit" value="Excluir Selecionados" onClick="return confirmarexclusao()"><br><br>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                <td><input type=checkbox name="selall" onClick="CheckAll()"><span id="checar"></span><br></td>
                <td>Cod</td>
                <td>Nome</td>
                <td>Valor de venda</td>
                <td>Valor de compra</td>
                <td>Estoque máximo</td>
                <td>Estoque mínimo</td>
                <td>Estoque atual</td>
                <td>Categoria</td>
                <td>Unidade de Medida</td>
                <td>Tamanho</td>
                <td>Cor</td>
                </tr>
          </thead>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {

            echo '<tr>';
            echo '<td><input type="checkbox" name="check[]" value="'.$row["product_id"].'"/></td>';
            echo '<td>'.$row["product_code"].'</td>';
            echo '<td>'.$row["product_name"].'</td>';
            echo '<td>'.$row["s_price"].'</td>';
            echo '<td>'.$row["c_price"].'</td>';
            echo '<td>'.$row["product_max"].'</td>';
            echo '<td>'.$row["product_min"].'</td>';
            echo '<td>'.$row["product_current"].'</td>';
            echo '<td>'.$row["class_name"].'</td>';
            echo '<td>'.$row["un_name"].'</td>';
            echo '<td>'.$row["size_name"].'</td>';
            echo '<td>'.$row["color_name"].'</td>';
            echo '<td><a href="update_product.php?id='.$row["product_id"].'">[ Editar ]</a></td>';
            echo '<td><a href="delete_product.php?id='.$row["product_id"].'" onClick="return confirmarexclusaouni()">[ Excluir ]</a></td>';
            echo '</tr>';
            }
            ?>
        </table>
        </form>
  </body>
</html>