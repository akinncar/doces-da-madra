var Main = (function() {

    const $btnModal = $('.AjaxRequest'),
        $modal = $('#modal1'),
        $loader = $('#loader'),
        $modalClose = $('.modal-close');

    var carregaDados = function () {
        $modal.show();
        $.ajax({
            method:"GET",
            url:Routing.generate('adicionar_carrinho',{id:$(this).data('id')}),
            dataType:"json",
            beforeSend: function () {
                $loader.removeClass('hide');
            },
            success: function (data) {
                console.log(data.nome);
                $('#modal-nome').html(data.nome);
                // $('#modal-email').html('<b>E-mail: </b>' + data.email);
                // $('#modal-tel').html('<b>Telefone: </b>' + data.tel);
            },
            complete: function () {
                $loader.addClass('hide');
            }
        });
    };

    var fecharModal = function () {
        $modal.hide();
    };

    var bindFunctions = function () {
        $btnModal.click(carregaDados);
        $modalClose.click(fecharModal)
    };

    var init = function () {
        bindFunctions();
    };

    return {
        init: init
    }

})();
Main.init();
