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

    public function statusLance($id) {
        $r = [
            0 => ['text' => __('Não aceito'), 'class' => 'danger'],
            1 => ['text' => __('Agardando aceitação'), 'class' => 'info'],
            2 => ['text' => __('Aceito'), 'class' => 'success'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function status($id) {
        $r = [
            0 => ['text' => __('Inativo'), 'class' => 'danger'],
            1 => ['text' => __('Ativo'), 'class' => 'info'],
            9 => ['text' => __('Excluido'), 'class' => 'success'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function statusTipoUser($id) {
        $r = [
            0 => ['text' => __('Administrador'), 'class' => 'primary'],
            1 => ['text' => __('Cliente'), 'class' => 'info'],
            2 => ['text' => __('Fornecedor'), 'class' => 'success'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class']);
    }

    public function statusPagSeguro($id) {
        $r = [
            1 => ['text' => __('Aguardando pagamento'), 'title' => 'O comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.', 'class' => 'default'],
            2 => ['text' => __('Em análise'), 'title' => 'O comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.', 'class' => 'info'],
            3 => ['text' => __('Paga'), 'title' => 'A transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.', 'class' => 'success'],
            4 => ['text' => __('Disponível'), 'title' => 'A transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.', 'class' => 'success'],
            5 => ['text' => __('Em disputa'), 'title' => 'O comprador, dentro do prazo de liberação da transação, abriu uma disputa.', 'class' => 'warning'],
            6 => ['text' => __('Devolvida'), 'title' => 'O valor da transação foi devolvido para o comprador.', 'class' => 'danger'],
            7 => ['text' => __('Cancelada'), 'title' => 'A transação foi cancelada sem ter sido finalizada.', 'class' => 'danger'],
            8 => ['text' => __('Chargeback debitado'), 'title' => 'O valor da transação foi devolvido para o comprador.', 'class' => 'danger'],
            9 => ['text' => __('Em contestação'), 'title' => 'O comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito.', 'class' => 'warning'],
        ];
        return $this->label($r[$id]['text'], $r[$id]['class'], ['title' => $r[$id]['title']]);
    }

    public function link($title, $url = null, array $options = array()) {

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

    public function data($data) {
        return date('d/m/Y', strtotime($data));
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

    public function porcentagem($value, $options = []) {
        $currency = [
            'before' => '',
            'after' => '%',
            'zero' => '00',
            'places' => '2',
            'precision' => '3',
            'locale' => 'pt_BR',
        ];
        $currency = \Cake\Utility\Hash::merge($currency, $options);
        return $this->Number->format($value, $currency);
    }

    public function dataHora($data) {
        return date('d/m/Y H:i:s', strtotime($data));
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
        $str = str_replace(array(' ', '.', '-', '/'), '', $str);
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

}
