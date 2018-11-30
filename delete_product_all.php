<?php
session_start();

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');


if(isset($_POST['check'])) {
	foreach($_POST["check"] as $registro){  
    	mysqli_query($connect, "DELETE FROM product WHERE product_id = $registro ");
    }
    echo"<script language='javascript' type='text/javascript'>alert('Exclusão realizada com sucesso!');window.location.href='list_product.php'</script>";
}else{
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar a exclusão :(');window.location.href='list_product.php'</script>";
}
?>