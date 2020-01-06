var certo = "<b>Correto!</b>";//Mensagem de acerto
var errado = "<b style='color:red;'>Errado!</b>";//mensagem de erro
var o = new Array();
var acertos = 0; 
var erros = 0; 
var respostas = new Array(); 
var alternativas = new Array();
var alternativas2 = new Array();
var alternativas3 = new Array();
var p = new Array();
var r = new Array();
var t = 2;
var a = new Array(); 
var a2 = new Array(); 
var a3 = new Array(); 
var mostraPontos = document.querySelector(".pontos");
var ptm = document.querySelector("#ptsMobile");

function configServ(){
      let timerInterval
      Swal.fire({
        title: 'O quiz já vai começar!',
        html: 'Aguarde enquanto o servidor está sendo configurado',
        timer: 3000,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            Swal.getContent().querySelector('b').textContent = Swal.getTimerLeft()
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
      
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('Erro de conexão com o servidor!')
        }
      });
    }

    function msgSuccess(){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'success',
        title: 'Parabéns!! Resposta correta'
      });
    }

    function msgError(){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Que pena! Você errou, tente acertar a próxima questão!'
      });
    }

    

    function array_perguntas1(){
      p[1] = "A primeira fase do modernismo no Brasil tem como característica marcante em suas obras:";
      r[1] = 'A linguagem escrita aproximada da falada';
      a[1] = "A crítica social";
      a2[1] = "O subjetivismo";
      a3[1] = "Objetividade";

      p[2] = "Qual foi a obra mais famosa no legado Vinicius de Moraes?";
      r[2] = "Soneto de Fidelidade";
      a[2] = "Forma e exegesse";
      a2[2] = "Para viver um grande amor";
      a3[2] = "As Borboletas";

}

function array_perguntas2(){
  p[1] = "O Modernismo no Brasil teve influência de várias correntes artísticas estrangeiras. Como estas correntes são chamadas?";
  r[1] = 'Vanguardas Europeias';
  a[1] = "Vanguardas Americanas";
  a2[1] = "Vanguardas Asiáticas";
  a3[1] = "Modernismo Internacional";

  p[2] = "Qual fou o último romance de Clarice Lispector?";
  r[2] = "A hora da estrela";
  a[2] = "Grande sertão veredas";
  a2[2] = "Vidas Secas";
  a3[2] = "Menino de Engenho";
}

function array_perguntas3(){
p[1] = "É correto afirmar que o modernismo:";
r[1] = 'Teve seu início logo após a semana da arte moderna';
a[1] = "Teve seu início após a primeira guerra mundial";
a2[1] = "Teve seu início após a guerra fria";
a3[1] = "Teve seu início após a copa do mundo de 1930";

p[2] = "Com quem Osvald de Andrade começou a trabalhar durante a fase heróica em 1917?";
r[2] = "Mario de Andrade";
a[2] = "Mário Quintana";
a2[2] = "Clarice Lispector";
a3[2] = "Graciliano Ramos";
}

function array_perguntas4(){
p[1] = "Sobre a chamada 'Geração de 45', é incorreto afirmar:";
r[1] = 'Foi a segunda fase do modernismo';
a[1] = "Foi a terceira e última fase do modernismo";
a2[1] = "Foi o período menos conturbado do movimento modernista";
a3[1] = "Teve artistas mais formais e menos radicais";

p[2] = "Quais dessas obras é de autoria de João Guimarães Rosa?";
r[2] = "Grande sertão Veredas";
a[2] = "Vidas Secas";
a2[2] = "O Quinze";
a3[2] = "Macunaíma";
}

function array_perguntas5(){
p[1] = "Quais das alternativas fazem parte do modernismo?";
r[1] = 'Geração de 45';
a[1] = "Primeira Guerra";
a2[1] = "Segunda Guerra";
a3[1] = "Barroco";

p[2] = "Quais dessas obras é de autoria de Clarice Lispector";
r[2] = "Água viva";
a[2] = "Grande sertão veredas";
a2[2] = "Vidas Secas";
a3[2] = "Menino de Engenho";

}

