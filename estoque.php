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
    <title>MeG - Estoques</title>
    <body>
        <a name="dash" class="btn btn-secondary" href="dash.php">Voltar<a/><br><br>
        <table border="1px">
            <tr bgcolor="#FFFACD">
                <td>Cod</td>
                <td>Nome</td>
                <td>Estoque mínimo</td>
                <td>Estoque máximo</td>
                <td>Estoque atual</td>
                <td>Tamanho</td>
                <td>Cor</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {

            echo '<tr>';
            echo '<td>'.$row["product_code"].'</td>';
            echo '<td>'.$row["product_name"].'</td>';
            echo '<td>'.$row["product_min"].'</td>';
            echo '<td>'.$row["product_max"].'</td>';
            echo '<td>'.$row["product_current"].'</td>';
            echo '<td>'.$row["size_name"].'</td>';
            echo '<td>'.$row["color_name"].'</td>';
            echo '</tr>';
            }
            ?>
        </table>
        </form>
  </body>
</html>