var cake = {};
cake.util = {};
cake.util.numero = function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
};
cake.util.convertFloat = function (valor) {
    if (valor === "") {
        valor = 0;
    } else {
        valor = valor.replace(".", "");
        valor = valor.replace(",", ".");
        valor = valor.replace('R$', '');
        valor = $.trim(valor);
    }
    return parseFloat(valor);
};
cake.util.loading = {
    show: function (input) {
        $(input).remove('img.img-loading');
        $(input).closest('div').prepend('<img src="' + router.url + 'img/loading.gif" class="img-loading" style="margin-top: 5px; position: absolute; right: 17px;" />');
    },
    hide: function (input) {
        $(input).closest('div').find('.img-loading').remove();
    }
}

cake.util.pularCampo = function () {
    $(':input:not(textarea)').keydown(function (e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 13) {
            e.preventDefault();
            var inputs = $(this).closest('form').find(':input:visible:enabled');
            if ((inputs.length - 1) == inputs.index(this))
                $(':input:enabled:visible:first').focus();
            else
                inputs.eq(inputs.index(this) + 1).focus();
        }
    });
};
cake.util.getCep = function (cep, before) {
    if (!before) {
        before = '';
    }
    $.getJSON(router.url + "utilits/cep/" + cep, function (data) {
        if (data.retorno.result.status == 'OK') {
            $('#' + before + 'endereco').val(data.retorno.result.Cep.logradouro);
            $('#' + before + 'bairro').val(data.retorno.result.Cep.bairro);
            $('#' + before + 'cidade').val(data.retorno.result.Cep.cidade);
            $('#' + before + 'estado').val(data.retorno.result.Cep.uf);
            $('#' + before + 'numero').focus();
        }
    });
}
cake.msg = {};
cake.msg.sucesso = function (titulo, mensagem, tempo) {
    cake.msg._run(titulo, mensagem, 'success', tempo);
}
cake.msg.erro = function (titulo, mensagem, tempo) {
    cake.msg._run(titulo, mensagem, 'error', tempo);
}
cake.msg._run = function (titulo, mensagem, tipo, tempo) {
    if (!tempo) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 10000
        };
        switch (tipo) {
            case 'success':
                toastr.success(mensagem, titulo);
                break;

            case 'error':
                toastr.error(mensagem, titulo);
                break;

        }

    } else {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 10000
            };
            switch (tipo) {
                case 'success':
                    toastr.success(mensagem, titulo);
                    break;

                case 'error':
                    toastr.error(mensagem, titulo);
                    break;

            }

        }, 1300);
    }
}
cake.util.mascaras = function () {
    $('.numero').keypress(cake.util.numero);
    $('.cep').mask('99999-999');
    $('.cpf').mask('999.999.999-99');
    $('.cnpj').mask('99.999.999/9999-99');
    $('.data').mask('99/99/9999');
    $('.telefone').mask('(99) 99999-9999');
    $('.date .input-group .data').datepicker('remove').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
    $(".moeda").maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });
    $(".juros").maskMoney({
        suffix: ' %',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });

};

$(function () {
    cake.util.mascaras();
});