<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Database\Type;
use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\I18n\Number;


I18n::locale('pt_BR');
// Habilita o parseamento de datas localizadas
Type::build('date')->useLocaleParser()->setLocaleFormat('dd/M/yyyy');
Type::build('datetime')->useLocaleParser()->setLocaleFormat('dd/M/yyyy HH:ii:ss');
Type::build('timestamp')->useLocaleParser()->setLocaleFormat('dd/M/yyyy HH:ii:ss');

// Habilita o parseamento de decimal localizaddos
Type::build('decimal')->useLocaleParser();
Type::build('float')->useLocaleParser();


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = [
        'Html' => [
            'className' => 'MyHtml'
        ],
        'Form' => [
            'className' => 'MyForm'
        ],
        'Paginator' => [
            'className' => 'MyPaginator'
        ],
        'Modal' => [
            'className' => 'MyModal'
        ],
            //'MyForm'
    ];
    
    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('bt_consultar_acao', true);
        $this->set('bt_cadastrar_acao', true);
        $this->set('bt_excluir_acao', true);
    }

    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        if ($this->request->action === 'index') {
            $this->loadComponent('Search.Prg');
        }
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'index',
            ],
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login',
                'plugin' => null
            ],
            'logoutRedirect' => '/',
            'authorize' => ['controller'],
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => [
                        'className' => 'Default',
                    ],
                    'fields' => ['username' => 'username', 'password' => 'senha'],
                    'userModel' => 'Usuarios',
                    'scope' => [],
                ]
            ]
        ]);
    }

    public function isAuthorized($user) {
        return true;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        if (!is_null($this->Auth->user())) {
            $this->Auth->allow();
        } else {
            if ($this->request->params['controller'] != 'Usuarios') {
                $this->redirect(['plugin' => false, 'controller' => 'Usuarios', 'action' => 'login']);
            }
            $this->Auth->allow('login');
            //$this->Auth->allow();
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    protected function convertData($campo) {
        if (isset($this->request->query[$campo])) {
            $ex = explode('/', $this->request->query[$campo]);
            $this->request->query[$campo] = implode('-', array_reverse($ex));
        }
    }

    protected function removeMask($campo) {
        if (isset($this->request->query[$campo])) {
            $this->request->query[$campo] = trim(str_replace(['.', '-'], '', $this->request->query[$campo]));
        }
    }

}
