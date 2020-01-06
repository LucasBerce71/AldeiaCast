<?php
  // phpinfo();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AldeiaCast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 absolute transparent" role="banner">

      <div class="container">
        <div class="row align-items-center">
          

          <div class="col-3" data-aos="fade-down">
            <h1><a href="../php/index.php" class="text-white h2">AldeiaCast</a></h1>
          </div>
          <div class="col-9" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">

                

                <div class="d-inline-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none">
                  <li>
                    <a href="#">Dashboard</a>
                  </li>
                  <li>
                    <a href="editAdm.php">Editar áudios cadastrados</a>
                  </li>
                  <li>
                    <a href="../php/index.php">Sair</a>
                  </li>
                </ul>
            </nav>


          </div>

        </div>
      </div>
      
    </header>

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/g0.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-2 display-4">Área Administrativa</h2>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-6 mb-5">

            <form method="POST" action="adm.php" class="bg-white" enctype="multipart/form-data">
              
              <div class="p-5 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="txtAutor" class="text-black">Autores <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="txtAutor" name="txtAutor">
                  </div>
                  <div class="col-md-6">
                    <label for="txtAutor" class="text-black">Fase Modernista <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="txtFase" name="txtFase">
                  </div>
                  <div class="col-md-6">
                    <label for="txtAlunos" class="text-black">Alunos <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="txtAlunos" name="txtAlunos">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="txtSala" class="text-black">Sala <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="txtSala" name="txtSala" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="arqAudio" class="text-black">Aúdio </label>
                    <input type="file" class="form-control" id="mp3" name="arqAudio">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="arqImg" class="text-black">Imagem</label>
                    <input type="file" class="form-control" id="arqImg" name="arqImg">

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                   <input type="submit" class="btn btn-primary btn-lg" name="btnCadPodcast" value="cadastrar grupo">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
        // var_dump($_POST);
        if(isset($_POST)){
          $btnCadPodcast = filter_input(INPUT_POST, 'btnCadPodcast', FILTER_SANITIZE_STRING);

          if($btnCadPodcast){
  
              include_once 'conexao.php';
  
              $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  
              $erro = false;
  
              $dados_st = array_map('strip_tags', $dados_rc);
  
              $dados = array_map('trim', $dados_st);  
              // var_dump($_FILES);
              // die();
              if(empty($_FILES["arqImg"]["tmp_name"]) or empty($_FILES["arqAudio"]["tmp_name"])){
                $erro = true;
              }elseif(!getimagesize($_FILES["arqImg"]["tmp_name"])){
                $erro = true;
              }
  
              if($_FILES["arqImg"]['size'] >= 100000000){
                echo "<script language='javascript'>alert('Imagem muito pesada.')</script>";        
                $erro = true;      
              } 
              $nomePartesImg = explode(".", $_FILES["arqImg"]["name"]);
              $extensaoImg = end($nomePartesImg);
  
              $novoNomeImg =  uniqid(mt_rand(),TRUE); 
              $novoNomeImg = str_replace(".","",$novoNomeImg) . "." . $extensaoImg;      
              $nomePastaImg = "img-jacaquinha";
              if(!is_dir($nomePastaImg)){
                mkdir($nomePastaImg, 0777, true); 
              }
              $mover = move_uploaded_file($_FILES["arqImg"]["tmp_name"], $nomePastaImg . DIRECTORY_SEPARATOR . $novoNomeImg);
              if(!$mover){
                echo "<script language='javascript'>alert('Erro ao enviar a imagem')</script>"; 
                $erro = true;
              }     
  
              if($_FILES["arqAudio"]['size'] >= 100000000){
                echo "<script language='javascript'>alert('Áudio muito pesado')</script>";  
                $erro = true;
              } 
              // var_dump($_FILES["arqAudio"]);
              $nomePartesAudio = explode(".", $_FILES["arqAudio"]["name"]);
              $extensaoAudio = end($nomePartesAudio);
  
              $novoNomeAudio =  uniqid(mt_rand(),TRUE); 
              $novoNomeAudio = str_replace(".","",$novoNomeAudio) . "." . $extensaoAudio;     
              $nomePastaAudio = "audios-jaca";
              if(!is_dir($nomePastaAudio)){
                mkdir($nomePastaAudio, 0777, true); 
              }
              $mover = move_uploaded_file($_FILES["arqAudio"]["tmp_name"], $nomePastaAudio . DIRECTORY_SEPARATOR . $novoNomeAudio);
              if(!$mover){
                echo "<script language='javascript'>alert('Erro ao enviar áudio')</script>"; 
              }     
  
              if(!$erro){            
                  $ativo = 'A';
                  $result_cadastro = "INSERT INTO grupos (Integrantes, Sala, Autores, Fase, Audio, Imagem, Ativo) 
                   VALUES(
                       '".$dados['txtAlunos']."', 
                       '".$dados['txtSala']."', 
                       '".$dados['txtAutor']."', 
                       '".$dados['txtFase']."',
                       'Aqui/audios-jaca/" . $novoNomeAudio . "',
                       'Aqui/img-jacaquinha/" . $novoNomeImg . "',
                       '" .$ativo. "'                    
                       )";                  
                    $resultado_cadastro = mysqli_query($conn, $result_cadastro);                 
                    if(mysqli_insert_id($conn)){
                      echo "<script language='javascript'>alert('Podcast cadastrado com sucesso!')</script>";
                    }else{
                      echo "<script language='javascript'>alert('Ops! Parece que algo inesperado ocorreu ao tentar cadastrar o podcast na plataforma!')</script>";
                    }
              }else{
                echo "<script language='javascript'>alert('Necessário preencher todos os campos')</script>";
              }
          }
        }
        
    ?>

    
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/g0.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h2>Cadastre-se</h2>
            <p class="mb-5">Entre com seu email e receba todas as novidades da plataforma</p>
            <form action="#" method="post" class="site-block-subscribe">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Insira seu email aqui" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">Cadastrar</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>  
    
    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-5">
                <h3 class="footer-heading mb-4">Sobre a nossa plataforma de podcast</h3>
                <p>O AldeiaPodcast é uma plataforma onde alunos da escola E.E.ALDEIA DE BARUERI gravam podcasts para ajudar você arrasar nos vestibulares e ficar por dentro da nossa literatura brasileira</p>
              </div>
  
              
              
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">

  
              <div class="row">
                <div class="col-md-12">
                  <h3 class="footer-heading mb-4">Siga a E.E.ALDEIA DE BARUERI nas redes sociais</h3>
  
                  <div>
                    <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                  </div>
                </div>
              </div>
  
            </div>
  
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="mb-5">
                <h3 class="footer-heading mb-4">AldeiaCast</h3>
  
                <div class="block-16">
                  <figure>
                    <img src="images/g0.jpeg" alt="Image placeholder" class="img-fluid rounded">
                  </figure>
                </div>
  
              </div>
  
            </div>
            
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Plataforma desenvolvida por LUCAS BERCÊ DE JESUS.
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
            
          </div>
        </div>
      </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/mediaelement-and-player.min.js"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>
    

  <script src="js/main.js"></script>
    
  </body>
</html>