<?php
    
$user_name = $_POST['name'];
$user_pass = md5($_POST['pass']);
$v_pass = md5($_POST['v_pass']);
$user_email = $_POST['email'];
        
$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');
$query_select = "SELECT user_email FROM client WHERE user_email = '$user_email'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['user_email'];
        
if(mysqli_connect_error()){
    die('Não foi possível conectar ao banco:'. mysqli_connect_error());
    exit();
}else{
    if($user_email == "" || $user_email == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo de e-mail é obrigatório');window.location.href='cadastro.html';</script>";
    }elseif(empty($_POST['pass'])){
        echo"<script language='javascript' type='text/javascript'>alert('O campo de senha é obrigatório');window.location.href='cadastro.html';</script>";
    }elseif(empty($_POST['v_pass'])){
        echo"<script language='javascript' type='text/javascript'>alert('O campo de confirmação de senha é obrigatório');window.location.href='cadastro.html';</script>";
    }elseif($user_name == "" || $user_name == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo de nome é obrigatório');window.location.href='cadastro.html';</script>"; 
    }elseif($user_email == $logarray){
        echo"<script language='javascript' type='text/javascript'>alert('Esse e-mail já está cadastrado');window.location.href='cadastro.html';</script>";
    }else{
        $query = "INSERT INTO client (user_name,user_email,user_pass) VALUES ('$user_name','$user_email','$user_pass')";
        $insert = mysqli_query($connect,$query);
                
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='login.php'</script>";
        }else{
            die('Não foi possível realizar o cadastro :(');
        }
    }
}