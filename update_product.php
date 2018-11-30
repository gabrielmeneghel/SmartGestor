<?php
session_start();
$owner = $_SESSION['id'];
$product_id = $_GET['id'];




$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');

$product_select = "SELECT * FROM product WHERE product_id = '$product_id'";
$product_query = mysqli_query($connect,$product_select);
$row = mysqli_fetch_assoc($product_query);


$class_select = "SELECT class_id,class_name FROM class WHERE class_owner IS NULL or class_owner = '$owner'";
$class_query = mysqli_query($connect,$class_select);

$un_select = "SELECT un_id,un_name FROM un WHERE un_owner IS NULL or un_owner = '$owner'";
$un_query = mysqli_query($connect,$un_select);

$size_select = "SELECT size_id,size_name FROM size WHERE size_owner IS NULL or size_owner = '$owner'";
$size_query = mysqli_query($connect,$size_select);

$color_select = "SELECT color_id,color_name FROM color WHERE color_owner IS NULL or color_owner = '$owner'";
$color_query = mysqli_query($connect,$color_select);



?>

<html>
<head>
    <title>MeG - Cadastrar Produto</title>
</head>
<body>
    <form method="POST" action="update_products.php">
        <label>Nome:</label><input type="text" name="name" id="name" value="<?php echo $row['product_name']; ?>"><br>
        <label>Cod:</label><input type="text" name="code" id="code" value="<?php echo $row['product_code']; ?>"><br>
        <label>Valor de venda:</label><input type="number" name="s_price" id="s_price" value="<?php echo $row['s_price']; ?>"><br>
        <label>Valor de compra:</label><input type="number" name="c_price" id="c_price" value="<?php echo $row['c_price']; ?>"><br>
        <label>Estoque máximo:</label><input type="number" name="max" id="max" value="<?php echo $row['product_max']; ?>"><br>
        <label>Estoque mínimo:</label><input type="number" name="min" id="min" value="<?php echo $row['product_min']; ?>"><br>
        <label>Estoque atual:</label><input type="number" name="current" id="current" value="<?php echo $row['product_current']; ?>"><br>
        <?php echo'Categoria: '; ?>
        <select name='class'>
            <?php
            while($class = $class_query->fetch_array()){
                echo '<option value="'.$class["class_id"].'" selected="'.$_SESSION['class'].'">'.$class["class_name"].'</option>';
            }
            ?>
        </select><br>
            <?php echo'Unidade de medida: '; ?>
        <select selected='M' name='un'>
            <?php
            while($un = $un_query->fetch_array()){
                echo '<option selected="'.$productun_query.'" value="'.$un["un_id"].'">'.$un["un_name"].'</option>';
            }
            ?>
        </select><br>
        <?php echo'Tamanho: '; ?>
        <select name='size'>
            <?php
            while($size = $size_query->fetch_array()){
                echo '<option value="'.$size["size_id"].'">'.$size["size_name"].'</option>';
            }
            ?>
        </select><br>
            <?php echo'Cor: '; ?>
        <select name='color'>
            <?php
            while($color = $color_query->fetch_array()){
                echo '<option value="'.$color["color_id"].'">'.$color["color_name"].'</option>';
            }
            ?>
        </select><br><br>
        <input type="submit" value="Atualizar"  />
    </form>
</body>
</html>