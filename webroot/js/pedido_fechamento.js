cake.pedido_fechamento = {};
cake.pedido_fechamento.total = 0;
cake.pedido_fechamento.sub = 0;
cake.pedido_fechamento.diferenca = 0;

cake.pedido_fechamento.add = function (obj) {
    var v = obj.val();
    var l = obj.find(':selected').text();
    var t = '<div class="form-group text">\n\
                <label class=" control-label " for="opcao-' + v + '">' + l + '</label>\n\
                <div class="input-group">\n\
                    <input name="opcao[' + v + ']" required="required" class="form-control moeda calcula-pedido" title="nome da opção" id="opcao-' + v + '" value="" type="text">\n\
                        <span class="input-group-addon">\n\
                            <i class="fa fa-money"></i>\n\
                        </span>\n\
                    </div>\n\
                </div>';
    $('.opcoes-pagamento').append(t);
    $('.calcula-pedido').change(function (e) {
        e.preventDefault();
        cake.pedido_fechamento.calcula($(this).val());
    });
    $('opcao-' + v).focus();
    cake.util.rotinas();
}
cake.pedido_fechamento.calcula = function (v) {
    v = cake.util.convertFloat(v);
    cake.pedido_fechamento.sub = 0;
    $('.calcula-pedido').each(function () {
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
        $('.bt-pagar').show();
    }
}

$(function () {
    $('#opcoes').change(function (e) {
        e.preventDefault();
        cake.pedido_fechamento.add($(this));
    });
    cake.pedido_fechamento.total = parseFloat($('.valor-total').attr('rel'));
    $('.bt-pagar').click(function(e){
        if (cake.pedido_fechamento.diferenca > 0) {
            e.preventDefault();
            cake.msg.erro('Erro na finalização do pedido.', 'Pedido não pode ser encerrado com valor menor que o total comprado.');
        } else {
            $(this).closest('form').removeAttr('onSubmit').submit();
        }
    });
});