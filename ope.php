<?php 

session_start();

$user_email = $_POST['email'];
$user_pass = md5($_POST['pass']);

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg') or die('Fudeu');
$db = mysqli_select_db('u982947535_mlg');
$login = mysqli_query($connect, "SELECT * FROM client WHERE user_email = '$user_email' AND user_pass = '$user_pass'");
$row = mysqli_fetch_assoc($login);

/*while($print = mysqli_fetch_assoc($login)){
    echo "ID:".$print["id"]."<br />";
    echo "Email:".$print["email"]."<br />";
    echo "Pass:".$print["pass"]."<br />";
}*/

if(mysqli_num_rows ($login) > 0 ){

$_SESSION['email'] = $user_email;
$_SESSION['pass'] = $user_pass;
$_SESSION['id'] = $row['user_id'];
$_SESSION['name'] = $row['user_name'];
header('location:dash.php');
}else{
    echo '<script>alert("E-mail ou senha inválidos"); </script>';
   
}
