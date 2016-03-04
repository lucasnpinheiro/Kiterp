var cake = {};
cake.util = {};

cake.util.rotinas = function () {
    cake.util.mascaras();
    cake.util.pularCampo();
    //$("select.auto-select2-cake").select2("destroy");
    cake.util.select2();

};
cake.util.select2 = function () {
    $('select.auto-select2-cake').select2({
        'language': "pt-BR"
    });
}
cake.util.numero = function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
};
cake.util.moeda = function (valor) {
    return 'R$ ' + cake.util.number_format(valor, 2, ',', '.');
};
cake.util.number_format = function (number, decimals, dec_point, thousands_sep) {
    number = (number + '')
            .replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k)
                        .toFixed(prec);
            };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
            .split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
            .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
                .join('0');
    }
    return s.join(dec);
};
cake.util.convertFloat = function (valor) {
    if (!valor) {
        valor = 0;
    } else {
        valor = valor.replace('R$', '');
        valor = valor.replace(".", "");
        valor = valor.replace(",", ".");
        valor = $.trim(valor);
    }
    return parseFloat(valor);
};
cake.util.loading = {
    show: function (input) {
        $(input).remove('img.img-loading');
        $(input).closest('div').prepend('<img src="' + router.url + 'img/loading.gif" class="img-loading" style="margin-top: 28px; position: absolute; right: 20px;" />');
    },
    hide: function (input) {
        $(input).closest('div').find('.img-loading').remove();
    }
}

cake.util.pularCampo = function () {
    $(':input:not(textarea)').keydown(function (e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 13) {
            e.preventDefault();
            var inputs = $(this).closest('form').find(':input:visible:enabled:not([readonly])');
            if ((inputs.length - 1) == inputs.index(this))
                $(':input:enabled:visible:first:not([readonly])').focus();
            else
                inputs.eq(inputs.index(this) + 1).focus();
        }
    });
};
cake.util.getCep = function (cep, before) {
    if (!before) {
        before = '';
    }
    $.getJSON(router.url + "utilits/cep/" + cep, function (data) {
        if (data.retorno.result.status == 'OK') {
            $('#' + before + 'endereco').val(data.retorno.result.Cep.logradouro);
            $('#' + before + 'bairro').val(data.retorno.result.Cep.bairro);
            $('#' + before + 'cidade').val(data.retorno.result.Cep.cidade);
            $('#' + before + 'estado').val(data.retorno.result.Cep.uf);
            $('#' + before + 'numero').focus();
        }
    });
}

cake.session = {
    _valida: function () {
        return (!window.sessionStorage ? false : true);
    },
    write: function (key, value) {
        value = JSON.stringify(value);
        window.sessionStorage.setItem(key, value);
    },
    merge: function (key, value) {
        var settings = {};
        var v = cake.session.read(key);
        if (!v) {
            settings = $.extend(true, v, value);
        }
        cake.session.write(key, settings);
    },
    read: function (key) {
        value = window.sessionStorage.getItem(key);
        return JSON.parse(value);
    },
    delete: function (key) {
        window.sessionStorage.removeItem(key);
    },
    clean: function () {
        window.sessionStorage.clear();
    }
};
cake.local = {
    _valida: function () {
        return (!window.localStorage ? false : true);
    },
    write: function (key, value) {
        value = JSON.stringify(value);
        window.localStorage.setItem(key, value);
    },
    read: function (key) {
        value = window.localStorage.getItem(key);
        return JSON.parse(value);
    },
    delete: function (key) {
        window.localStorage.removeItem(key);
    },
    clean: function () {
        window.localStorage.clear();
    }
};

cake.msg = {};
cake.msg.sucesso = function (titulo, mensagem, tempo) {
    cake.msg._run(titulo, mensagem, 'success', tempo);
}
cake.msg.erro = function (titulo, mensagem, tempo) {
    cake.msg._run(titulo, mensagem, 'error', tempo);
}
cake.msg._run = function (titulo, mensagem, tipo, tempo) {
    if (!tempo) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 10000
        };
        switch (tipo) {
            case 'success':
                toastr.success(mensagem, titulo);
                break;

            case 'error':
                toastr.error(mensagem, titulo);
                break;

        }

    } else {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 10000
            };
            switch (tipo) {
                case 'success':
                    toastr.success(mensagem, titulo);
                    break;

                case 'error':
                    toastr.error(mensagem, titulo);
                    break;

            }

        }, 1300);
    }
}
cake.util.mascaras = function () {
    $('.numero').keypress(cake.util.numero);
    $('.cep').mask('99999-999');
    $('.cpf').mask('999.999.999-99');
    $('.cnpj').mask('99.999.999/9999-99');
    $('.data').mask('99/99/9999');
    $('.telefone').mask('(99) 99999-9999');
    $('.date .input-group .data').datepicker('remove').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
    $(".moeda").each(function () {
        if ($(this).prop('readonly') == false) {
            $(this).maskMoney({
                prefix: $(this).attr('data-prefix'),
                allowNegative: $(this).attr('data-allowNegative'),
                thousands: $(this).attr('data-thousands'),
                decimal: $(this).attr('data-decimal'),
                affixesStay: $(this).attr('data-affixesStay')
            });
        }
    });
    $(".juros").each(function () {
        if ($(this).prop('readonly') == false) {
            $(this).maskMoney({
                suffix: $(this).attr('data-suffix'),
                allowNegative: $(this).attr('data-allowNegative'),
                thousands: $(this).attr('data-thousands'),
                decimal: $(this).attr('data-decimal'),
                affixesStay: $(this).attr('data-affixesStay'),
                precision: $(this).attr('data-precision')
            });
        }
    });
    $(".quantidade").each(function () {
        if ($(this).prop('readonly') == false) {
            $(this).maskMoney({
                suffix: $(this).attr('data-suffix'),
                allowNegative: $(this).attr('data-allowNegative'),
                thousands: $(this).attr('data-thousands'),
                decimal: $(this).attr('data-decimal'),
                affixesStay: $(this).attr('data-affixesStay'),
                precision: $(this).attr('data-precision')
            });
        }
    });
    $(".peso").each(function () {
        $(this).change(function () {
            if ($(this).prop('readonly') == false) {
                var casas = $(this).attr('casas');
                var v = $(this).val();
                v = parseFloat(v.replace(/,/g, '.')).toFixed(parseInt(casas));
                $(this).val(v);
            }
        });
    });


};

$(function () {
    cake.util.rotinas();
    /*$('form').submit(function(e){
     e.preventDefault();
     });*/
});