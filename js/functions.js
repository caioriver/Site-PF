// APARECER CAIXA DE CONTATOS
$(document).ready(function(){
    $('.toggle').click(function(){
        $('.sidebar-contact').toggleClass('active')
        $('.img-toggle').toggleClass('active')
    });
});

// ANIMAÇÃO DOS TEXTOS DA CAIXA DE CONTATOS
$(".input").focus(function(){
    $(this).parent().addClass("focus");
}).blur(function(){
    if($(this).val()===''){
        $(this).parent().removeClass("focus")
    }
});

// ANIMAÇÃO DOS TEXTOS DOS FORMULARIOS
$(".entrada").focus(function(){
    $(this).parent().addClass("foco");
}).blur(function(){
    if($(this).val()===''){
        $(this).parent().removeClass("foco")
    }
});

// LISTA DE PRODUTOS
$(".image-checkbox").each(function () {
    if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
        $(this).addClass('image-checkbox-checked');
    }
    else {
        $(this).removeClass('image-checkbox-checked');
    }
});

$(".image-checkbox").on("click", function (e) {
    if ($(this).hasClass('image-checkbox-checked')) {
        $(this).removeClass('image-checkbox-checked');
        $(this).find('input[type="checkbox"]').first().removeAttr("checked");
    }
    else {
        $(this).addClass('image-checkbox-checked');
        $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
    }
    e.preventDefault();
});

// LOADING 

