<?php
App::uses('AppController', 'Controller');
App::uses('UrlUtil', 'Lib/Util');
/**
 * CategoriesSearchs Controller
 *
 * @property CategoriesSearch $CategoriesSearch
 * @property PaginatorComponent $Paginator
 */
class CategoriesEditsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function index($content_id){
            $ctl		= $this;
            $model		= $ctl->CategoriesEdit;
            $session	= $ctl->Session;
            $request	= $ctl->request;
			$sessionKey = $model->getSessionKey($content_id);
			

			$model->setEditDataToRequest( $request, $content_id);
			$model->setRequestToSessionData($session, $request, $sessionKey);
			$model->setInputFormParams();
			$model->setSessionToRequestData($request, $session, $sessionKey);
        }

        public function beforeFilter() {
        // Authコンポーネントの設定
        //self::_authSetting($this->Auth);
        $this->Auth->allow();
        return parent::beforeFilter();
        }

}
