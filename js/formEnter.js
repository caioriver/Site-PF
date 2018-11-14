// Enviar formulário ao apertar ENTER
    // Barra de Contatos
    document.onkeyup = function (e) {
        if (e.which == 13) {
            document.contato.submit();
        }
    }

    // Pesquisa de produtos
    document.onkeyup=function(e){
        if(e.which == 13){
            document.pesquisa.submit();
        }
    }