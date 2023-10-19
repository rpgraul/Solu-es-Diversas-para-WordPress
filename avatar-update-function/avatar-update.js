$(document).ready(function() {
    // Variável para armazenar o valor original do src
    var originalSrc = $('#imgPerfil img').attr('src');

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgPerfil img').attr('src', e.target.result);
                $('#atualizarAvatar').show(); // Torna o botão visível
                $('.clear-button').show(); 
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });

    // Adiciona um evento de clique para o ícone de limpar
    $(".clear-button").on('click', function() {
        $(".file-upload").val(''); // Limpa o valor do input file
        $('#atualizarAvatar').hide(); // Torna o botão invisível
        $('.clear-button').hide(); 
        $('#imgPerfil img').attr('src', originalSrc); // Restaura o src original
    });

     // Exibe o popup
    var $popup = $('.alertaAvatar');
    $popup.show();

    // Fecha o popup automaticamente após 5 segundos
    setTimeout(function() {
        $popup.css('animation', 'fadeOut 0.5s ease-in-out forwards'); // Aplica a animação de saída
        setTimeout(function() {
            $popup.fadeOut();
        }, 500);
    }, 5000);
});


function fecharPopup(button) {
    var $popup = $(button).closest('.alertaAvatar');
    $popup.css('animation', 'fadeOut 0.5s ease-in-out forwards'); // Aplica a animação de saída
    setTimeout(function() {
        $popup.fadeOut();
    }, 500);
}