function array_perguntas6(){
p[1] = "Quais das alternativas não fazem parte do modernismo?";
r[1] = 'Guerra fria';
a[1] = "Geração de 30";
a2[1] = "Geração de 45";
a3[1] = "Fase Heroica";

p[2] = "Em qual período ocorreu a primeira fase do modernismo?";
r[2] = "1922 - 1930";
a[2] = "1935 - 1960";
a2[2] = "1960 - 1975";
a3[2] = "1990 - 2005";

}
    

    function hideButton(){

      $(".btn_r").hide();

    }

    function showButton(){

      $(".btnReload").show();

    }

    function reload(){

      window.location.reload();

    }

    function finalizar(){

      if(acertos === 60){

        Swal.fire({
          title: 'Parabéns! Você acertou tudo!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/einstein.gif',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }else if(acertos === 50){

        Swal.fire({
          title: 'Parabéns! Você foi muito bem!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/jobs.webp',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }else if(acertos === 40){

        Swal.fire({
          title: 'Parabéns! Você está no caminho, continue assim!!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/newton.jpeg',
          imageWidth: 100,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }else if(acertos === 30){

        Swal.fire({
          title: 'Vamos lá! Não desanime, um pouquinho mais de dedicação e você chaga lá!!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/gates.webp',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }else if(acertos === 20){

        Swal.fire({
          title: 'Vamos lá! Não desanime, um pouquinho mais de dedicação e você chaga lá!!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/galilei.webp',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }else{

        Swal.fire({
          title: 'Está no caminho!',
          text: `Obrigado por participar do quiz AldeiaCast, sua pontuação final foi: ${acertos} pontos`,
          imageUrl: 'images/newton.jpeg',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })

      }
    }
    

    function iniciar(){

      array_perguntas1();

      hideButton();

      showButton();

      configServ();

      let txt = document.querySelector("#padrao");
      txt.style.display = "none";


      let dv = document.querySelector(".dvP1");
      dv.style.display = "block";


     
     for(var i=1;i<=t;i++)
     {
       o[i] = i;
      } //gera uma sequencia de t numeros

     for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
     {
      n = Math.round(t*(Math.random())); 
      m = Math.round(t*(Math.random()));
      if(m == 0) m++;
      if(n == 0) n++;
      var temp = o[n];
      o[n] = o[m];
      o[m] = temp;
     } 

    for(var i=1;i<=t;i++)
    {
      respostas[o[i]] = p[o[i]];
      alternativas[o[i]] = a[o[i]];
      alternativas2[o[i]] = a2[o[i]];
      alternativas3[o[i]] = a3[o[i]];

      document.querySelector("#perg").innerHTML = respostas[o[i]];
      document.querySelector("#resp").innerHTML = r[o[i]];
      document.querySelector("#alt").innerHTML = alternativas[o[i]];
      document.querySelector("#alt_2").innerHTML = alternativas2[o[i]];
      document.querySelector("#alt_3").innerHTML = alternativas3[o[i]];

       if(respostas[o[i]]==r[o[i]]){
         respostas[o[i]]=certo;acertos++;
         }else{
           respostas[o[i]]=errado;erros++;
          }
     }

     var r1 = document.getElementById("r1");
     var r2 = document.getElementById("r2");
     var r3 = document.getElementById("r3");
     var r4 = document.getElementById("r4");

     r1.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       acertos = acertos + 10;

       console.log(acertos);

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp").style.color = "green";
       document.querySelector("#alt").style.color = "red";
       document.querySelector("#alt_2").style.color = "red";
       document.querySelector("#alt_3").style.color = "red";

       msgSuccess();

       p2();
     });

     r2.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp").style.color = "green";
       document.querySelector("#alt").style.color = "red";
       document.querySelector("#alt_2").style.color = "red";
       document.querySelector("#alt_3").style.color = "red";

       msgError();

       p2();

     });

     r3.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp").style.color = "green";
       document.querySelector("#alt").style.color = "red";
       document.querySelector("#alt_2").style.color = "red";
       document.querySelector("#alt_3").style.color = "red";

       msgError();

       p2();

     });

     r4.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp").style.color = "green";
       document.querySelector("#alt").style.color = "red";
       document.querySelector("#alt_2").style.color = "red";
       document.querySelector("#alt_3").style.color = "red";

       msgError();

       p2();

     });

    //  respostas[o[i]] = p[o[i]];
    //   alternativas[o[i]] = a[o[i]];
    //   alternativas2[o[i]] = a2[o[i]];
    //   alternativas3[o[i]] = a3[o[i]];

      respostas[o[i]].pop();
      alternativas[o[i]].pop();
      alternativas2[o[i]].pop();
      alternativas3[o[i]].pop();
}

function p2(){
  
      array_perguntas2();

      let p2 = document.querySelector(".dvP2");

      p2.style.display = "block";

    //ADICIONE MAIS PERGUNTAS AQUI COPIANDO 2 EM 2 LINHAS: P[] = PERGUNTA R[] = RESPOSTA
     for(var i=1;i<=t;i++){
       o[i] = i;
      } //gera uma sequencia de t numeros

     for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
     {
      n = Math.round(t*(Math.random())); 
      m = Math.round(t*(Math.random()));
      if(m == 0) m++;
      if(n == 0) n++;
      var temp = o[n];
      o[n] = o[m];
      o[m] = temp;
     } 

    for(var i=1;i<=t;i++)
    {
      respostas[o[i]] = p[o[i]];
      alternativas[o[i]] = a[o[i]];
      alternativas2[o[i]] = a2[o[i]];
      alternativas3[o[i]] = a3[o[i]];

      document.querySelector("#perg2").innerHTML = respostas[o[i]];
      document.querySelector("#resp2").innerHTML = r[o[i]];
      document.querySelector("#alt_p1").innerHTML = alternativas[o[i]];
      document.querySelector("#alt2_p2").innerHTML = alternativas2[o[i]];
      document.querySelector("#alt2_p3").innerHTML = alternativas3[o[i]];

       if(respostas[o[i]]==r[o[i]]){
         respostas[o[i]]=certo;acertos++;
         }else{
           respostas[o[i]]=errado;erros++;
          }
     }

     var r1 = document.getElementById("p2r1");
     var r2 = document.getElementById("p2r2");
     var r3 = document.getElementById("p2r3");
     var r4 = document.getElementById("p2r4");

     r1.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       acertos = acertos + 10;

       console.log(acertos);

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp2").style.color = "green";
       document.querySelector("#alt_p1").style.color = "red";
       document.querySelector("#alt2_p2").style.color = "red";
       document.querySelector("#alt2_p3").style.color = "red";

       msgSuccess();
        
       p3();

     });

     r2.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp2").style.color = "green";
       document.querySelector("#alt_p1").style.color = "red";
       document.querySelector("#alt2_p2").style.color = "red";
       document.querySelector("#alt2_p3").style.color = "red";

       msgError();

       p3();

     });

     r3.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp2").style.color = "green";
       document.querySelector("#alt_p1").style.color = "red";
       document.querySelector("#alt2_p2").style.color = "red";
       document.querySelector("#alt2_p3").style.color = "red";

       msgError();

       p3();
     });

     r4.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp2").style.color = "green";
       document.querySelector("#alt_p1").style.color = "red";
       document.querySelector("#alt2_p2").style.color = "red";
       document.querySelector("#alt2_p3").style.color = "red";

       msgError();

       p3();

     });

      respostas[o[i]].pop();
      alternativas[o[i]].pop();
      alternativas2[o[i]].pop();
      alternativas3[o[i]].pop();
}

