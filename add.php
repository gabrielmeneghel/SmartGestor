<?PHP
 
session_start();
 
$id = $_SESSION['id'];
$name = $_SESSION['name'];
 
?>
<html lang="pt-br">
    <head>
  
        <meta charset="utf-8"/>
        <title>MeG - Início</title>
    </head>
    <body>
        <h2>Porque utilizamos propagandas?</h2>
        <?php 
            echo 'Então '.$name.'...<br><br>';
            echo 'Somos um grupo que visa auxiliar os empreendedores autônomos, seja você uma costureira, um vendedor de sorvetes, alguém que vende miçangas ou o dono de um brechó.<br>
                Sabendo como não é fácil encontrar sistemas que realizem controle de estoque e vendas gratuitamente ou por um preço acessível, resolvemos ajudar vocês nessa caminhada disponibilizando um sistema que realize tal controle gratuitamente <3';    
        ?>
        <h4>Meu estoque grátis será gratuito para sempre?</h4>
        <?php 
            echo 'A resposta é SIM!<br><br>';
            echo 'Não vemos sentido em cobrar de você, empreendedor autônomo, um valor para lhe auxiliar a alavancar o seu negócio.<br>
            Por isso nunca iremos cobrar por um favor que estamos prestando a você essa ajuda!';
        ?>
        <h4>E os custos para manter e desenvolver o sistema?</h4>
        <?php 
            echo 'Os custos para manter o sistema no ar são todos bancados por nós.<br>
            Hoje somos uma equipe de de 2 pessoas, <a href="https://www.linkedin.com/in/tiago-martins-276766121/">Tiago Martins<a/> e <a href="">Gabriel Meneghel</a>. Começamos a pensar e desenvolver o sistema no terceiro trimestre de 2018 e temos o maior prazer em arcar com os custos para mante-lo funcional para vocês!';
        ?>
        <h4>Como posso contribuir para manter o sistema ativo?</h4>
        <?php 
            echo 'Como dito anteriormente, o sistema é gratuito e sempre será.<br>
            Mas caso você queira contribuir para deixar ele sempre online e ajudar outros empreendedores como você, pode realizar uma doação!<br>
            100% do valor adquirido é utilizado para manter o sistema sempre ativo e operante!<br>
            Para realizar uma doação, pode clicar no botão que está logo a baixo.<br><br>';
        ?>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
        ">
        <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
        </form>

        
    </body>
</html>