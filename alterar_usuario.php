<?php include("sessao.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsivo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>CloudShop</title>
</head>

<body>
    <div class="container cadastro">
        <?php 
            include("header.php"); 

            $sql = mysqli_query($con, "Select * from clientes where id=".$id_logado);
            $qregistro = mysqli_num_rows($sql);
            $exibe = mysqli_fetch_assoc($sql);

            if($exibe["pessoa"] == "fisica"){
                $fisica = "checked";
                $juridica = "";
            }else{
                $fisica = "";
                $juridica = "checked";
            }
        ?>

        <form action="./CRUD/alterar_usuario.php" method="post" id="form">
            <div class="botoes">
                <button type="button" id="menu-login">Informações de Login</button>
                <button type="button" id="menu-pessoais" disabled>Informações Pessoais</button>
                <button type="button" id="menu-pagamento" disabled>Informações de Pagamento</button>
            </div>
            <div class="infos">
                <div class="info info-login" id="info-login">
                    <div class="titulo">
                        Informações de Login
                    </div>
                    <div class="inputs">
                        <input type="email" name="email" placeholder="E-mail *" value="<?php echo $exibe['email']; ?>" required>
                        <input type="password" name="senha" placeholder="Senha *" value="<?php echo $exibe['senha']; ?>" required>
                        <p class="aviso">Preencha o formulario antes de continuar</p>
                        <button type="button" id="continuar-pessoais">Continuar</button>
                    </div>
                </div>
                <div class="info info-pessoais" id="info-pessoais">
                    <div class="titulo">
                        Informações Pessoais
                    </div>
                    <div class="inputs">
                        <input type="text" name="nome" placeholder="Nome Completo *" value="<?php echo $exibe['nome']; ?>" required>
                        <div class="radio">
                            <p>
                                <label for="contaFisica">
                                    <input type="radio" name="pessoa" value="fisica" id="contaFisica" required <?php echo $fisica;?>>
                                </label>
                                Pessoa Física
                            </p>
                            <p>
                                <label for="contaJuridica">
                                    <input type="radio" name="pessoa" value="juridica" id="contaJuridica" required <?php echo $juridica;?>> 
                                </label>
                                Pessoa Jurídica
                            </p>
                        </div>
                        <input type="text" name="cpf" placeholder="CPF *" value="<?php echo $exibe['cpf']; ?>" required>
                        <input type="text" name="cnpj" placeholder="CNPJ *" value="<?php echo $exibe['cnpj']; ?>" required>
                        <p class="input-titulo">Nascimento *</p>
                        <input type="date" name="nascimento" placeholder="Nascimento *" value="<?php echo $exibe['nascimento']; ?>" required>
                        <input type="text" name="telefone" placeholder="Celular *" value="<?php echo $exibe['telefone']; ?>" required>
                        <input type="text" name="endereco" placeholder="Endereço de Entrega *" value="<?php echo $exibe['endereco']; ?>" required>
                        <input type="text" name="cep" placeholder="CEP *" value="<?php echo $exibe['cep']; ?>" required>
                        <p class="aviso">Preencha o formulario antes de continuar</p>
                        <button type="button" id="voltar-login">Voltar</button>
                        <button type="button" id="continuar-pagamento">Continuar</button>
                    </div>
                </div>
                <div class="info info-pagamento" id="info-pagamento">
                    <div class="titulo">
                        Informações de Pagamento
                    </div>
                    <div class="inputs">
                        <p class="aviso">Preencha o formulario antes de continuar</p>
                        <input type="number" name="cartao" placeholder="Numero do Cartao *" value="<?php echo $exibe['cartao']; ?>" required>
                        <input type="text" name="titular" placeholder="Nome do Titular *" value="<?php echo $exibe['titular']; ?>" required>
                        <input type="number" name="codigo" placeholder="Código de Segurança *" value="<?php echo $exibe['codigo']; ?>" required>
                        <p class="input-titulo">Vencimento *</p>
                        <input type="date" name="vencimento" placeholder="Vencimento *" value="<?php echo $exibe['vencimento']; ?>" required>
                        <button type="button" id="voltar-pessoais">Voltar</button>
                        <button type="submit" id="concluir">Finalizar</button>
                        <button type="submit" id="deletar">Deletar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("#menu-login").on("click", function(){
                $("#info-login").css("display", "flex");
                $("#info-pessoais").css("display", "none");
                $("#info-pagamento").css("display", "none");

                $("#menu-pessoais").css("background-color", "var(--4)");
                $("#menu-pessoais").css("color", "black");

                if($("#menu-pagamento").attr("disabled") == false){
                    $("#menu-pagamento").css("background-color", "var(--4)");
                    $("#menu-pagamento").css("color", "black");
                }
            });

            $("#menu-pessoais").on("click", function(){
                $("#info-login").css("display", "none");
                $("#info-pessoais").css("display", "flex");
                $("#info-pagamento").css("display", "none");

                if($("#menu-pagamento").attr("disabled") == false){
                    $("#menu-pagamento").css("background-color", "var(--4)");
                    $("#menu-pagamento").css("color", "black");
                }
            });

            $("#menu-pagamento").on("click", function(){
                $("#info-login").css("display", "none");
                $("#info-pessoais").css("display", "none");
                $("#info-pagamento").css("display", "flex");

                $("#menu-login").css("background-color", "var(--3)");
                $("#menu-login").css("color", "white");
                $("#menu-pessoais").css("background-color", "var(--3)");
                $("#menu-pessoais").css("color", "white");
            });

            $("#continuar-pessoais").on("click", function(){
                var cont = 0;

                $(("#info-login input")).each(function(){
                    if($(this).val() == ""){
                        cont++;
                    }
                });

                if(cont == 0){
                    $("#info-login").css("display", "none");
                    $("#info-pessoais").css("display", "flex");
                    $("#menu-pessoais").attr("disabled", "false");
                    $("#menu-pessoais").css("background-color", "var(--3)");
                    $("#menu-pessoais").css("color", "white");
                }else{
                    $("#info-login").find(".aviso").css("display", "flex");
                }

                
            });
            $("#voltar-login").on("click", function(){
                $("#info-login").css("display", "flex");
                $("#info-pessoais").css("display", "none");
                $("#info-pagamento").css("display", "none");
                $("#menu-pessoais").css("background-color", "var(--4)");
                $("#menu-pessoais").css("color", "black");
                $("#menu-pagamento").css("background-color", "var(--4)");
                $("#menu-pagamento").css("color", "black");
            });
            $("#continuar-pagamento").on("click", function(){
                var cont = 0;

                $(("#info-pessoais input")).each(function(){
                    if($(this).val() == ""){
                        cont++;
                    }
                });

                if(cont == 0){
                    $("#info-pessoais").css("display", "none");
                    $("#info-pagamento").css("display", "flex");
                    $("#menu-pagamento").attr("disabled", "false");
                    $("#menu-pagamento").css("background-color", "var(--3)");
                    $("#menu-pagamento").css("color", "white");
                }else{
                    $("#info-pessoais").find(".aviso").css("display", "flex");
                }
                });
            });
            $("#voltar-pessoais").on("click", function(){
                $("#info-login").css("display", "none");
                $("#info-pessoais").css("display", "flex");
                $("#info-pagamento").css("display", "none");
                $("#menu-pessoais").css("background-color", "var(--3)");
                $("#menu-pessoais").css("color", "white");
                $("#menu-pagamento").css("background-color", "var(--4)");
                $("#menu-pagamento").css("color", "black");
            });
            $("#concluir").on("click", function(){
                $("#form").submit();
            });
            $("#deletar").on("click", function(){
                $("#form").attr("action", "./CRUD/deletar_usuario.php");
                $("#form").submit();
            });
    </script>
</body>
</html>