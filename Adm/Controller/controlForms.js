function validarEmail(frm){

    let email = document.querySelector("#txtEmail").value;
    let estiloEmail = document.querySelector("#txtEmail");

    if(email === "" || email === null){

        estiloEmail.style.borderColor = "red";

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email inválido, tente digitar o email novamente!'
          });

          return false;
    }else{
        Swal.fire({
            icon: 'success',
            title: 'Ótimo!',
            text: 'Seu email foi cadastrado com sucesso na nossa plataforma AldeiaCast'
        });
    }
}

