cake.condicoes_pagamentos = {};
cake.condicoes_pagamentos.dias = 1;
cake.condicoes_pagamentos.clone = function (quantidade) {
    $('.multi-field-wrapper').show();
    $('.add-parcelas').remove();
    $('.multi-fields :input').removeAttr('required');
    cake.condicoes_pagamentos.dias = ($('#qtde-dias').val() != '' ? parseInt($('#qtde-dias').val()) : 1);
    $('#parcelas-0').val(cake.condicoes_pagamentos.dias);
    if (quantidade > 0) {
        var $wrapper = $('.multi-fields').find('.multi-field').eq(0).html();
        for (var s = 1; s < quantidade; s++) {
            cake.condicoes_pagamentos.dias += ($('#qtde-dias').val() != '' ? parseInt($('#qtde-dias').val()) : cake.condicoes_pagamentos.dias);
            var input = $wrapper;
            input = input.replace(/\[0\]/g, '[' + s + ']');
            input = input.replace(/\-0/g, '-' + s + '');
            input = input.replace(/\[0\]/g, '[' + s + ']');
            input = input.replace(/\.0/g, '.' + s + '');
            $('.multi-fields').append('<div class="multi-field col-xs-2 add-parcelas">' + input + '</div>');
            $('#parcelas-' + s).val(cake.condicoes_pagamentos.dias);
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
    $('#qtde-parcelas').change(function () {
        cake.condicoes_pagamentos.clone($(this).val());
    });
    $('#qtde-dias').change(function () {
        cake.condicoes_pagamentos.clone($('#qtde-parcelas').val());
    });
    //cake.condicoes_pagamentos.clone($('#qtde-parcelas').val());
    cake.util.pularCampo();
    cake.util.rotinas();
});