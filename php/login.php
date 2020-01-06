<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <!-- Form -->
                    <form action="adm.php" method="POST" onsubmit="validar(this); return false;">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="login" class="form-control form-control-lg" placeholder="Nome de usuário" aria-label="Username" aria-describedby="basic-addon1" id="userTxt">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="senha" class="form-control form-control-lg" placeholder="Senha" aria-label="Password" aria-describedby="basic-addon1" id="userPass">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> esqueci minha senha</button>
                                        <input type="submit" name="btnLogar" class="btn btn-success float-right" id="btnLogar" value="Login"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white" id="instrucao">Entre com seu email para enviarmos sua nova senha!</span>
                    </div>
                    <div class="row m-t-20">
                        <form class="col-12" action="index.html">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Digite aqui seu email" aria-label="Username" aria-describedby="basic-addon1" id="txtcEmail">
                            </div>
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Lembrei minha senha</a>
                                    <button class="btn btn-info float-right" type="button" name="action" onclick="recuperar()">Recuperar senha</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <?php
        include_once "conexao.php";
        $btnLogin = filter_input(INPUT_POST, 'btnLogar', FILTER_SANITIZE_STRING);
        if($btnLogin){
            $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            //echo "$usuario - $senha";
            if((!empty($usuario)) AND (!empty($senha))){
                //Gerar a senha criptografada
                //echo password_hash($senha, PASSWORD_DEFAULT);
                //Pesquisar o usuario no banco de dados
                $result_usuario = "SELECT iduser, usuario, senha FROM usuarios 
                WHERE usuario = '$usuario' LIMIT 1 AND ativo = 'A'";
                $resultado_usuario = mysqli_query($conn, $result_usuario);
                if($result_usuario){
                    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                    if(password_verify($senha, $row_usuario['senha'])){
                        $_SESSION['iduser'] = $row_usuario['iduser'];
                        //$_SESSION['nome'] = $row_usuario['nome'];
                       // $_SESSION['email'] = $row_usuario['email'];
                        $_SESSION['usuario'] = $row_usuario['usuario'];
                        $_SESSION['senha'] = $row_usuario['senha'];
                        header("Location: adm.php");
                        
                    }else{
                        echo "Senha incorreta, tente novamente";
                        header("Location: login.php");
                    }
                }
            }else{
                echo "Login ou senha incorretos";
                header("Location: login.php");
            }
        }else{
            echo "Página não encontrada";
            header("Location: login.php");
        }
    ?>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/valLogin.js"></script>
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
</body>
</html>