function p3(){

    array_perguntas3();

  let p3 = document.querySelector(".dvP3");
  p3.style.display = "block";

    //ADICIONE MAIS PERGUNTAS AQUI COPIANDO 2 EM 2 LINHAS: P[] = PERGUNTA R[] = RESPOSTA
     for(var i=1;i<=t;i++){
       o[i] = i;
      } //gera uma sequencia de t numeros

     for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
     {
      n = Math.round(t*(Math.random())); 
      m = Math.round(t*(Math.random()));
      if(m == 0) m++;
      if(n == 0) n++;
      var temp = o[n];
      o[n] = o[m];
      o[m] = temp;
     } 

    for(var i=1;i<=t;i++)
    {
      respostas[o[i]] = p[o[i]];
      alternativas[o[i]] = a[o[i]];
      alternativas2[o[i]] = a2[o[i]];
      alternativas3[o[i]] = a3[o[i]];

      document.querySelector("#perg3").innerHTML = respostas[o[i]];
      document.querySelector("#resp3").innerHTML = r[o[i]];
      document.querySelector("#alt3_p1").innerHTML = alternativas[o[i]];
      document.querySelector("#alt3_p2").innerHTML = alternativas2[o[i]];
      document.querySelector("#alt3_p3").innerHTML = alternativas3[o[i]];

       if(respostas[o[i]]==r[o[i]]){
         respostas[o[i]]=certo;acertos++;
         }else{
           respostas[o[i]]=errado;erros++;
          }
     }

     var r1 = document.getElementById("p3r1");
     var r2 = document.getElementById("p3r2");
     var r3 = document.getElementById("p3r3");
     var r4 = document.getElementById("p3r4");

     r1.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       acertos = acertos + 10;

       console.log(acertos);

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp3").style.color = "green";
       document.querySelector("#alt3_p1").style.color = "red";
       document.querySelector("#alt3_p2").style.color = "red";
       document.querySelector("#alt3_p3").style.color = "red";

       msgSuccess();

       p4();
        
     });


     r2.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp3").style.color = "green";
       document.querySelector("#alt3_p1").style.color = "red";
       document.querySelector("#alt3_p2").style.color = "red";
       document.querySelector("#alt3_p3").style.color = "red";

       msgError();

       p4();


     });

     r3.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp3").style.color = "green";
       document.querySelector("#alt3_p1").style.color = "red";
       document.querySelector("#alt3_p2").style.color = "red";
       document.querySelector("#alt3_p3").style.color = "red";

       msgError();

       p4();

     });

     r4.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       document.querySelector("#resp3").style.color = "green";
       document.querySelector("#alt3_p1").style.color = "red";
       document.querySelector("#alt3_p2").style.color = "red";
       document.querySelector("#alt3_p3").style.color = "red";

       msgError();

       p4();

     });

     respostas[o[i]].pop();
      alternativas[o[i]].pop();
      alternativas2[o[i]].pop();
      alternativas3[o[i]].pop();

}

