<?php
App::uses('AppController', 'Controller');
App::uses('UrlUtil', 'Lib/Util');
/**
 * CategoriesSearchs Controller
 *
 * @property CategoriesSearch $CategoriesSearch
 * @property PaginatorComponent $Paginator
 */
class CategoriesSearchsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function index(){
            $ctl		= $this;
            $model		= $ctl->CategoriesSearch;
            $session	= $ctl->Session;
            $request	= $ctl->request;
            
			/*C:\xampp\php\php.ini修正 (Normal)*/ 
			ini_set('post_max_size', '8M'); 
			ini_set('upload_max_filesize', '8M'); 
			ini_set('max_execution_time', 30); 
			ini_set('max_input_time', 60); 
			ini_set('memory_limit', '128M'); 
			/*C:\xampp\php\php.ini修正 (Normal)*/
			
            $model->setInputFormParams();
			
			if ($request->is('post')) {
				
				$model->setRequestToSessionData($session, $request);
			} else {
				$model->setSessionToRequestData($request, $session);
			}
			$model->setPaginateParams($ctl, $request);
			
            $dataPaginate						= $model->getDataPaginate($ctl);
			//$getMiddleCategorycount				= $model->getMiddleCategoryCount();
			//$getMiddleCategoryallcount			= $model->getMiddleCategoryCountall();
			//$getMinCategorycount				= $model->getMinCategoryCount();
			//$getMinCategoryallcount				= $model->getMinCategoryCountall();
			//$getContentcount					= $model->getContentCount();
			//$getContentallcount					= $model->getContentCountall();
            $ctl->set(compact('dataPaginate'
					
					
	//'getMiddleCategorycount','getMiddleCategoryallcount','getMinCategorycount','getMinCategoryallcount',
			//'getContentcount','getContentallcount'
			));
            
        }

        public function beforeFilter() {
        // Authコンポーネントの設定
        $this->Security->unlockedActions[] = 'index';
        $this->Auth->allow();
        return parent::beforeFilter();
        }

}
