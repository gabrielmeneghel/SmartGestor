<?php
session_start();
$owner = $_SESSION['id'];
$fornecedor = $_GET['id'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');


if(mysqli_connect_error()){
    die('Não foi possível conectar ao banco:'. mysqli_connect_error());
    exit();
}else{
    $query = "DELETE FROM fornecedor WHERE fornecedor_id = '$fornecedor'";
    $delete = mysqli_query($connect,$query);
                
    if($delete){
        echo"<script language='javascript' type='text/javascript'>alert('Exclusão realizada com sucesso!');window.location.href='list_fornecedors.php'</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar a exclusão :(');window.location.href='list_fornecedors.php'</script>";
    }
}
?>