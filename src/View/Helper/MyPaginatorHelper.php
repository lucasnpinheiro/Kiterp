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

use Cake\Utility\Inflector;
use Bootstrap\View\Helper\BootstrapPaginatorHelper;

class MyPaginatorHelper extends BootstrapPaginatorHelper {

    public function __construct($view, $config = []) {
        $this->templates([
            'counterRange' => '{{start}} ' . __('of') . ' {{end}} ' . __('in total') . ' {{count}}',
            'counterPages' => '{{page}} ' . __('of') . ' {{pages}}',
        ]);

        parent::__construct($view, $config);
    }

    /**
     * Returns a counter string for the paged result set
     *
     * ### Options
     *
     * - `model` The model to use, defaults to PaginatorHelper::defaultModel();
     * - `format` The format string you want to use, defaults to 'pages' Which generates output like '1 of 5'
     *    set to 'range' to generate output like '1 - 3 of 13'. Can also be set to a custom string, containing
     *    the following placeholders `{{page}}`, `{{pages}}`, `{{current}}`, `{{count}}`, `{{model}}`, `{{start}}`, `{{end}}` and any
     *    custom content you would like.
     *
     * @param string|array $options Options for the counter string. See #options for list of keys.
     *   If string it will be used as format.
     * @return string Counter string.
     * @link http://book.cakephp.org/3.0/en/views/helpers/paginator.html#creating-a-page-counter
     */
    public function counter($options = []) {
        if (is_string($options)) {
            $options = ['format' => $options];
        }

        $default = [
            'model' => $this->defaultModel(),
            'format' => 'pages',
        ];

        $options = \Cake\Utility\Hash::merge($default, $options);

        $paging = $this->params($options['model']);
        if (!$paging['pageCount']) {
            $paging['pageCount'] = 1;
        }
        $start = 0;
        if ($paging['count'] >= 1) {
            $start = (($paging['page'] - 1) * $paging['perPage']) + 1;
        }
        $end = $start + $paging['perPage'] - 1;
        if ($paging['count'] < $end) {
            $end = $paging['count'];
        }

        switch ($options['format']) {
            case 'range':
            case 'pages':
                $template = 'counter' . ucfirst($options['format']);
                break;
            default:
                $template = 'counterCustom';
                $this->templater()->add([$template => $options['format']]);
        }
        $map = array_map([$this->Number, 'format'], [
            'page' => $paging['page'],
            'pages' => $paging['pageCount'],
            'current' => $paging['current'],
            'count' => $paging['count'],
            'start' => $start,
            'end' => $end
        ]);

        $map += [
            'model' => strtolower(Inflector::humanize(Inflector::tableize($options['model'])))
        ];
        return $this->templater()->format($template, $map);
    }

}
