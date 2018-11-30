<?php
session_start();
$owner = $_SESSION['id'];
$row["cliente_id"] = $_SEESION['del'];
$row["class_id"] = $_SESSION['class'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');

$select = "SELECT cliente_new.*
            FROM cliente_new
            WHERE cliente_owner = '$owner'";
$query = mysqli_query($connect,$select);

?>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MeG - Clientes</title>
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
        if(confirm ("Deseja realmente apagar os clientes selecionados? Essa ação não pode ser desfeita!"))
            return true;
        else
            return false;
    }
    
    function confirmarexclusaouni(){
        if(confirm ("Deseja realmente apagar este cliente? Essa ação não pode ser desfeita!"))
            return true;
        else
            return false;
    }
    
    </script>
  </head>
  <body>
      <div class="btn-group" style="margin: auto;">
        <a name="cliente" class="btn btn-secondary" href="cliente.php">Cadastrar cliente</a>
      </div>
      <div class="btn-group" style="margin: auto;">
        <a name="dash" class="btn btn-secondary" href="dash.php">Voltar<a/><br>
      </div><br>
       <br><form name="formulario" method="POST" action="delete_cliente_all.php">
        <input type="submit" class="btn btn-danger" name="Submit" value="Excluir Selecionados" onClick="return confirmarexclusao()"><br><br>
        <table class="table table-sm">
            <thead class="thead-dark">
            <tr>
                <td><input type=checkbox name="selall" onClick="CheckAll()"><span id="checar"></span><br></td>
                <td>Cod</td>
                <td>Nome</td>
                <td>Razão Social</td>
                <td>CPF</td>
                <td>CNPJ</td>
                <td>Endereço</td>
            </tr>
        </thead>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {

            echo '<tr>';
            echo '<td><input type="checkbox" name="check[]" value="'.$row["cliente_id"].'"/></td>';
            echo '<td>'.$row["cliente_code"].'</td>';
            echo '<td>'.$row["cliente_name"].'</td>';
            echo '<td>'.$row["cliente_razao"].'</td>';
            echo '<td>'.$row["cliente_cpf"].'</td>';
            echo '<td>'.$row["cliente_cnpj"].'</td>';
            echo '<td>'.$row["cliente_address"].'</td>';
            echo '<td><a href="update_cliente.php?id='.$row["cliente_id"].'">[ Editar ]</a></td>';
            echo '<td><a href="delete_cliente.php?id='.$row["cliente_id"].'" onClick="return confirmarexclusaouni()">[ Excluir ]</a></td>';
            echo '</tr>';
            }
            ?>
        </table>
        </form>
  </body>
</html>