function p4(){

    array_perguntas4();

    let p4 = document.querySelector(".dvP4");

    p4.style.display = "block";

    //ADICIONE MAIS PERGUNTAS AQUI COPIANDO 2 EM 2 LINHAS: P[] = PERGUNTA R[] = RESPOSTA
     for(var i=1;i<=t;i++){
       o[i] = i;
      } //gera uma sequencia de t numeros

     for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
     {
      n = Math.round(t*(Math.random())); 
      m = Math.round(t*(Math.random()));
      if(m == 0) m++;
      if(n == 0) n++;
      var temp = o[n];
      o[n] = o[m];
      o[m] = temp;
     } 

    for(var i=1;i<=t;i++)
    {
      respostas[o[i]] = p[o[i]];
      alternativas[o[i]] = a[o[i]];
      alternativas2[o[i]] = a2[o[i]];
      alternativas3[o[i]] = a3[o[i]];

      document.querySelector("#perg4").innerHTML = respostas[o[i]];
      document.querySelector("#resp4").innerHTML = r[o[i]];
      document.querySelector("#alt4_p1").innerHTML = alternativas[o[i]];
      document.querySelector("#alt4_p2").innerHTML = alternativas2[o[i]];
      document.querySelector("#alt4_p3").innerHTML = alternativas3[o[i]];

       if(respostas[o[i]]==r[o[i]]){
         respostas[o[i]]=certo;acertos++;
         }else{
           respostas[o[i]]=errado;erros++;
          }
     }

     var r1 = document.getElementById("p4r1");
     var r2 = document.getElementById("p4r2");
     var r3 = document.getElementById("p4r3");
     var r4 = document.getElementById("p4r4");

     r1.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       acertos = acertos + 10;

       console.log(acertos);

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp4").style.color = "green";
       document.querySelector("#alt4_p1").style.color = "red";
       document.querySelector("#alt4_p2").style.color = "red";
       document.querySelector("#alt4_p3").style.color = "red";

       msgSuccess();

       p5();
        
     });


     r2.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);

       mostraPontos.innerHTML = "Pontuação: " + acertos;

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp4").style.color = "green";
       document.querySelector("#alt4_p1").style.color = "red";
       document.querySelector("#alt4_p2").style.color = "red";
       document.querySelector("#alt4_p3").style.color = "red";

       msgError();

       p5();

     });

     r3.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp4").style.color = "green";
       document.querySelector("#alt4_p1").style.color = "red";
       document.querySelector("#alt4_p2").style.color = "red";
       document.querySelector("#alt4_p3").style.color = "red";

       msgError();

       p5();

     });

     r4.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);

       mostraPontos.innerHTML = "Pontuação: " + acertos;

       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp4").style.color = "green";
       document.querySelector("#alt4_p1").style.color = "red";
       document.querySelector("#alt4_p2").style.color = "red";
       document.querySelector("#alt4_p3").style.color = "red";

       msgError();

       p5();

     });

     respostas[o[i]].pop();
      alternativas[o[i]].pop();
      alternativas2[o[i]].pop();
      alternativas3[o[i]].pop();

}

