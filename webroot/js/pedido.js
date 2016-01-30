cake.pedidos = {};
cake.pedidos.sequencia = 0;
//cake.util.convertFloat($('.desc-valor-unitario').val())
cake.pedidos.cache = function (chave, valor) {
    if (!chave) {
        console.log('Sem chave');
        return null;
    } else {
        chave = chave.toUpperCase();
        if (!valor) {
            console.log(chave);
            var r = cake.session.read(chave);
            return (!r ? null : r);
        } else {
            return cake.session.write(chave, valor);
        }
    }
}

cake.pedidos.calculaLinha = function () {
    $('.calcula-linha').blur(function (e) {
        e.preventDefault();
        var valor_unitario = cake.util.convertFloat($('.desc-valor-unitario').val());
        valor_unitario = (!valor_unitario ? 0 : valor_unitario);
        var quantidade = parseFloat($('.desc-quantidade').val());
        quantidade = (!quantidade ? 0 : quantidade);
        if (quantidade <= 0 || valor_unitario <= 0) {
            $('.desc-quantidade').focus();
        } else {
            var prod = cake.pedidos.cache($('.desc-produto-id').val());
            if (valor_unitario >= prod.valor_minimo) {
                var total = valor_unitario * quantidade;
                var tr = '<tr {rel_id}>\n\
                    <td>\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][produto_id]" value="' + prod.id + '" type="hidden">\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][nome]" value="' + prod.nome + '" type="hidden">\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][barra]" value="' + prod.barra + '" type="hidden">\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][quantidade]" value="' + quantidade + '" type="hidden">\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][valor_unitario]" value="' + valor_unitario + '" type="hidden">\n\
                        <input name="Produto[' + cake.pedidos.sequencia + '][valor_total]" value="' + total + '" type="hidden">\n\
                        ' + prod.barra + '\n\
                    </td>\n\
                    <td>' + prod.nome + '</td>\n\
                    <td class="text-center">' + quantidade + '</td>\n\
                    <td class="text-center">' + cake.util.moeda(valor_unitario) + '</td>\n\
                    <td class="text-center">' + cake.util.moeda(total) + '</td>\n\
                    <td class="text-center"><button type="button" class="btn btn-xs btn-danger remove-linha">X</button></td>\n\
                  </tr>';

                $.ajax({
                    method: "POST",
                    type: "POST",
                    dataType: "json",
                    url: router.url + 'pedidos/item',
                    data: {
                        'pedido_id': $('#pedido-id').val(),
                        'produto_id': prod.id,
                        'quantidade': quantidade,
                        'valor_unitario': valor_unitario
                    },
                    success: function (d) {
                        cake.pedidos.sequencia++;
                        tr = tr.replace('{rel_id}', 'rel="' + d.id + '"');
                        $('.lista-itens-pedidos').append(tr);
                        $('.lista-itens-pedidos-clone').find(':input').val('');
                        $('.busca-produto-input').focus();
                        $('.seta-total').html('Total: ' + cake.util.moeda(d.total));
                        cake.pedidos.consulta();
                        cake.pedidos.removeLinha();
                        cake.util.rotinas();
                    }
                });
            } else {
                cake.msg.erro('Erro no calculo.', 'O valor maximo de desconto <br /> é de ' + cake.util.moeda(prod.valor_minimo));
                $('.desc-quantidade').focus();
            }
        }
    });
}

