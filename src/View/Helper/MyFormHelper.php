<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MyHtmlHelper
 * @author lucas
 */

namespace App\View\Helper;

use Bootstrap\View\Helper\BootstrapFormHelper;
use Cake\ORM\TableRegistry;

class MyFormHelper extends BootstrapFormHelper {

    public $helpers = [
        'Html' => [
            'className' => 'MyHtml'
        ],
        'Url'
    ];

    public function __construct(\Cake\View\View $view, array $config = []) {
        $this->helpers[] = 'Number';
        parent::__construct($view, $config);
    }

    public function editor($fieldName, array $options = [], array $configure = []) {
        $_configure = [
            'buttonSource' => true,
            'plugins' => ['table', 'video'],
            'lang' => 'pt_br'
                ] + $configure;
        $this->Html->css('/css/redactor.css', ['block' => 'css']);
        $this->Html->css('/js/plugins/redactor/clips/clips/clips.css', ['block' => 'css']);

        $this->Html->script('/js/redactor.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/clips/clips/clips.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/counter/counter.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/definedlinks/definedlinks.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/filemanager/filemanager.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/fontcolor/fontcolor.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/fontfamily/fontfamily.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/fontsize/fontsize.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/fullscreen/fullscreen.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/imagemanager/imagemanager.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/limiter/limiter.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/table/table.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/textdirection/textdirection.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/textexpander/textexpander.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/video/video.js', ['block' => 'script']);
        $this->Html->script('/js/plugins/redactor/pt_br.js', ['block' => 'script']);
        $this->Html->scriptBlock("
            jQuery(function(){
                jQuery('textarea.editor_redactor').redactor(" . json_encode($_configure) . ");  
            });
        ", ['block' => 'script']);


        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        $options['class'] .= ' editor_redactor';
        $options['type'] = 'textarea';
        return $this->input($fieldName, $options);
    }

    public function statusPedido($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Aberto'),
                2 => __('Emitido'),
                3 => __('Recebido'),
                4 => __('Orçamento'),
                5 => __('Nota Fiscal'),
                6 => __('Cancelado'),
                7 => __('Em Recebimento'),
            ],
            'empty' => __('Selecionar uma Situação')
        ];
        return $this->input($fieldName, $options);
    }

    public function status($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                0 => __('Inativo'),
                1 => __('Ativo'),
            //9 => __('Excluido'),
            ],
            'empty' => __('Selecionar uma Situação')
        ];
        return $this->input($fieldName, $options);
    }

    public function statusContas($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Aberto'),
                2 => __('baixado'),
                3 => __('Cancelado'),
            //9 => __('Excluido'),
            ],
            'empty' => __('Selecionar uma Situação')
        ];
        return $this->input($fieldName, $options);
    }

    public function tipoPessoa($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Física'),
                2 => __('Jurídica'),
            ],
            'empty' => __('Selecionar um Tipo de Pessoa')
        ];
        return $this->input($fieldName, $options);
    }

    public function tipoImpostos($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Icms Simples Nacional'),
                2 => __('Icms Regime Normal'),
                3 => __('Ipi'),
                4 => __('Cst Pis'),
                5 => __('Cst Cofins'),
                6 => __('Icms Origem'),
                7 => __('Tabela Cfop'),
            ],
            'empty' => __('Selecionar um Tipo de Imposto')
        ];
        return $this->input($fieldName, $options);
    }

    public function tipoContribuinte($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Contribuinte Icms'),
                2 => __('Contribuinte Isento'),
                3 => __('Não Contribuinte'),
            ],
            'empty' => __('Selecionar um Tipo de Contribuinte')
        ];
        return $this->input($fieldName, $options);
    }

    public function empresas($fieldName, array $options = []) {
        $empresas = TableRegistry::get('Empresas');

        $find = $empresas->find()->contain('Pessoas')->all();
        $_empresas = [];
        if (!empty($find)) {
            foreach ($find as $key => $value) {
                $_empresas[$value->id] = $value->pessoa->nome;
            }
        }
        $options += [
            'type' => 'select',
            'options' => $_empresas,
            'empty' => __('Selecionar uma Empresa')
        ];
        return $this->input($fieldName, $options);
    }

    public function associacao($fieldName, array $options = []) {
        //1 - Empresa | 2 - Cliente | 3 - Fornecedor | 4 - Vendedor | 5 - Representante | 6 - Funcionario | 7 - Usuários
        $options += [
            'type' => 'select',
            'options' => [
                2 => __('Cliente'),
                3 => __('Fornecedor'),
                4 => __('Vendedor'),
                5 => __('Representante'),
                6 => __('Funcionario'),
                7 => __('Usuários'),
            ],
            'empty' => __('Selecionar um Tipo de Associação')
        ];
        return $this->input($fieldName, $options);
    }

    public function tipoEndereco($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Residencial'),
                2 => __('Comercial'),
                3 => __('Cobrança'),
                4 => __('Entrega'),
                5 => __('Recado'),
                6 => __('Outros'),
            ],
            'empty' => __('Selecionar um Tipo de Endereço')
        ];
        return $this->input($fieldName, $options);
    }

    public function button($title, array $options = []) {
        if (!isset($options['icon'])) {
            $title = $this->Html->icon('save') . ' ' . $title;
        } else if ($options['icon'] != '') {
            $title = $this->Html->icon($options['icon']) . ' ' . $title;
        }
        return parent::button($title, $options);
    }

    public function postLink($title, $url = null, array $options = []) {
        if (!isset($options['class'])) {
            $options['class'] = ' btn btn-xs ';
        }
        $options['escape'] = false;
        if (!isset($options['icon'])) {
            $options['icon'] = 'trash-o';
            $options['class'] .= ' btn-danger ';
        }

        return parent::postLink($title, $url, $options);
    }

    public function create($model = null, array $options = []) {
        if (is_null($model) OR trim($model) == '') {
            $_id = 'MyFormCakePhp' . time();
            $options = [
                'id' => $_id,
                'name' => $_id,
                    ] + $options;
        }
        return parent::create($model, $options);
    }

    public function file($fieldName, array $options = []) {
        $this->_customFileInput = true;
        if (!$this->_customFileInput || (isset($options['default']) && $options['default'])) {
            return parent::file($fieldName, $options);
        }
        if (!isset($options['id'])) {
            $options['id'] = $fieldName;
        }
        $options += ['secure' => true];
        $options = $this->_initInputField($fieldName, $options);
        unset($options['type']);
        $countLabel = $this->_extractOption('count-label', $options, __('files selected'));
        unset($options['count-label']);
        $fileInput = $this->widget('file', array_merge($options, [
            'style' => 'display: none;',
            'onchange' => "document.getElementById('" . $options['id'] . "-input').value = (this.files.length <= 1) ? this.files[0].name : this.files.length + ' ' + '" . $countLabel . "';"
        ]));
        $fakeInput = $this->text($fieldName, array_merge($options, [
            'readonly' => 'readonly',
            'id' => $options['id'] . '-input',
            'onclick' => "document.getElementById('" . $options['id'] . "').click();"
        ]));
        $buttonLabel = $this->_extractOption('button-label', $options, __('Choose File'));
        unset($options['button-label']);
        $fakeButton = $this->button($buttonLabel, [
            'icon' => 'upload',
            'type' => 'button',
            'onclick' => "document.getElementById('" . $options['id'] . "').click();"
        ]);
        return $fileInput . $this->Html->div('input-group', $this->Html->div('input-group-btn', $fakeButton) . $fakeInput);
    }

    public function input($fieldName, array $options = []) {
        $options = $this->_parseOptions($fieldName, $options);
        $div = $this->_extractOption('div', $options, '');
        if ($div) {
            $_div = '';
            if (!isset($div['class'])) {
                $div['class'] = '';
            }
            $div['class'] = 'form-group {{type}}{{required}} ' . $div['class'];
            foreach ($div as $key => $value) {
                $_div .= $key . '="' . $value . '"';
            }
            $this->templates(['inputContainer' => '<div ' . $_div . '>{{content}}</div>']);
            unset($_div);
        }

        $options['title'] = $fieldName;
        if (isset($options['label']) AND $options['label'] != false) {
            $options['title'] = $options['label'];
        } else if (isset($options['placeholder']) AND $options['placeholder'] != false) {
            $options['title'] = $options['placeholder'];
        }
        $this->mergeClassCss([], $options);
        /* if($options['type'] == 'radio' OR $options['type'] == 'checkbox'){
          $input =    parent::input($fieldName, $options);

          } */
        return parent::input($fieldName, $options);
    }

    public function myWrap($input, $prepend, $append) {
        return $this->prepend($input, $prepend) . $input . $this->append($input, $append);
    }

    public function mail($fieldName, array $options = []) {
        $default = [
            'label' => 'E-mail',
            'type' => 'email',
            'prepend' => '@'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function data($fieldName, array $options = []) {
        $default = [
            'value' => '',
            'class' => 'data',
            'div' => [
                'class' => 'date'
            ],
            'type' => 'text',
            'wrap' => 'date',
            'append' => '<i class="fa fa-calendar fa-lg"></i>',
        ];
        $val = $this->context();
        if (!empty($val->val($fieldName))) {
            $default['value'] = $val->val($fieldName);
        }

        $options = \Cake\Utility\Hash::merge($default, $options);
        if (trim($options['value']) != '') {
            //$options['value'] = $this->Html->data($options['value']);
        }
        $options = $this->mergeClassCss($default, $options);
        $options['div']['class'] .= ' ' . $default['div']['class'];

        return $this->input($fieldName, $options);
    }

    public function numero($fieldName, array $options = []) {
        $default = [
            'type' => 'text',
            'class' => 'numero',
            'append' => '0-9',
            'maxlength' => 5,
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function telefone($fieldName, array $options = []) {
        $default = [
            'type' => 'text',
            'class' => 'telefone',
            'append' => '<i class="fa fa-phone"></i>'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cep($fieldName, array $options = []) {
        $default = [
            'label' => 'CEP',
            'type' => 'text',
            'class' => 'cep',
            'append' => '0-9'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function moeda($fieldName, array $options = []) {
        $currency = [
            'before' => '',
            'zero' => '0,00',
            'places' => '2',
            'precision' => '2',
            'locale' => 'pt_BR',
        ];

        $val = $this->context();
        $default = [
            'type' => 'text',
            'class' => 'moeda',
            'append' => '<i class="fa fa-money"></i>',
            'value' => ($val->val($fieldName) ? $this->Number->format($val->val($fieldName), $currency) : null)
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function juros($fieldName, array $options = []) {
        $currency = [
            'before' => '',
            'zero' => '0,0000',
            'places' => '4',
            'precision' => '4',
            'locale' => 'pt_BR',
        ];
        $val = $this->context();
        $default = [
            'type' => 'text',
            'class' => 'juros',
            'append' => '%',
            'value' => ($val->val($fieldName) ? $this->Number->format($val->val($fieldName), $currency) : null)
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function quantidade($fieldName, array $options = []) {
        $currency = [
            'before' => '',
            'zero' => '0,0000',
            'places' => '2',
            'precision' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'locale' => 'pt_BR',
        ];
        $val = $this->context();
        $default = [
            'type' => 'text',
            'class' => 'quantidade',
            'casas' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'append' => '0-9',
            'value' => ($val->val($fieldName) ? $this->Number->format($val->val($fieldName), $currency) : null)
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function peso($fieldName, array $options = []) {
        $currency = [
            'before' => '',
            'zero' => '0,0000',
            'places' => '2',
            'precision' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'locale' => 'pt_BR',
        ];
        $val = $this->context();
        $default = [
            'type' => 'text',
            'class' => 'peso',
            'casas' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'append' => '0-9',
            'value' => ($val->val($fieldName) ? $this->Number->format($val->val($fieldName), $currency) : null)
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cpf($fieldName, array $options = []) {
        $default = [
            'label' => 'CPF',
            'type' => 'text',
            'prepend' => $this->Html->icon('user'),
            'class' => 'cpf',
            'maxlength' => 14,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cnpj($fieldName, array $options = []) {
        $default = [
            'label' => 'CNPJ',
            'type' => 'text',
            'prepend' => $this->Html->icon('user'),
            'class' => 'cnpj',
            'maxlength' => 18,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function senha($fieldName, array $options = []) {
        $default = [
            'label' => __('Senha'),
            'type' => 'password',
            'prepend' => '<i class="fa fa-unlock-alt"></i>'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $options = $this->mergeClassCss($default, $options);
        return $this->input($fieldName, $options);
    }

    public function simNao($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                0 => __('Não'),
                1 => __('Sim'),
            ],
            'empty' => __('Selecionar uma opção')
        ];
        return $this->input($fieldName, $options);
    }

    public function tzd($fieldName, array $options = []) {
        $options += [
            'type' => 'select',
            'options' => [
                '-01:00' => '-01:00',
                '-02:00' => '-02:00 (Fernando de Noranha)',
                '-03:00' => '-03:00 (Brasília)',
                '-04:00' => '-04:00 (Manaus)',
            ],
            'empty' => __('Selecionar uma opção')
        ];
        return $this->input($fieldName, $options);
    }

    public function select2($fieldName, array $options = [], array $config = []) {
        $config += ['language' => "pt-BR"];
        $options += ['id' => $this->_domId($fieldName)];
        $options += ['type' => 'select'];
        if (isset($config['dados'])) {
            $options += $this->complementoSelect2($config['dados']);
            unset($config['dados']);
        }

        if (isset($config['tokenSeparators'])) {
            $options['help'] = 'Tipo(s) de separador(es) "' . implode('" ', $config['tokenSeparators']) . '"';
        }

        $this->Html->scriptBlock("
            jQuery('document').ready(function(){
                $('#" . $options['id'] . "').select2(" . json_encode($config) . ");
            });
        ", ['block' => 'script']);
        return $this->input($fieldName, $options);
    }

    public function select2Auto($fieldName, array $options = []) {
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        $options['class'] .= ' auto-select2-cake';
        return $this->input($fieldName, $options);
    }

    public function fileUpload($fieldName, array $options = []) {
        $image = '';
        if (isset($options['value']) AND ! empty($options['value'])) {
            if (file_exists($options['value']) and ! is_dir($options['value'])) {
                $list = pathinfo($options['value']);
                $image = '<span><img style="max-height: 150px;" class="img-responsive img-thumbnail" src="data:image/' . $list['extension'] . ';base64,' . base64_encode(file_get_contents($list['dirname'] . '/' . $list['basename'])) . '" title="' . $options['value'] . '"></span>';
            }
        }
        $options['type'] = 'file';
        unset($options['value']);
        $id = $this->_domId($fieldName);
        $this->Html->script('/js/upload.js', ['block' => 'script']);
        $this->Html->css('/css/upload.css', ['block' => 'css']);
        $this->Html->scriptBlock("document.getElementById('" . $id . "').addEventListener('change', handleFileSelect, false);", ['block' => 'script']);
        return '<div class="col-xs-12"><output id="listFileUpload">' . $image . '</output>' . $this->input($fieldName, $options) . '</div>';
    }

    public function complementoSelect2($dados) {
        $retorno = [];
        if (trim($dados) != '') {
            foreach (json_decode($dados, true) as $value) {
                $retorno['options'][$value] = $value;
                $retorno['default'][] = $value;
            }
        }
        return $retorno;
    }

    public function dropdownButton($title, array $menu = [], array $options = []) {

        $options['type'] = false;
        $options['data-toggle'] = 'dropdown';
        $options = $this->addClass($options, "dropdown-toggle");

        return $this->buttonGroup([
                    $this->button($title . ' <span class="caret"></span>', $options),
                    $this->Html->dropdown($menu)
        ]);
    }

    public function postLinkPermissao($title, $url = null, array $options = []) {
        $default = [
            'plugin' => $this->request->param('plugin'),
            'controller' => $this->request->param('controller'),
            'action' => $this->request->param('action'),
        ];
        $url = \Cake\Utility\Hash::merge($default, $url);
        $sql = 'SELECT 
                    COUNT(*) AS total
                FROM
                    menus AS Menu
                        INNER JOIN
                    menus_grupos AS MenusGrupo ON MenusGrupo.menu_id = Menu.id
                        INNER JOIN
                    usuarios_grupos AS UsuariosGrupo ON UsuariosGrupo.grupo_id = MenusGrupo.grupo_id
                WHERE
                    UsuariosGrupo.usuario_id = ' . $this->request->session()->read('Auth.User.id') . '
                        AND Menu.action = "' . $url['action'] . '"
                        AND Menu.controller = "' . $url['controller'] . '"
                        ' . ($url['plugin'] != '' ? ' AND Menu.plugin = "' . $url['plugin'] . '"' : '') . '
                        AND Menu.status = 1
                        AND Menu.root ' . ($this->request->session()->read('Auth.User.root') == 1 ? 'IN(0,1)' : '= 0');
        if (is_null($this->request->session()->read(md5($sql)))) {
            $menus = \Cake\Datasource\ConnectionManager::get('default');
            $r = $menus->execute($sql)->fetch('assoc');

            $this->request->session()->write(md5($sql), $r['total']);
            if ($r['total'] > 0) {
                return $this->postLink($title, $url, $options);
            }
        } else {
            if ($this->request->session()->read(md5($sql)) > 0) {
                return $this->postLink($title, $url, $options);
            }
        }
        return null;
    }

    private function mergeClassCss($default, $options) {
        $c = [];
        if (isset($default['class'])) {
            $ex = explode(' ', $default['class']);
            foreach ($ex as $key => $value) {
                $value = trim($value);
                $c[$value] = $value;
            }
        }
        if (isset($options['class'])) {
            $ex = explode(' ', $options['class']);
            foreach ($ex as $key => $value) {
                $value = trim($value);
                $c[$value] = $value;
            }
        }
        $options['class'] = implode(' ', $c);
        return $options;
    }

    public function inputStatic($field, $value, $options = []) {
        $default = [
            'class' => 'form-control-static',
            'label' => false
        ];
        $divDefault = [];
        $div = $this->_extractOption('div', $options, '');
        $div = \Cake\Utility\Hash::merge($divDefault, $div);
        unset($options['div']);
        $options = $this->mergeClassCss($default, $options);
        $options = \Cake\Utility\Hash::merge($default, $options);
        $label = $this->label($field, $options['label'], $divDefault);
        unset($options['label']);
        return $this->Html->tag('div', $label . $this->Html->tag('p', $value, $options), $div);
    }

    public function gerarOptions($start, $end) {
        $a = [];
        for ($i = (int) $start; $i <= (int) $end; $i++) {
            $a[$i] = $i;
        }
        return $a;
    }

}
