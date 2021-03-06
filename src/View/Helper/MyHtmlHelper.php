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

use Bootstrap\View\Helper\BootstrapHtmlHelper;

class MyHtmlHelper extends BootstrapHtmlHelper {

    public function __construct(\Cake\View\View $view, array $config = []) {
        $this->_useFontAwesome = true;
        if (isset($config['useFontAwesome'])) {
            $this->_useFontAwesome = $config['useFontAwesome'];
        }
        $this->helpers[] = 'Number';
        parent::__construct($view, $config);
    }

    public function status($id) {
        $r = [
            0 => ['text' => __('Inativo'), 'class' => 'warning'],
            1 => ['text' => __('Ativo'), 'class' => 'success'],
            9 => ['text' => __('Excluido'), 'class' => 'danger'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function statusMovimentos($id) {
        $r = [
            1 => ['text' => __('Abertura'), 'class' => 'warning'],
            2 => ['text' => __('Entrada'), 'class' => 'success'],
            3 => ['text' => __('Saída'), 'class' => 'danger'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function statusContas($id) {
        $r = [
            1 => ['text' => __('Aberto'), 'class' => 'primary'],
            2 => ['text' => __('Baixado'), 'class' => 'success'],
            3 => ['text' => __('Cancelado'), 'class' => 'danger'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function statusPedido($id) {
        //1 - Aberto | 2 - Emitido | 3 - Recebido | 4 - Orcamento | 5 - Nota Fiscal | 6 - Cancelado
        $r = [
            1 => ['text' => __('Aberto'), 'class' => 'default'],
            2 => ['text' => __('Emitido'), 'class' => 'info'],
            3 => ['text' => __('Recebido'), 'class' => 'primary'],
            4 => ['text' => __('Orçamento'), 'class' => 'warning'],
            5 => ['text' => __('Nota Fiscal'), 'class' => 'success'],
            6 => ['text' => __('Cancelado'), 'class' => 'danger'],
            7 => ['text' => __('Em Recebimento'), 'class' => 'info'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function tipoPessoa($id) {
        $r = [
            1 => ['text' => __('Física'), 'class' => 'primary'],
            2 => ['text' => __('Jurídica'), 'class' => 'success'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function tipoImpostos($id) {
        $r = [
            1 => ['text' => __('Icms Simples Nacional'), 'class' => 'info'],
            2 => ['text' => __('Icms Regime Normal'), 'class' => 'info'],
            3 => ['text' => __('Ipi'), 'class' => 'info'],
            4 => ['text' => __('Cst Pis'), 'class' => 'info'],
            5 => ['text' => __('Cst Cofins'), 'class' => 'info'],
            6 => ['text' => __('Icms Origem'), 'class' => 'info'],
            7 => ['text' => __('Tabela Cfop'), 'class' => 'info'],
            8 => ['text' => __('Origem'), 'class' => 'info'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function tipoContribuinte($id) {
        $r = [
            1 => ['text' => __('Contribuinte Icms'), 'class' => 'primary'],
            2 => ['text' => __('Contribuinte Isento'), 'class' => 'success'],
            3 => ['text' => __('Não Contribuinte'), 'class' => 'warning'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function link($title, $url = null, array $options = []) {
        $default = [
            'iconDirection' => 'left',
            'class' => '',
            'preserveUrl' => false,
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);

        if ($options['preserveUrl'] === true) {
            if (is_array($url)) {
                if (count($this->request->query)) {
                    $url = array_merge(['?' => $this->request->query], $url);
                }
            }
        }

        if (!isset($options['icon'])) {
            if (isset($url['action'])) {
                switch ($url['action']) {
                    case 'add':
                        $title = $this->iconDirection($title, 'save', $options['iconDirection']);
                        $options['class'] .= ' btn-success ';
                        break;
                    case 'edit':
                        $title = $this->iconDirection($title, 'pencil', $options['iconDirection']);
                        $options['class'] .= ' btn-warning ';
                        break;
                    case 'list':
                        $title = $this->iconDirection($title, 'search', $options['iconDirection']);
                        $options['class'] .= ' btn-primary ';
                        break;
                    case 'view':
                        $title = $this->iconDirection($title, 'list', $options['iconDirection']);
                        $options['class'] .= ' btn-info ';
                        break;

                    default:

                        break;
                }
            }
            if (isset($options['onclick'])) {
                if ($url === '#') {
                    $title = $this->iconDirection($title, 'trash-o', $options['iconDirection']);
                    $options['class'] .= ' btn-danger ';
                }
            }
            $options['escape'] = false;
            $options['class'] .= ' btn btn-xs ';
        }


        if (isset($options['icon']) AND $options['icon'] !== false) {
            $title = $this->iconDirection($title, $options['icon'], $options['iconDirection']);
            $options['escape'] = false;
            unset($options['icon']);
        }

        if (empty($options['title'])) {
            if (!empty($url['action'])) {
                $options['title'] = __(\Cake\Utility\Inflector::camelize($url['action']));
            }
        }

        return parent::link($title, $url, $options);
    }

    private function iconDirection($title, $icon, $direction) {
        if ($direction === 'left') {
            return $this->icon($icon) . ' ' . $title;
        }
        return $title . ' ' . $this->icon($icon);
    }

    public function simNao($id) {
        $r = [
            0 => ['text' => __('Não'), 'class' => 'danger'],
            1 => ['text' => __('Sim'), 'class' => 'success'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function tzd($id) {
        $r = [
            '-01:00' => ['text' => '-01:00', 'class' => 'defautl'],
            '-02:00' => ['text' => '-02:00 (Fernando de Noranha)', 'class' => 'defautl'],
            '-03:00' => ['text' => '-03:00 (Brasília)', 'class' => 'defautl'],
            '-04:00' => ['text' => '-04:00 (Manaus)', 'class' => 'defautl'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function moeda($value, $options = []) {
        $currency = [
            'before' => 'R$ ',
            'zero' => '0,00',
            'places' => '2',
            'precision' => '2',
            'locale' => 'pt_BR',
        ];
        $currency = \Cake\Utility\Hash::merge($currency, $options);
        return $this->Number->format($value, $currency);
    }

    public function juros($value, $options = []) {
        $currency = [
            'before' => '',
            'after' => '%',
            'zero' => '0,0000',
            'places' => '4',
            'precision' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'locale' => 'pt_BR',
        ];
        $currency = \Cake\Utility\Hash::merge($currency, $options);
        return $this->Number->format($value, $currency);
    }

    public function quantidade($value, $options = []) {
        $currency = [
            'before' => '',
            'after' => '',
            'zero' => '0,000',
            'places' => '3',
            'precision' => \Cake\Core\Configure::read('Parametros.NCasasDecimais'),
            'locale' => 'pt_BR',
        ];
        $currency = \Cake\Utility\Hash::merge($currency, $options);
        return $this->Number->format($value, $currency);
    }

    public function mask($val, $mask) {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public function cpfCnpj($str) {
        $str = str_replace([' ', '.', '-', '/'], '', $str);
        if (strlen($str) == 14) {
            return $this->mask($str, '##.###.###/####-##');
        } else if (strlen($str) == 11) {
            return $this->mask($str, '###.###.###-##');
        }
        return $str;
    }

    /**
     * Mostrar uma data em tempo
     *
     * @param integer $dataHora Data e hora em timestamp, dd/mm/YYYY ou null para atual
     * @param string $limite null, caso não haja expiração ou então, forneça um tempo usando o formato inglês para strtotime: Ex: 1 year
     * @return string Descrição da data em tempo ex.: a 1 minuto, a 1 semana
     * @access public
     */
    public function tempo($dataHora = null, $limite = '30 days') {
        $datetime1 = new \DateTime($dataHora);
        $datetime2 = new \DateTime(date('YmdHis'));
        $interval = $datetime1->diff($datetime2);

        if ($interval->y > 0) {
            return 'mais de 1 ano';
        } else if ($interval->m > 0) {
            return 'mais de 1 mês';
        } else if ($interval->d > 0) {
            return 'mais de 1 dia';
        } else {
            return $interval->h . ($interval->h > 1 ? 'horas' : 'hora') . ' ' . $interval->i . ($interval->i > 1 ? 'minutos' : 'minuto') . ' e ' . $interval->s . ($interval->s > 1 ? 'segundos' : 'segundo');
        }
    }

    public function listaMenus() {
        $sql = 'SELECT 
                    Menu.titulo,
                    Menu.plugin,
                    Menu.controller,
                    Menu.action,
                    Menu.grupos,
                    Menu.sub_grupos,
                    Menu.icone,
                    Menu.parametros
                FROM
                    menus AS Menu
                        INNER JOIN
                    menus_grupos AS MenusGrupo ON MenusGrupo.menu_id = Menu.id
                        INNER JOIN
                    usuarios_grupos AS UsuariosGrupo ON UsuariosGrupo.grupo_id = MenusGrupo.grupo_id
                WHERE
                    UsuariosGrupo.usuario_id = ' . $this->request->session()->read('Auth.User.id') . '
                        AND Menu.status = 1
                        AND Menu.root ' . ($this->request->session()->read('Auth.User.root') == 1 ? 'IN(0,1)' : '= 0') . '
                        AND Menu.item_menu = 1
                GROUP BY Menu.id ORDER BY Menu.ordem ASC, Menu.grupos ASC, Menu.titulo ASC';

        if (!$this->request->session()->read('kiterpMenus')) {
            $menus = \Cake\Datasource\ConnectionManager::get('default');
            $retorno = $menus->execute($sql)->fetchAll('assoc');
            $this->request->session()->write('kiterpMenus', $retorno);
            return $retorno;
        }
        return $this->request->session()->read('kiterpMenus');
    }

    public function linkPermissao($title, $url = null, array $options = []) {
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
        $sqlMd5 = md5($sql);
        if (empty($this->request->session()->read($sqlMd5))) {
            $menus = \Cake\Datasource\ConnectionManager::get('default');
            $r = $menus->execute($sql)->fetch('assoc');

            $this->request->session()->write($sqlMd5, $r['total']);
            if ($r['total'] > 0) {
                return $this->link($title, $url, $options);
            }
        } else {
            if ($this->request->session()->read($sqlMd5) > 0) {
                return $this->link($title, $url, $options);
            }
        }
        return null;
    }

    public function jsonToLista($dados, $dias = 0) {
        if ($dias === 0) {
            return null;
        }
        if (trim($dados) == '') {
            return null;
        }
        $dados = json_decode($dados, true);
        $lista = [];
        foreach ($dados as $key => $value) {
            $lista[] = '<li>Taxa ' . ($key + 1) . ': ' . $this->juros($value) . '</li>';
        }
        return '<ul class="list-unstyled">' . implode('', $lista) . '</ul>';
    }

    public function tiposPagamentos() {
        return [
            1 => 'Dinheiro',
            2 => 'Cheque',
            3 => 'Cartão',
            4 => 'Prazo'
        ];
    }

    public function pagamentos($id) {
        $r = $this->tiposPagamentos();
        return $r[$id];
    }

    public function pessoasAssociacoes($tipo_associacao = 1) {
        $pessoasAssociacoes = \Cake\ORM\TableRegistry::get('PessoasAssociacoes');

        $find = $pessoasAssociacoes->find()->where(['tipo_associacao' => $tipo_associacao])->contain(['Pessoas' => function($q) {
                        return $q->order(['nome' => 'asc']);
                    }])->all();
                $_empresas = [];
                if (!empty($find)) {
                    foreach ($find as $key => $value) {
                        $_empresas[$value->pessoa->id] = $value->pessoa->nome;
                    }
                }
                return $_empresas;
            }

        }
        