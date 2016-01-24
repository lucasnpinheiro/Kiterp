cake.produtos = {};

cake.produtos.duplicidade = function (tipo) {
    $('#' + tipo).change(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'produtos/verifica',
            data: {
                tipo: tipo.replace('-', '_'),
                valor: $(this).val()
            },
            success: function (d) {
                if (d.cod == 999) {
                    window.location.href = router.url + '/produtos/edit/' + d.id;
                }
            }
        });
    });
}

cake.produtos.calcularPorcentagem = function () {
    $('.calcular-procentagem').change(function (e) {
        e.preventDefault();
        var venda = cake.util.convertFloat($(this).val());
        var compra = cake.util.convertFloat($(this).closest('.tab-pane').find('.valor-compra').val());
        var calculo = (((venda - compra) / venda) * 100).toFixed(4);
        calculo = calculo.toString().replace('.', ',');
        $(this).closest('.tab-pane').find('.margem').val(calculo);
        if (venda < compra) {
            cake.msg.erro('Erro de calculo.', 'O valor da VENDA está menor que o de COMPRA.');
        }
    });
}

cake.produtos.setKit = function () {
    $('#produto-kit').change(function (e) {
        e.preventDefault();
        $('.valor-compra').attr('required', true);
        $('.calcular-procentagem').attr('required', true);
        $('.calcular-procentagem, .estoque-minimo, .estoque-atual, .valor-compra, .margem').removeAttr('disabled');
        if ($(this).val() == 1) {
            $('.valor-compra').removeAttr('required');
            $('.calcular-procentagem').removeAttr('required');
            $('.calcular-procentagem, .estoque-minimo, .estoque-atual, .valor-compra, .margem').attr('disabled', true);
        }
    });
}

$(function () {
    cake.produtos.calcularPorcentagem();
    cake.produtos.setKit();
    cake.produtos.duplicidade('barra');
    cake.produtos.duplicidade('codigo-interno');
    if (router.params.pass[0] > 0) {
        cake.session.delete(router.params.pass[0]);
    }
});