cake.contas_receber = {};
cake.contas_receber.calcularTaxa = function () {
    var valor_documento = cake.util.convertFloat($('#valor-documento').val());
    var taxas = cake.util.convertFloat($('#taxa').val());
    $('#valor-desconto').val('');
    $('#valor-liquido').val(cake.util.moeda(valor_documento));
    if (taxas > 0) {
        var diferenca = (taxas / 100) * valor_documento;
        var desconto = valor_documento - diferenca;
        $('#valor-desconto').val(cake.util.moeda(diferenca));
        $('#valor-liquido').val(cake.util.moeda(desconto));
    }
};
$(function () {
    $('#valor-documento, #taxa').change(function () {
        cake.contas_receber.calcularTaxa();
    });
});
