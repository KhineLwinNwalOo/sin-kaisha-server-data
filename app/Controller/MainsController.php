<?php
App::uses('AppController', 'Controller');
/**
 * Mains Controller
 *
 * @property Main $Main
 * @property PaginatorComponent $Paginator
 */
class MainsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');
       
        public function login(){
        $ctl		= $this;
		$auth		= $ctl->Auth;
		$request	= $ctl->request;
		$session	= $ctl->Session;
		
		// SSL接続を強制する
		//if (! $request->is('ssl')) {
		//	$url = SSH_BASE_URL . DS . $request->url;
		//	$ctl->redirect($url);
		//}
		
		// TODO sleep(1);
		if($request->is('post')) {
			if($auth->login()) {
				$ctl->redirect($auth->redirect());
				return;
			} else {
				// TODO sleep(3);
				//ログインNGなら
				$session->setFlash(__('Different email address or password'), null, null, 'auth');
			}
		}
		$ctl->layout = 'login';
        }
        public function index(){
            $ctl	= $this;
			$auth	= $ctl->Auth;
        }

        public function beforeFilter() {
        // Authコンポーネントの設定
        //self::_authSetting($this->Auth);
        $this->Auth->allow();
        return parent::beforeFilter();
        }
        
        public function logout() {
		$ctl		= $this;
		$session	= $ctl->Session;
		$auth		= $ctl->Auth;
		
		$auth->logout();
		$session->destroy();
		$session->setFlash(__('ログアウトしました'), null, null, 'auth');
		$ctl->redirect($ctl->Auth->logout());
	}
}
