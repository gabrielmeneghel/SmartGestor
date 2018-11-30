<?php
session_start();

$owner = $_SESSION['id'];
$name = $_POST['name'];
$code = $_POST['code'];
$s_price = $_POST['s_price'];
$c_price = $_POST['c_price'];
$max = $_POST['max'];
$min = $_POST['min'];
$current = $_POST['current'];
$class = $_POST['class'];
$un = $_POST['un'];
$size = $_POST['size'];
$color = $_POST['color'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');
$query_select = "SELECT code FROM product WHERE owner = '$owner' AND code = '$code'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['code'];

if(mysqli_connect_error()){
    die('Não foi possível conectar ao banco:'. mysqli_connect_error());
    exit();
}else{
    if($name == "" || $name == null){
        echo"<script language='javascript' type='text/javascript'>alert('O nome do produto é obrigatório!');window.location.href='product.php';</script>";
    }elseif($code == $array){
        echo"<script language='javascript' type='text/javascript'>alert('Já existe um produto com esse código!');window.location.href='product.php';</script>";
    }else{
        
        $query = "INSERT INTO product (product_owner,product_name,product_code,s_price,c_price,product_max,product_min,product_current,product_class,product_un,product_size,product_color) VALUES ('$owner','$name','$code','$s_price','$c_price','$max','$min','$current','$class','$un','$size','$color')";
        $insert = mysqli_query($connect,$query);
        
        
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='list_product.php'</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro :(');window.location.href='list_product.php'</script>";
        }
    }
}