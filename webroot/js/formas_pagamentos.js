cake.formas_pagamentos = {};
cake.formas_pagamentos.clone = function (quantidade) {
    $('.multi-field-wrapper').show();
    $('.add-virtual-taxa').remove();
    $('.multi-fields :input').removeAttr('required');
    if (quantidade > 0) {
        var $wrapper = $('.multi-fields').find('.multi-field').eq(0).html();
        for (var s = 1; s < quantidade; s++) {
            var input = $wrapper;
            input = input.replace(/\[0\]/g, '[' + s + ']');
            input = input.replace(/\-0\-/g, '-' + s + '-');
            input = input.replace(/\[0\]/g, '[' + s + ']');
            input = input.replace(/\.0\./g, '.' + s + '.');
            $('.multi-fields').append('<div class="multi-field col-xs-3 add-virtual-taxa">' + input + '</div>');
        }
        $('.multi-fields :input').attr('required', 'required');
        $('.multi-fields').find('.multi-field :input').eq(0).focus();
    } else {
        $('.multi-field-wrapper').hide();
    }
    cake.util.pularCampo();
    cake.util.rotinas();
}

$(function () {
    $('#qtde-taxas').change(function () {
        cake.formas_pagamentos.clone($(this).val());
    });
    cake.util.pularCampo();
    cake.util.rotinas();
});