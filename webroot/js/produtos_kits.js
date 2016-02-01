cake.produtosKits = {};
cake.produtosKits.cacheConsultas = [];
cake.produtosKits.preCacheConsultas = [];

cake.produtosKits.search = function () {
    $('#kit-id').change(function (e) {
        e.preventDefault();
        window.location.href = router.url + 'produtos-kits/add/' + $(this).val();
    });
}

cake.produtosKits.clone = function () {
    var input = $('.lista-itens-produtosKits').find('tr').eq(0).html();
    var seq = $('.lista-itens-produtosKits').find('tr').length;
    input = input.replace(/\[0\]/g, '[' + seq + ']');
    input = input.replace(/\-0\-/g, '-' + seq + '-');
    input = input.replace(/\.0\./g, '.' + seq + '.');
    $('.lista-itens-produtosKits').append('<tr>' + input + '</tr>');
    cake.produtosKits.consulta();
    cake.util.pularCampo();
    cake.util.rotinas();
};

cake.produtosKits.modalSelect = function (obj) {
    $('.select-produto-lista-modal').click(function (e) {
        e.preventDefault();
        var codigo = parseInt($(this).closest('tr').find('.codigo-barra').text());
        cake.produtosKits.set(cake.produtosKits.cacheConsultas[cake.produtosKits.preCacheConsultas[codigo]], obj, true);
        bootbox.hideAll();
    });
}

cake.produtosKits.modal = function (obj, produtos) {
    var template = '<table class="table table-bordered table-condensed table-hover table-striped">';
    template += '<thead>';
    template += '<tr>';
    template += '<th>Selecionar</th>';
    template += '<th>Código</th>';
    template += '<th>Código Interno</th>';
    template += '<th>Nome</th>';
    template += '</tr>';
    template += '</thead>';
    template += '<tbody>';
    $.each(produtos, function (a, b) {
        cake.produtosKits.cacheConsultas[b.id] = b;
        cake.produtosKits.preCacheConsultas[b.barra] = b.id;
        cake.produtosKits.preCacheConsultas[b.codigo_interno] = b.id;
        template += '<tr>';
        template += '<td><a href="#" class="select-produto-lista-modal">Selecionar</a></td>';
        template += '<td class="codigo-barra">' + b.barra + '</td>';
        template += '<td>' + b.codigo_interno + '</td>';
        template += '<td>' + b.nome + '</td>';
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
    cake.produtosKits.modalSelect(obj);
}
cake.produtosKits.set = function (produto, obj, create_clone) {
    cake.produtosKits.cacheConsultas[produto.id] = produto;
    $(obj).closest('tr').find('.desc-produto-id').val(produto.id);
    $(obj).closest('tr').find('.desc-codigo').val(produto.barra);
    $(obj).closest('tr').find('.desc-nome').val(produto.nome);
    $(obj).closest('tr').find('.desc-quantidade').val('').focus();
    $(obj).closest('tr').attr('rel', 'produto_' + produto.id);
    if (create_clone == true) {
        cake.produtosKits.clone();
    }
    $('.remove-linha').show();
    cake.produtosKits.removeLinha();
}
cake.produtosKits.ajaxConsulta = function (obj) {
    $.ajax({
        method: "POST",
        type: "POST",
        dataType: "json",
        url: router.url + 'produtos/consultar-kit',
        data: {
            codigo: $(obj).val(),
            kit: '0'
        },
        beforeSend: function () {
            cake.util.loading.show(obj);
        },
        success: function (d) {
            cake.util.loading.hide(obj);
            if (d.retorno.cod == 999) {
                if (d.retorno.individual == 1) {
                    cake.produtosKits.set(d.retorno.produto, obj, true);
                    cake.produtosKits.preCacheConsultas[$(obj).val()] = d.retorno.produto.id;
                } else {
                    cake.produtosKits.modal(obj, d.retorno.produto);
                }
            } else {
                $(obj).closest('tr').find(".busca-produto").focus().val('');
                cake.msg.erro('Erro na consulta.', 'Não foi localizado nenhum produto com os dados informados.');
            }
        }
    });
}
cake.produtosKits.consulta = function () {
    $(".busca-produto").change(function (e) {
        e.preventDefault();
        var obj = this;
        var v = $.trim($(obj).val());
        console.log(v);
        if (v != '') {
            if (!cake.produtosKits.preCacheConsultas[v]) {
                cake.produtosKits.ajaxConsulta(obj);
            } else {
                cake.produtosKits.set(cake.produtosKits.cacheConsultas[cake.produtosKits.preCacheConsultas[v]], obj, true);
            }
        } else {
            $(obj).closest('tr').find(':input').eq(0).focus();
        }
    });
}

cake.produtosKits.removeLinha = function () {
    $('.remove-linha').click(function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        var count = $('.lista-itens-produtosKits tr').length;
        if (count < 2) {
            $('.remove-linha').hide();
        }
    });
}

$(function () {
    cake.produtosKits.search();
    cake.produtosKits.consulta();
    $('.remove-linha').show();
    var count = $('.lista-itens-produtosKits tr').length;
    if (count < 2) {
        $('.remove-linha').hide();
    }
});