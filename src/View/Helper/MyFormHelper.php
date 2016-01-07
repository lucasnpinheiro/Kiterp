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

    public function editor($fieldName, array $options = array(), array $configure = array()) {
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

    public function status($fieldName, array $options = array()) {
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

    public function tipoPessoa($fieldName, array $options = array()) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Fisica'),
                2 => __('Juridica'),
            ],
            'empty' => __('Selecionar um Tipo de Pessoa')
        ];
        return $this->input($fieldName, $options);
    }

    public function tipoEndereco($fieldName, array $options = array()) {
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Residencial'),
                2 => __('Comercial'),
                3 => __('Cobrança'),
                4 => __('Recado'),
                5 => __('Outros'),
            ],
            'empty' => __('Selecionar um Tipo de Endereço')
        ];
        return $this->input($fieldName, $options);
    }

    public function periodoEmissao($fieldName, array $options = array()) {
        //1 - Mensal | 2 - Trimestral | 3 - Semestral | 1 - Anual
        $options += [
            'type' => 'select',
            'options' => [
                1 => __('Mensal'),
                2 => __('Trimestral'),
                3 => __('Semestral'),
                4 => __('Anual'),
            ],
            'empty' => __('Selecionar um periodo')
        ];
        return $this->input($fieldName, $options);
    }

    public function button($title, array $options = array()) {
        if (!isset($options['icon'])) {
            $title = $this->Html->icon('save') . ' ' . $title;
        } else if ($options['icon'] != '') {
            $title = $this->Html->icon($options['icon']) . ' ' . $title;
        }
        return parent::button($title, $options);
    }

    public function postLink($title, $url = null, array $options = array()) {
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

    /**
     * Returns an HTML FORM element.
     *
     * ### Options:
     *
     * - `type` Form method defaults to autodetecting based on the form context. If
     *   the form context's isCreate() method returns false, a PUT request will be done.
     * - `action` The controller action the form submits to, (optional). Use this option if you
     *   don't need to change the controller from the current request's controller.
     * - `url` The URL the form submits to. Can be a string or a URL array. If you use 'url'
     *    you should leave 'action' undefined.
     * - `encoding` Set the accept-charset encoding for the form. Defaults to `Configure::read('App.encoding')`
     * - `templates` The templates you want to use for this form. Any templates will be merged on top of
     *   the already loaded templates. This option can either be a filename in /config that contains
     *   the templates you want to load, or an array of templates to use.
     * - `context` Additional options for the context class. For example the EntityContext accepts a 'table'
     *   option that allows you to set the specific Table class the form should be based on.
     * - `idPrefix` Prefix for generated ID attributes.
     *
     * @param mixed $model The context for which the form is being defined. Can
     *   be an ORM entity, ORM resultset, or an array of meta data. You can use false or null
     *   to make a model-less form.
     * @param array $options An array of html attributes and options.
     * @return string An formatted opening FORM tag.
     * @link http://book.cakephp.org/3.0/en/views/helpers/form.html#Cake\View\Helper\FormHelper::create
     */
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

    /**
     * Creates file input widget.
     *
     * @param string $fieldName Name of a field, in the form "modelname.fieldname"
     * @param array $options Array of HTML attributes.
     * @return string A generated file input.
     * @link http://book.cakephp.org/3.0/en/views/helpers/form.html#creating-file-inputs
     */
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

    public function input($fieldName, array $options = array()) {
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
        return parent::input($fieldName, $options);
    }

    public function myWrap($input, $prepend, $append) {
        return $this->prepend($input, $prepend) . $input . $this->append($input, $append);
    }

    public function mail($fieldName, array $options = array()) {
        $default = [
            'label' => 'E-mail',
            'type' => 'email',
            'prepend' => '@'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function data($fieldName, array $options = array()) {
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
        $options['class'] .= ' ' . $default['class'];
        $options['div']['class'] .= ' ' . $default['div']['class'];

        return $this->input($fieldName, $options);
    }

    public function numero($fieldName, array $options = array()) {
        $default = [
            'type' => 'text',
            'class' => 'numero',
            'append' => '0-9',
            'maxlength' => 5,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function telefone($fieldName, array $options = array()) {
        $default = [
            'type' => 'text',
            'class' => 'telefone',
            'append' => '<i class="fa fa-phone"></i>'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cep($fieldName, array $options = array()) {
        $default = [
            'label' => 'CEP',
            'type' => 'text',
            'class' => 'cep',
            'append' => '0-9'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function moeda($fieldName, array $options = array()) {
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
        return $this->input($fieldName, $options);
    }

    public function juros($fieldName, array $options = array()) {
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
            'class' => 'juros',
            'append' => '%',
            'value' => ($val->val($fieldName) ? $this->Number->format($val->val($fieldName), $currency) : null)
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cpfCnpj($fieldName, array $options = array()) {
        $default = [
            'label' => 'CPF/CNPJ',
            'type' => 'text',
            'prepend' => $this->Html->icon('user'),
            'class' => 'cpf_cnpj',
            'maxlength' => 18,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cpf($fieldName, array $options = array()) {
        $default = [
            'label' => 'CPF',
            'type' => 'text',
            'prepend' => $this->Html->icon('user'),
            'class' => 'cpf',
            'maxlength' => 14,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function cnpj($fieldName, array $options = array()) {
        $default = [
            'label' => 'CNPJ',
            'type' => 'text',
            'prepend' => $this->Html->icon('user'),
            'class' => 'cnpj',
            'maxlength' => 18,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function senha($fieldName, array $options = array()) {
        $default = [
            'label' => __('Senha'),
            'type' => 'password',
            'prepend' => '<i class="fa fa-unlock-alt"></i>'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->input($fieldName, $options);
    }

    public function simNao($fieldName, array $options = array()) {
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

    public function receber($fieldName, array $options = array()) {
        $options += [
            'type' => 'select',
            'options' => [
                'A' => __('Aberto'),
                'B' => __('Fechado'),
                'C' => __('Cancelado'),
            ],
            'empty' => __('Selecionar uma opção')
        ];
        return $this->input($fieldName, $options);
    }

    public function select2($fieldName, array $options = array(), array $config = array()) {
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

        $this->Html->css('/plugins/select2/select2.min.css', ['block' => 'css']);
        $this->Html->script('/plugins/select2/select2.full.min.js', ['block' => 'script']);
        $this->Html->script('/plugins/select2/i18n/pt-BR.js', ['block' => 'script']);
        $this->Html->scriptBlock("
            jQuery('document').ready(function(){
                $('#" . $options['id'] . "').select2(" . json_encode($config) . ");
            });
        ", ['block' => 'script']);
        return $this->input($fieldName, $options);
    }

    public function fileUpload($fieldName, array $options = array()) {
        $image = '';
        if (isset($options['value']) AND ! empty($options['value'])) {
            $file = ltrim($options['value'], '/');
            $list = pathinfo(WWW_ROOT . $file);
            $image = '<span><img class="img-lg img-border img-circle" src="data:image/' . $list['extension'] . ';base64,' . base64_encode(file_get_contents($list['dirname'] . '/' . $list['basename'])) . '" title="' . $options['value'] . '"></span>';
        }
        unset($options['value']);
        $id = $this->_domId($fieldName);
        $this->Html->script('/js/upload.js', ['block' => 'script']);
        $this->Html->css('/css/upload.css', ['block' => 'css']);
        $this->Html->scriptBlock("document.getElementById('" . $id . "').addEventListener('change', handleFileSelect, false);", ['block' => 'script']);
        return $this->input($fieldName, $options) . '<output id="listFileUpload">' . $image . '</output>';
    }

    public function complementoSelect2($dados) {
        $retorno = array();
        if (trim($dados) != '') {
            foreach (json_decode($dados, true) as $value) {
                $retorno['options'][$value] = $value;
                $retorno['default'][] = $value;
            }
        }
        return $retorno;
    }

    /**
     * 
     * Create & return a twitter bootstrap dropdown button. This function is a shortcut for:
     * 
     *   $this->Form->$buttonGroup([
     *     $this->Form->button($title, $options), 
     *     $this->Html->dropdown($menu, [])
     *   ]);
     * 
     * @param $title The text in the button
     * @param $menu HTML tags corresponding to menu options (which will be wrapped
     * 		 into <li> tag). To add separator, pass 'divider'.
     * @param $options Options for button
     * 
     */
    public function dropdownButton($title, array $menu = [], array $options = []) {

        $options['type'] = false;
        $options['data-toggle'] = 'dropdown';
        $options = $this->addClass($options, "dropdown-toggle");

        return $this->buttonGroup([
                    $this->button($title . ' <span class="caret"></span>', $options),
                    $this->Html->dropdown($menu)
        ]);
    }

}