function p5(){

  array_perguntas5();

    let p5 = document.querySelector(".dvP5");

    p5.style.display = "block";



    //ADICIONE MAIS PERGUNTAS AQUI COPIANDO 2 EM 2 LINHAS: P[] = PERGUNTA R[] = RESPOSTA
     for(var i=1;i<=t;i++){
       o[i] = i;
      } //gera uma sequencia de t numeros

     for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
     {
      n = Math.round(t*(Math.random())); 
      m = Math.round(t*(Math.random()));
      if(m == 0) m++;
      if(n == 0) n++;
      var temp = o[n];
      o[n] = o[m];
      o[m] = temp;
     } 

    for(var i=1;i<=t;i++)
    {
      respostas[o[i]] = p[o[i]];
      alternativas[o[i]] = a[o[i]];
      alternativas2[o[i]] = a2[o[i]];
      alternativas3[o[i]] = a3[o[i]];

      document.querySelector("#perg5").innerHTML = respostas[o[i]];
      document.querySelector("#resp5").innerHTML = r[o[i]];
      document.querySelector("#alt5_p1").innerHTML = alternativas[o[i]];
      document.querySelector("#alt5_p2").innerHTML = alternativas2[o[i]];
      document.querySelector("#alt5_p3").innerHTML = alternativas3[o[i]];

       if(respostas[o[i]]==r[o[i]]){
         respostas[o[i]]=certo;acertos++;
         }else{
           respostas[o[i]]=errado;erros++;
          }
     }

     var r1 = document.getElementById("p5r1");
     var r2 = document.getElementById("p5r2");
     var r3 = document.getElementById("p5r3");
     var r4 = document.getElementById("p5r4");

     r1.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       acertos = acertos + 10;

       console.log(acertos);


       ptm.innerHTML = "Pontuação: " + acertos;



       document.querySelector("#resp5").style.color = "green";
       document.querySelector("#alt5_p1").style.color = "red";
       document.querySelector("#alt5_p2").style.color = "red";
       document.querySelector("#alt5_p3").style.color = "red";

       msgSuccess();


       p6();
        
     });


     r2.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);


       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp5").style.color = "green";
       document.querySelector("#alt5_p1").style.color = "red";
       document.querySelector("#alt5_p2").style.color = "red";
       document.querySelector("#alt5_p3").style.color = "red";

       msgError();

      p6();

     });

     r3.addEventListener('click', e => {
      r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);


       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp5").style.color = "green";
       document.querySelector("#alt5_p1").style.color = "red";
       document.querySelector("#alt5_p2").style.color = "red";
       document.querySelector("#alt5_p3").style.color = "red";

       msgError();

       p6();


     });

     r4.addEventListener('click', e => {
       r1.disabled = true;
       r2.disabled = true;
       r3.disabled = true;
       r4.disabled = true;

       console.log(acertos);


       ptm.innerHTML = "Pontuação: " + acertos;

       document.querySelector("#resp5").style.color = "green";
       document.querySelector("#alt5_p1").style.color = "red";
       document.querySelector("#alt5_p2").style.color = "red";
       document.querySelector("#alt5_p3").style.color = "red";


       msgError();

       p6();

     });

     respostas[o[i]].pop();
      alternativas[o[i]].pop();
      alternativas2[o[i]].pop();
      alternativas3[o[i]].pop();
}

