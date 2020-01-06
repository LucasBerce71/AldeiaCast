<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AldeiaCast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">

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
            <h1><a href="index.php" class="text-white h2">AldeiaCast</a></h1>
          </div>
          <div class="col-9" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">

                

                <div class="d-inline-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none">
                  <li>
                    <a href="index.php">Início</a>
                  </li>
                  <li class="has-children">
                    <a href="#">Fases do modernismo</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="fase1.php">Fase 1</a></li>
                      <li><a href="fase2.php">Fase 2</a></li>
                      <li><a href="fase3.php">Fase 3</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="../perguntas.html">Jogue nosso quiz</a>
                  </li>
                  <li>
                    <a href="../Aqui/adm.php">Área Administrativa</a>
                  </li>
                  <li>
                    <a href="contact.php">Contato do desenvolvedor</a>
                  </li>
                </ul>
            </nav>
          </div>

        </div>
      </div>
      
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url(../images/fase2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-2 display-4">Segunda Fase</h2>
            <div class="text-white mb-4"><span class="text-white-opacity-05"><small>Gravado Por: Thaís Batista, Victor Henrique, Radmila Andrade e Breno | 3° ANO B</small></span></div>
          </div>
        </div>
      </div>
    </div>  


    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Todos os nossos podcasts</h2>
          </div>
        </div>
        
<?php
include_once 'conexao.php';

$result_consulta = "SELECT * FROM grupos WHERE Fase = 2 AND Ativo = 'A'";

$resultado_consulta = mysqli_query($conn, $result_consulta);

if(mysqli_num_rows($resultado_consulta) <= 0){
  echo "<h2 style='color: red;'>Ops! Parece que ainda não temos nenhum grupo cadastrado na plataforma!</h2>";
}else{
  while($rows = mysqli_fetch_assoc($resultado_consulta)){
    echo "
    <div class='d-block d-md-flex podcast-entry bg-white mb-5' data-aos='fade-u'>
     <div class='image' style='background-image: url(../".$rows['Imagem'].");'></div>
    <div class='text'>
      <h3 class='font-weight-light'><a href='#'>".$rows['Autores']."</a></h3>
      <div class='text-white mb-3'><span class='text-black-opacity-05'>
        <small>
          ALUNOS: " .$rows['Integrantes']. "
        </small><br>
        <small>" .$rows['Sala']. "</small>
      </div>
      <div class='player'>
        <audio id='player2' preload='none' controls style='max-width: 100%'>
          <source src=../" .$rows['Audio']. " type='audio/mp3'>
        </audio>
      </div>
    </div>
  </div>
  ";
  }
}

?>

   


    <div class="site-blocks-cover overlay inner-page-cover" style="margin-top: 19px; background-image: url(../images/fase2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
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
                  <img src="../images/gpTodo.jpeg" alt="Image placeholder" class="img-fluid rounded">
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

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>

  <script src="../js/mediaelement-and-player.min.js"></script>

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
    
    <!--Proteção do codigo fonte -->
    <script type='text/javascript'>
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("esc",function()
{window.alert("CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS")});shortcut.add("Ctrl+F",function()
{window.alert("CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS")});shortcut.add("Ctrl+Shift+Del",function()
{window.alert("CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS")});shortcut.add("f12",function()
{window.alert("CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS")});shortcut.add("Ctrl+U",function()
{window.alert("CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS")});
//]]>
</script>
    
<SCRIPT LANGUAGE="JavaScript">
<!-- Disable
function disableselect(e){
return false
}

function reEnable(){
return true
}

//if IE4+
document.onselectstart=new Function ("return false")
document.oncontextmenu=new Function ("return false")
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>

<script language="JavaScript">
    function protegercodigo() {
    if (event.button==2||event.button==3){
        alert('CÓDIGO FONTE DA PÁGINA PROTEGIDO! TODOS OS DIREITOS RESERVADOS AO DESENVOLVEDOR LUCAS BERCÊ DE JESUS');}
    }
    document.onmousedown=protegercodigo
</script>
    
<script src="../Controller/protecao.js"></script>
  <script src="../js/main.js"></script>
  <script src="../sweetalert2.min.js"></script>
  <script src="../Controller/controlForms.js"></script>
    
  </body>
</html>