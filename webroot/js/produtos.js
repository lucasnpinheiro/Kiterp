cake.produtos = {};
cake.produtos.calcularPorcentagem = function () {
    $('.calcular-procentagem').change(function (e) {
        e.preventDefault();
        var venda = cake.util.convertFloat($(this).val());
        var compra = cake.util.convertFloat($(this).closest('.tab-pane').find('.valor-compra').val());
        var calculo = (((venda - compra) / venda) * 100).toFixed(4);
        calculo = calculo.toString().replace('.', ',');
        console.log(venda);
        console.log(compra);
        console.log(calculo);
        $(this).closest('.tab-pane').find('.margem').val(calculo);
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
});