function p6(){

  array_perguntas6();

  let p6 = document.querySelector(".dvP6");

  p6.style.display = "block";

  //ADICIONE MAIS PERGUNTAS AQUI COPIANDO 2 EM 2 LINHAS: P[] = PERGUNTA R[] = RESPOSTA
   for(var i=1;i<=t;i++){
     o[i] = i;
    } //gera uma sequencia de t numeros

   for(var i=1;i<=10;i++)//embaralha a sequencia 10 vezes
   {
    n = Math.round(t*(Math.random())); 
    m = Math.round(t*(Math.random()));
    if(m == 0) m++;
    if(n == 0) n++;
    var temp = o[n];
    o[n] = o[m];
    o[m] = temp;
   } 

  for(var i=1;i<=t;i++)
  {
    respostas[o[i]] = p[o[i]];
    alternativas[o[i]] = a[o[i]];
    alternativas2[o[i]] = a2[o[i]];
    alternativas3[o[i]] = a3[o[i]];

    document.querySelector("#perg6").innerHTML = respostas[o[i]];
    document.querySelector("#resp6").innerHTML = r[o[i]];
    document.querySelector("#alt6_p1").innerHTML = alternativas[o[i]];
    document.querySelector("#alt6_p2").innerHTML = alternativas2[o[i]];
    document.querySelector("#alt6_p3").innerHTML = alternativas3[o[i]];

     if(respostas[o[i]]==r[o[i]]){
       respostas[o[i]]=certo;acertos++;
       }else{
         respostas[o[i]]=errado;erros++;
        }
   }

   var r1 = document.getElementById("p6r1");
   var r2 = document.getElementById("p6r2");
   var r3 = document.getElementById("p6r3");
   var r4 = document.getElementById("p6r4");

   r1.addEventListener('click', e => {
     r1.disabled = true;
     r2.disabled = true;
     r3.disabled = true;
     r4.disabled = true;

     acertos = acertos + 10;

     console.log(acertos);

     ptm.innerHTML = "Pontuação: " + acertos;



     document.querySelector("#resp6").style.color = "green";
     document.querySelector("#alt6_p1").style.color = "red";
     document.querySelector("#alt6_p2").style.color = "red";
     document.querySelector("#alt6_p3").style.color = "red";

     msgSuccess();

     finalizar();

   });


   r2.addEventListener('click', e => {
    r1.disabled = true;
     r2.disabled = true;
     r3.disabled = true;
     r4.disabled = true;

     console.log(acertos);

     ptm.innerHTML = "Pontuação: " + acertos;

     document.querySelector("#resp6").style.color = "green";
     document.querySelector("#alt6_p1").style.color = "red";
     document.querySelector("#alt6_p2").style.color = "red";
     document.querySelector("#alt6_p3").style.color = "red";

     msgError();

     finalizar();


   });

   r3.addEventListener('click', e => {
    r1.disabled = true;
     r2.disabled = true;
     r3.disabled = true;
     r4.disabled = true;

     console.log(acertos);

     ptm.innerHTML = "Pontuação: " + acertos;

     document.querySelector("#resp6").style.color = "green";
     document.querySelector("#alt6_p1").style.color = "red";
     document.querySelector("#alt6_p2").style.color = "red";
     document.querySelector("#alt6_p3").style.color = "red";

     msgError();

    finalizar();

   });

   r4.addEventListener('click', e => {
     r1.disabled = true;
     r2.disabled = true;
     r3.disabled = true;
     r4.disabled = true;

     console.log(acertos);

     ptm.innerHTML = "Pontuação: " + acertos;

     document.querySelector("#resp6").style.color = "green";
     document.querySelector("#alt6_p1").style.color = "red";
     document.querySelector("#alt6_p2").style.color = "red";
     document.querySelector("#alt6_p3").style.color = "red";


     msgError();

     finalizar();

  },

)}

