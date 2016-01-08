cake.pessoas = {};

cake.pessoas.tipoPessoa = function () {
    $('.div-pessoas-fisica, .div-pessoas-juridica').hide();
    $('.div-pessoas-fisica').find(':input').removeAttr('required');
    $('.div-pessoas-juridica').find(':input').removeAttr('required');

    if ($('#tipo-pessoa').val() != '') {
        if ($('#tipo-pessoa').val() == 1) {
            $('.div-pessoas-fisica').find('#pessoasfisica-cpf').attr('required', 'required');
            $('.div-pessoas-fisica').show();
            cake.pessoas.consulta('fisica');
        } else if ($('#tipo-pessoa').val() == 2) {
            $('.div-pessoas-juridica').find('#pessoasjuridica-cnpj').attr('required', 'required');
            $('.div-pessoas-juridica').find('#pessoasjuridica-data-abertura').attr('required', 'required');
            $('.div-pessoas-juridica').show();
            cake.pessoas.consulta('juridica');
        }
    }

    $('#tipo-pessoa').change(function (e) {
        e.preventDefault();
        if ($(this).val() == 1) {
            $('.div-pessoas-fisica').find('#pessoasfisica-cpf').attr('required', 'required');
            $('.div-pessoas-fisica').show();
            cake.pessoas.consulta('fisica');
        } else if ($(this).val() == 2) {
            $('.div-pessoas-juridica').find('#pessoasjuridica-cnpj').attr('required', 'required');
            $('.div-pessoas-juridica').find('#pessoasjuridica-data-abertura').attr('required', 'required');
            $('.div-pessoas-juridica').show();
            cake.pessoas.consulta('juridica');
        }
    });

}
cake.pessoas.clone = function (tipo) {
    cake.pessoas[tipo] = $('.' + tipo + '-multi-field').length;
    var $wrapper = $('.' + tipo + '-multi-fields').find('.' + tipo + '-multi-field').eq(0).html();
    $("." + tipo + "-add-field").click(function (e) {
        e.preventDefault();
        cake.pessoas[tipo]++;
        var input = $wrapper;
        input = input.replace(/\[0\]/g, '[' + cake.pessoas[tipo] + ']');
        input = input.replace(/PessoasContato.0/g, 'PessoasContato.' + cake.pessoas[tipo]);
        input = input.replace(/pessoascontato-0/g, 'pessoascontato-' + cake.pessoas[tipo]);

        $('.' + tipo + '-multi-fields').append('<div class="' + tipo + '-multi-field col-xs-12"><div class="clearfix"></div><div class="hr-line-dashed"></div>' + input + '<div class="form-group text col-xs-12 col-md-1 class-button-' + tipo + '"><button type="button" class="btn btn-danger ' + tipo + '-remove-field">X</button></div></div>');
        $('.' + tipo + '-remove-field').click(function (e) {
            e.preventDefault();
            $(this).closest('.' + tipo + '-multi-field').remove();
        });
    });

}
cake.pessoas.consulta = function (tipo) {
    if ($('#PessoaId').val() == '') {
        var v = null;
        if (tipo == 'fisica') {
            v = $('#pessoasfisica-cpf');
        } else {
            v = $('#pessoasjuridica-cnpj');
        }
        v.change(function (e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                type: "POST",
                dataType: "json",
                url: router.url + 'pessoas/verifica',
                data: {
                    tipo: tipo, valor: $(this).val()
                },
                success: function (d) {
                    if (d.cod == 999) {
                        window.location.href = router.url + 'pessoas/edit/' + d.id;
                    }
                }
            })
        });
    }
}

cake.pessoas.usuarios = function () {
    //pessoasassociacao-usuario
    $('.div-usuarios').find(':input').removeAttr('required');
    if ($('#pessoasassociacao-usuario').is(':checked')) {
        $('.div-usuarios').find('#usuario-username').attr('required', 'required');
        $('.div-usuarios').show();
    }

    $('#pessoasassociacao-usuario').click(function (e) {
        $('.div-usuarios').hide();
        $('.div-usuarios').find(':input').removeAttr('required');
        if ($(this).is(':checked')) {
            $('.div-usuarios').find('#usuario-username').attr('required', 'required');
            $('.div-usuarios').show();
        }
    });
}

$(function () {
    cake.pessoas.tipoPessoa();
    cake.pessoas.clone('contatos');
    cake.pessoas.clone('enderecos');
    cake.pessoas.usuarios();
    $('#cadastro_pessoa').submit(function (e) {

        var total = 0;
        $('.checkbox :input').each(function (a, b) {
            console.log(a);
            console.log(b);
            if ($(this).is(':checked')) {
                total++;
            }
        });
        if (total < 1) {
            e.preventDefault();
            cake.msg.erro('Erro ao gravar os dados.', 'Não foi selecionado nenhum tipo de associação.');
        }
    });
});