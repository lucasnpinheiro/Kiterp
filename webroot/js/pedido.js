cake.pedidos = {};
cake.pedidos.cacheConsultas = [];
cake.pedidos.preCacheConsultas = [];

cake.pedidos.clone = function () {
    var input = $('.lista-itens-pedidos').find('tr').eq(0).html();
    var seq = $('.lista-itens-pedidos').find('tr').length;
    input = input.replace(/\[0\]/g, '[' + seq + ']');
    input = input.replace(/\-0\-/g, '-' + seq + '-');
    input = input.replace(/\.0\./g, '.' + seq + '.');
    $('.lista-itens-pedidos').append('<tr>' + input + '</tr>');
    cake.pedidos.consulta();
    cake.pedidos.calculaLinha();
    cake.util.pularCampo();
    cake.util.mascaras();
};
cake.pedidos.calculaLinha = function () {
    $('.calcula-linha').blur(function (e) {
        e.preventDefault();
        var obj = this;
        var valor_unitario = cake.util.convertFloat($(obj).closest('tr').find('.desc-valor-unitario').val());
        var quantidade = cake.util.convertFloat($(obj).closest('tr').find('.desc-quantidade').val());
        var total = valor_unitario * quantidade;
        $(obj).closest('tr').find('.desc-valor-total').maskMoney('mask', total);
        cake.util.mascaras();
    });
}
cake.pedidos.modal = function (produtos) {
    var template = '<table class="table table-bordered table-condensed table-hover table-striped">';
    template += '<thead>';
    template += '<tr>';
    template += '<th>Código</th>';
    template += '<th>Código Interno</th>';
    template += '<th>Nome</th>';
    template += '<th>Valor</th>';
    template += '</tr>';
    template += '</thead>';
    template += '<tbody>';
    $.each(produtos, function (a, b) {
        cake.pedidos.cacheConsultas[b.id] = b;
        cake.pedidos.preCacheConsultas[b.barra] = b.id;
        cake.pedidos.preCacheConsultas[b.codigo_interno] = b.id;
        template += '<tr>';
        template += '<td>' + b.barra + '</td>';
        template += '<td>' + b.codigo_interno + '</td>';
        template += '<td>' + b.nome + '</td>';
        template += '<td>' + b.produtos_valores[0].valor_vendas_formatado + '</td>';
        template += '</tr>';
    });
    template += '</tbody>';
    template += '</table>';

    bootbox.dialog({
        title: "Lista de produtos relacionados encontrados.",
        message: template,
        buttons: {
            success: {
                label: "fechar",
                className: "btn-danger"
            }
        }
    }
    );
}
cake.pedidos.set = function (produto, obj) {
    cake.pedidos.cacheConsultas[produto.id] = produto;
    $(obj).closest('tr').find('.desc-valor-unitario').val(produto.produtos_valores[0].valor_vendas_formatado);
    $(obj).closest('tr').find('.desc-nome').val(produto.nome);
    $(obj).closest('tr').find('.desc-quantidade').val(1).focus();
    $(obj).closest('tr').attr('rel', 'produto_' + produto.id);
    cake.pedidos.clone();
}
cake.pedidos.ajaxConsulta = function (obj) {
    $.ajax({
        method: "POST",
        type: "POST",
        dataType: "json",
        url: router.url + 'produtos/consultar',
        data: {
            codigo: $(obj).val()
        },
        beforeSend: function () {
            cake.util.loading.show(obj);
        },
        success: function (d) {
            cake.util.loading.hide(obj);
            if (d.retorno.cod == 999) {
                if (d.retorno.individual == 1) {
                    cake.pedidos.set(d.retorno.produto, obj);
                    cake.pedidos.preCacheConsultas[$(obj).val()] = d.retorno.produto.id;
                } else {
                    cake.pedidos.modal(d.retorno.produto);
                }
            } else {
                cake.msg.erro('Erro na consulta.', 'Não foi localizado nenhum produto com os dados informados.');
            }
        }
    });
}
cake.pedidos.consulta = function () {
    $(".busca-produto").change(function (e) {
        e.preventDefault();
        var obj = this;
        var v = $.trim($(obj).val());
        if (v != '') {
            if (!cake.pedidos.preCacheConsultas[v]) {
                cake.pedidos.ajaxConsulta(obj);
            } else {
                cake.pedidos.set(cake.pedidos.cacheConsultas[cake.pedidos.preCacheConsultas[v]], obj);
            }
        } else {
            $(obj).closest('tr').find(':input').eq(0).focus();
        }
    }).blur(function (e) {
        e.preventDefault();
        var obj = this;
        var v = $.trim($(obj).val());
        if (v === '') {
            cake.pedidos.ajaxConsulta(obj);
            $(obj).closest('tr').find(':input').eq(0).focus();
        }
    });
}

$(function () {
    cake.pedidos.consulta();
    cake.pedidos.calculaLinha();
    cake.util.pularCampo();
});
