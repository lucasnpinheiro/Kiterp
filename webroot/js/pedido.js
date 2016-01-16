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
cake.pedidos.modal = function (produtos, obj) {
    var template = '<table class="table table-bordered table-condensed table-hover table-striped">';
    template += '<thead>';
    template += '<tr>';
    template += '<th>Selecionar</th>';
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
        template += '<td><a href="#" class="select-produto-lista-modal">Selecionar</a></td>';
        template += '<td>' + b.barra + '</td>';
        template += '<td>' + b.codigo_interno + '</td>';
        template += '<td>' + b.nome + '</td>';
        template += '<td>' + b.produtos_valores.valor_vendas_formatado + '</td>';
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
    cake.pedidos.modalSelect(obj);
}


cake.pedidos.modalSelect = function (obj) {
    $('.select-produto-lista-modal').click(function (e) {
        e.preventDefault();
        var codigo = parseInt($(this).closest('tr').find('.codigo-barra').text());
        cake.pedidos.set(cake.pedidos.cacheConsultas[cake.pedidos.preCacheConsultas[codigo]], obj, true);
        bootbox.hideAll();
    });
}

cake.pedidos.removeLinha = function () {
    $('.remove-linha').click(function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        var count = $('.lista-itens-pedidos tr').length;
        if (count < 2) {
            $('.remove-linha').hide();
        }
    });
}

cake.pedidos.gerarPedido = function (obj) {
    var empresa_id = $('#empresa-id').val();
    var cliente_id = $('#pessoa-id').val();
    var vendedor_id = $('#vendedor-id').val();
    var condicao_pagamento_id = $('#condicao-pagamento-id').val();
    if (empresa_id != '' && cliente_id != '' && vendedor_id != '' && condicao_pagamento_id != '') {
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'pedidos/gerar',
            data: {
                pedido_id: $('#pedido-id').val(),
                empresa_id: empresa_id,
                cliente_id: cliente_id,
                vendedor_id: vendedor_id,
                condicao_pagamento_id: condicao_pagamento_id
            },
            beforeSend: function () {
                cake.util.loading.show(obj);
            },
            success: function (d) {
                cake.util.loading.hide(obj);
                console.log(d);
                $('#pedido-id').val(d.id);
                $('.seta-pedido').html('Pedido: ' + d.id);
                if (d.cod == 999) {
                    cake.msg.sucesso('Pedido.', 'Pedido criado com sucesso.');
                } else if (d.cod == 222) {
                    cake.msg.sucesso('Pedido.', 'Pedido alterado com sucesso.');
                } else {
                    cake.msg.erro('Pedido.', 'Não foi possivel criar o pedido, verifique e tente novamente.');
                }
            }
        });
    }
}

cake.pedidos.set = function (produto, obj, create_clone) {
    cake.pedidos.cacheConsultas[produto.id] = produto;
    $(obj).closest('tr').find('.desc-produto-id').val(produto.id);
    $(obj).closest('tr').find('.desc-valor-unitario').val(produto.produtos_valores.valor_vendas_formatado);
    $(obj).closest('tr').find('.desc-nome').val(produto.nome);
    $(obj).closest('tr').find('.desc-quantidade').val('').focus();
    $(obj).closest('tr').attr('rel', 'produto_' + produto.id);
    if (create_clone == true) {
        cake.pedidos.clone();
    }
    $('.remove-linha').show();
    cake.pedidos.removeLinha();
}
cake.pedidos.ajaxConsulta = function (obj) {
    $.ajax({
        method: "POST",
        type: "POST",
        dataType: "json",
        url: router.url + 'produtos/consultar',
        data: {
            codigo: $(obj).val(),
            empresa: $("#empresa-id").val()
        },
        beforeSend: function () {
            cake.util.loading.show(obj);
        },
        success: function (d) {
            cake.util.loading.hide(obj);
            if (d.retorno.cod == 999) {
                if (d.retorno.individual == 1) {
                    cake.pedidos.set(d.retorno.produto, obj, true);
                    cake.pedidos.preCacheConsultas[$(obj).val()] = d.retorno.produto.id;
                } else {
                    cake.pedidos.modal(d.retorno.produto, obj);
                }
            } else if (d.retorno.cod == 222) {
                cake.msg.erro('Erro na consulta.', 'Este produto é um KIT, e não foi localizado(s) produto(s) vinculado(s) a ele.');
            } else {
                cake.msg.erro('Erro na consulta.', 'Não foi localizado nenhum produto com os dados informados.');
            }
        }
    });
}
cake.pedidos.consulta = function () {
    $(".busca-produto").change(function (e) {
        e.preventDefault();
        if ($("#empresa-id").val() != '') {
            var obj = this;
            var v = $.trim($(obj).val());
            if (v != '') {
                if (!cake.pedidos.preCacheConsultas[v]) {
                    cake.pedidos.ajaxConsulta(obj);
                } else {
                    cake.pedidos.set(cake.pedidos.cacheConsultas[cake.pedidos.preCacheConsultas[v]], obj, true);
                }
            } else {
                $(obj).closest('tr').find(':input').eq(0).focus();
            }
        } else {
            $('.busca-produto').val('');
            $("#empresa-id").focus();
            cake.msg.erro('Erro na consulta.', 'Informe uma empresa.');
        }
    });
}

$(function () {
    cake.pedidos.consulta();
    cake.pedidos.calculaLinha();
    cake.util.pularCampo();
    $('#empresa-id, #pessoa-id, #condicao-pagamento-id, #vendedor-id').change(function (e) {
        e.preventDefault();
        cake.pedidos.gerarPedido();
    });
});