cake.pedidos.removeLinha = function () {
    $('.remove-linha').click(function (e) {
        e.preventDefault();
        var obj = this;
        $(obj).closest('tr').css({
            'background': 'yellow'
        });
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'pedidos/item_remover',
            data: {
                'id': $(obj).closest('tr').attr('rel'),
                'pedido_id': $('#pedido-id').val()
            },
            success: function (d) {
                $(obj).closest('tr').slideUp().remove();
                $('.busca-produto-input').focus();
                $('.seta-total').html('Total: ' + cake.util.moeda(d.total));
                cake.pedidos.consulta();
                cake.pedidos.removeLinha();
                cake.util.rotinas();
            }
        });

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
                $('#pedido-id').val(d.id);
                $('#id').val(d.id);
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

cake.pedidos.set = function (produto) {
    cake.pedidos.cache(produto.id, produto);
    $('.desc-produto-id').val(produto.id);
    $('.desc-codigo').val(produto.barra);
    $('.desc-valor-unitario').val(cake.util.moeda(produto.valor_vendas));
    $('.desc-nome').val(produto.nome);
    $('.desc-quantidade').val('').focus();
    //lista-itens-pedidos
    $('.remove-linha').show();
    cake.pedidos.removeLinha();
}
cake.pedidos.ajaxConsulta = function (obj) {
    var busca = cake.pedidos.cache($(obj).val());
    if (!busca) {
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
                    cake.pedidos.cache(d.retorno.produto.id, d.retorno.produto);
                    cake.pedidos.cache(d.retorno.produto.barra, d.retorno.produto);
                    cake.pedidos.cache(d.retorno.produto.codigo_interno, d.retorno.produto);
                    cake.pedidos.set(d.retorno.produto);
                } else if (d.retorno.cod == 222) {
                    cake.msg.erro('Erro na consulta.', 'Este produto é um KIT, e não foi localizado(s) produto(s) vinculado(s) a ele.');
                } else {
                    cake.msg.erro('Erro na consulta.', 'Não foi localizado nenhum produto com os dados informados.');
                }
            }
        });
    } else {
        cake.pedidos.set(busca);
    }
}
cake.pedidos.consulta = function () {
    $('.busca-produto-input').change(function (e) {
        e.preventDefault();
        cake.pedidos.ajaxConsulta(this);
    });
    //$(".busca-produto").select2("destroy");
    $(".busca-produto").select2({
        ajax: {
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'produtos/consultar_combo',
            delay: 250,
            language: "pt-BR",
            data: function (params) {
                return {
                    codigo: params.term,
                    empresa: $("#empresa-id").val()
                };
            },
            processResults: function (d, params) {
                if (d.retorno.cod == 999) {
                    $.each(d.retorno.produto, function (a, b) {
                        cake.pedidos.cache(b.id, b);
                        cake.pedidos.cache(b.barra, b);
                        cake.pedidos.cache(b.codigo_interno, b);
                    });

                    return {
                        results: d.retorno.produto
                    };
                } else if (d.retorno.cod == 222) {
                    cake.msg.erro('Erro na consulta.', 'Este produto é um KIT, e não foi localizado(s) produto(s) vinculado(s) a ele.');
                } else {
                    cake.msg.erro('Erro na consulta.', 'Não foi localizado nenhum produto com os dados informados.');
                }
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        minimumInputLength: 1,
        templateResult: formatRepo
    }).on("select2:select", function (e) {
        cake.pedidos.set(e.params.data);
    });
}

$(function () {
    cake.pedidos.consulta();
    cake.pedidos.calculaLinha();
    cake.util.pularCampo();
    cake.pedidos.removeLinha();
    $('#empresa-id, #pessoa-id, #condicao-pagamento-id, #vendedor-id').change(function (e) {
        e.preventDefault();
        cake.pedidos.gerarPedido();
    });
    $(':submit').click(function (e) {
        $('#status').val(2);
        if ($(this).val() == 'orcamento') {
            $('#status').val(4);
        }
        var c = $.trim($('.lista-itens-pedidos').html());
        if (c == '') {
            e.preventDefault();
            cake.msg.erro('Erro na finalização do Pedido.', 'Não foi informado nenhum item para fechar o pedido.');
        }
    });
});


function formatRepo(repo) {
    if (repo.loading)
        return repo.text;

    var markup = "<div class='select2-result-repository clearfix'><div><span>" + repo.barra + "</span> | <span>" + repo.nome + "</span> | <span>R$ " + cake.util.moeda(repo.valor_vendas) + "</span></div></div>";

    return markup;
}
