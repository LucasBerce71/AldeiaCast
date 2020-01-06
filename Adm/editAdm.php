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

    <link rel="stylesheet" href="comando.css">

    <link rel="stylesheet" href="Animate.css">

    <link rel="stylesheet" href="sweetalert2.min.css">
    
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

    <div class="site-blocks-cover overlay" style="background-image: url(../images/mod.png);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-2 display-4">Área Administrativa</h2>
            <div class="text-white mb-4"><span class="text-white-opacity-05"><small>Edite seus podcasts aqui</small></span></div>

          </div>
        </div>
      </div>
    </div>  


    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-danger">
              Atenção! Após excluir algum arquivo nessa área, a única maneira de recuperá-lo será
              entrando em contato com o desenvolvedor da plataforma. Então se for excluir seja administrador!
            </h2>
            <hr/>       
          </div>
        </div>
        
        <?php

include_once 'conexao.php';

$result_consulta = "SELECT * FROM grupos WHERE Ativo = 'A'";

$resultado_consulta = mysqli_query($conn, $result_consulta);

if(mysqli_num_rows($resultado_consulta) <= 0){
  echo "<h2 style='color: red;'>Ops! Parece que ainda não temos nenhum grupo cadastrado na plataforma!</h2>";
}else{
  while($rows = mysqli_fetch_assoc($resultado_consulta)){
    echo "
    <form method='POST' action=''>
    <div class='d-block d-md-flex podcast-entry bg-white mb-5' data-aos='fade-u'>
     <div class='image' style='background-image: url(../" .$rows['Imagem']. ");'></div>
    <div class='text'>
      <h3 class='font-weight-light'><a href='#'>" .$rows['Autores']. "</a></h3>
      <div class='text-white mb-3'><span class='text-black-opacity-05'>
        <small>
          ALUNOS: " .$rows['Integrantes']. "
        </small><br>
        <small>" .$rows['Sala']. "</small>
      </div>
      <div class='player'>
        <a href='excluirPodcast.php?idPodcast=".$rows['idGrupo']."' class='btn btn-danger'>Excluir</a>
      </div>

    </div>
  </div>
  </form>";

  }
}

?>



  


    <div class="site-blocks-cover overlay inner-page-cover" style="margin-top: 19px; background-image: url(../images/mod.png);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h2>Deseja receber alertas dos nossos podcasts?</h2>
            <p class="mb-5">Cadastre seu email e enviaremos todos nossos próximos lançamentos.</p>
            <form action="index.html" method="post" onsubmit="validarEmail(this); return false;" class="site-block-subscribe">
                <div class="input-group mb-3">
                  <input type="email" class="form-control border-secondary text-white bg-transparent" placeholder="Insira seu email aqui" aria-label="Insira seu email aqui" aria-describedby="button-addon2" id="txtEmail">
                  <div class="input-group-append">
                    <button class="btn btn-primary" onclick="validarEmail()" id="button-addon2">Cadastrar</button>
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
                  <a href="https://www.facebook.com/aldeiade.barueri" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <!--<a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>-->
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">AldeiaCast</h3>

              <div class="block-16">
                <figure>
                  <img src="images/gpTodo.jpeg" alt="Image placeholder" class="img-fluid rounded">
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
  <script src="sweetalert2.min.js"></script>
  <script src="controller/controlForms.js"></script>
    
  </body>
</html>