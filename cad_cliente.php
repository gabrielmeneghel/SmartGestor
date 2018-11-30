<?php
session_start();

$owner = $_SESSION['id'];
$code = $_POST['code'];
$name = $_POST['name'];
$razao = $_POST['razao'];
$cnpj = $_POST['cnpj'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');
$query_select = "SELECT code FROM cliente_new WHERE owner = '$owner' AND code = '$code'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['code'];


if(mysqli_connect_error()){
    die('Não foi possível conectar ao banco:'. mysqli_connect_error());
    exit();
}   else{
        if($name == "" || $name == null){
            echo"<script language='javascript' type='text/javascript'>alert('O nome do cliente é obrigatório!');window.location.href='cliente.php';</script>";
        }elseif($code == $array){
        echo"<script language='javascript' type='text/javascript'>alert('Já existe um cliente com esse código!');window.location.href='cliente.php';</script>";
        }else{
            $query = "INSERT INTO cliente_new(cliente_name,cliente_owner,cliente_code,cliente_cnpj,cliente_cpf,cliente_address, cliente_razao)VALUES('$name','$owner','$code','$cnpj','$cpf','$endereco','$razao')";
            $insert = mysqli_query($connect,$query);
        }
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='list_clientes.php';</script>";
            
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro :');window.location.href='list_clientes.php';</script>";
            } 
        }


