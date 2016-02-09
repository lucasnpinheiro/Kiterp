cake.pedido_fechamento = {};
cake.pedido_fechamento.total = 0;
cake.pedido_fechamento.sub = 0;
cake.pedido_fechamento.sub_parcelas = 0;
cake.pedido_fechamento.diferenca = 0;

cake.pedido_fechamento.calcula = function (obj) {
    var v = cake.util.convertFloat($(obj).val());
    var id = $(obj).attr('id').replace('valor', '');
    if ($('#' + id + 'parcelas').length > 0) {
        $('#' + id + 'parcelas').removeAttr('required');
        if (v > 0) {
            $('#' + id + 'parcelas').attr('required', 'required');
        }
    }

    cake.pedido_fechamento.sub = 0;
    $('.forma-selecionada').each(function () {
        cake.pedido_fechamento.sub += cake.util.convertFloat($(this).val());
    });
    cake.pedido_fechamento.diferenca = cake.pedido_fechamento.total - cake.pedido_fechamento.sub;
    $('.bt-pagar').hide();
    $('.calcula-recebido').html(cake.util.moeda(cake.pedido_fechamento.sub));
    if (cake.pedido_fechamento.diferenca > 0) {
        $('.calcula-diferenca').html(cake.util.moeda(cake.pedido_fechamento.diferenca));
        $('.calcula-troco').html(cake.util.moeda('0.00'));
    } else {
        $('.calcula-troco').html(cake.util.moeda(cake.pedido_fechamento.diferenca * -1));
        $('.calcula-diferenca').html(cake.util.moeda('0.00'));
        if (cake.pedido_fechamento.sub_parcelas >= cake.pedido_fechamento.total) {
            $('.bt-pagar').show();
        }
    }
}
cake.pedido_fechamento.parcelas = function () {
    cake.pedido_fechamento.sub_parcelas = 0;
    $('.valor-parcelas-condicoes').each(function () {
        cake.pedido_fechamento.sub_parcelas += cake.util.convertFloat($(this).val());
    });
    var diferenca = cake.pedido_fechamento.total - cake.pedido_fechamento.sub_parcelas;
    $('.bt-pagar').hide();

    if (diferenca <= 0) {
        if (cake.pedido_fechamento.sub >= cake.pedido_fechamento.total) {
            $('.bt-pagar').show();
        }
    }
}

$(function () {
    cake.pedido_fechamento.sub_parcelas = parseFloat($('.valor-total').attr('rel'));
    cake.pedido_fechamento.total = parseFloat($('.valor-total').attr('rel'));
    $('.forma-selecionada').change(function (e) {
        e.preventDefault();
        cake.pedido_fechamento.calcula($(this));
    });
    $('.valor-parcelas-condicoes').change(function (e) {
        e.preventDefault();
        cake.pedido_fechamento.parcelas();
    });
    $('.bt-pagar').click(function (e) {
        if (cake.pedido_fechamento.diferenca > 0) {
            e.preventDefault();
            cake.msg.erro('Erro na finalização do pedido.', 'Pedido não pode ser encerrado com valor menor que o total comprado.');
        } else {
            $(this).closest('form').removeAttr('onSubmit').submit();
        }
    });
});