<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppCtlModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class CategoriesSearch extends AppCtlModel {
	
	const PAGINATE_ORM_NAME			= 'TblContent';
//	
	const HABTM_ALIAS1				= 'TblBigCategory';
//	
//	const TMP_REQUEST_SESSION_KEY	= 'tmp.Request.CategoriesSearch';
	
	private $setInputFormFlag = false;
	
	public $validate = array();
	
	
	/**
	 * フォーム設定用のパラメータ
	 * @var type 
	 */
	public $fieldParams = array();
	
	
	public function setInputFormParams() {
		$ctlModel = $this;
		if ($ctlModel->setInputFormFlag === false) {
            self::setInputFormContentsBigName                                   ($ctlModel);
			self::setInputFormContentsMidName                                   ($ctlModel);
			self::setInputFormContentsMinName                                   ($ctlModel);
			self::setInputFormContents										    ($ctlModel);
			self::setInputFormContentsId										($ctlModel);
			self::setInputFormBigCategoriesId									($ctlModel);
			self::setInputFormSearchBigCategoriesName							($ctlModel);
			self::setInputFormSearchMidCategoriesName							($ctlModel);
			self::setInputFormSearchMinCategoriesName							($ctlModel);
			self::setInputFormSearchContent										($ctlModel);
//			self::setInputFormCategoriesAgeMax		($ctlModel);
//			self::setInputFormCategoriesBirthdayMin	($ctlModel);
//			self::setInputFormCategoriesBirthdayMax	($ctlModel);
//			self::setInputFormTblGroupCountMin	($ctlModel);
//			self::setInputFormTblGroupCountMax	($ctlModel);
			$ctlModel->setInputFormFlag = true;
		}
	}
	
    public function getBigCategory() {
		$ormModel = ClassRegistry::init('TblBigCategory');
       // debug(self::findListTblBigCategory($ormModel));
        return self::findListTblBigCategory($ormModel);
		
    }
	private static function findListTblBigCategory(TblBigCategory $ormModel) {
		
        $options = array(
            'sort' => array(
                'TblBigCategory.id' => 'DESC'
            ),
			'recursive' =>0,
        );
        return $ormModel->find('list');
    }
        
        private static function setInputFormBigCategoriesName(self $ctlModel) {
            $field = 'name';
			$ctlModel->fieldParams[$field] = array(
				'type'		=> 'text',
				'required'	=> false,
			);
		}
		private static function setInputFormContents(self $ctlModel){
			$field = 'content';
			$ctlModel->fieldParams[$field] = array(
				'type'		=> 'text',
				'required'	=> false,
			);
			
		}
		
		private static function setInputFormContentsId(self $ctlModel) {
                 $field = 'id';
		$ctlModel->fieldParams[$field] = array(
			'type'		=> 'text',
			'required'	=> false,
		); 
		}
		private static function setInputFormContentsBigName(self $ctlModel) {
                $field = 'name';
				$ctlModel->fieldParams[$field] = array(
					'type'		=> 'text',
					'required'	=> false,
				); 
		}
		private static function setInputFormContentsMidName(self $ctlModel) {
                $field = 'name';
				$ctlModel->fieldParams[$field] = array(
					'type'		=> 'text',
					'required'	=> false,
				); 
		}
		private static function setInputFormContentsMinName(self $ctlModel) {
                $field = 'name';
				$ctlModel->fieldParams[$field] = array(
					'type'		=> 'text',
					'required'	=> false,
				); 
		}
		
		
		private static function setInputFormBigCategoriesId(self $ctlModel) {
                 $field = 'id';
		$ctlModel->fieldParams[$field] = array(
			'type'		=> 'text',
			'required'	=> false,
		); 
		}

		
		private function setInputFormSearchBigCategoriesName(self $ctlModel) {
			$fieldName = 'name';
		// バリデーション設定
			$ctlModel->fieldParams[$fieldName] = array(
				'type'			=> 'text',
				'maxlength'		=> 50,
			//	'required'		=> true,
			);
		}
		private function setInputFormSearchMidCategoriesName(self $ctlModel) {
			$fieldName = 'name';
			$ctlModel->fieldParams[$fieldName] = array(
				'type'			=> 'text',
				'maxlength'		=> 50,
			//	'required'		=> true,
			);
		}
		private function setInputFormSearchMinCategoriesName(self $ctlModel) {
			$fieldName = 'name';

			$ctlModel->fieldParams[$fieldName] = array(
				'type'			=> 'text',
				'maxlength'		=> 50,
			//	'required'		=> true,
			);
		}
		private function setInputFormSearchContent(self $ctlModel) {
			$fieldName = 'name';
			$ctlModel->fieldParams[$fieldName] = array(
				'type'			=> 'text',
				'maxlength'		=> 50,
			//	'required'		=> true,
			);
		}
		
		public function setPaginateParams(CategoriesSearchsController $ctl, CakeRequest $request) {
		$paginateOrmName	= self::PAGINATE_ORM_NAME;
		$habtmAlias1		= self::HABTM_ALIAS1;
		
		$ctl->{$paginateOrmName} = ClassRegistry::init($paginateOrmName);
		$ctl->paginate = array(
			$paginateOrmName => array(
				'fields' => array(
					$paginateOrmName . '.id',
					$paginateOrmName . '.content',
					$paginateOrmName . '.tbl_big_category_id',
					$paginateOrmName . '.tbl_mid_category_id',
					$paginateOrmName . '.tbl_min_category_id',
					
					$paginateOrmName . '.created',
					$paginateOrmName . '.updated',
					$habtmAlias1.'.name',
					'TblMidCategory.name',
					'TblMinCategory.name',
				),
				'recursive'		=> 0,
				'limit'			=> 20,
				'conditions'	=> self::getConditions($request),
				
//				'joins' => array(
//						array(
//							'type'	=> 'LEFT',
//							'table' => 'tbl_big_categories',
//	//						'alias' => $habtmAlias1,
//							'conditions' => array($paginateOrmName . '.tbl_big_category_id = ' . $habtmAlias1 . '.id')
//						),
//								array(
//							'type'	=> 'LEFT',
//							'table' => 'tbl_mid_categories',
//						//	'alias' => 'TblMidCategory',
//							'conditions' => array($paginateOrmName . '.tbl_mid_category_id = ' . 'TblMidCategory' . '.id')
//						),
//								array(
//							'type'	=> 'LEFT',
//							'table' => 'tbl_min_categories',
//							//'alias' => 'TblMinCategory',
//							'conditions' => array($paginateOrmName . '.tbl_min_category_id = ' . 'TblMinCategory' . '.id')
//						),
//					)	
			),
		);
		//debug($ctl->paginate);
	}
	
//		public function getMiddleCategoryCount(){
//			$ormModel = ClassRegistry::init('TblBigCategory');
//			$ormmidModel = ClassRegistry::init('TblMidCategory');
//			self::findListTblBigCategory($ormModel);
//            $bigData = self::findListTblBigCategory($ormModel);
//			$midarray=array();
//			foreach ($bigData as $value => $label){  
//				$options = array(
//					'conditions'=>array('TblMidCategory.tbl_big_category_id'=>$value),	
//					'recursive' =>0,
//				);
//				// debug($ormmidModel->find('list',$options));
//				$midarray[]=count($ormmidModel->find('list',$options));
//				
//			//	debug($value);
//			}
//			 //debug($midarray);
//			return $midarray;
//		}
//		
//		public function getMiddleCategoryCountall(){
//			$ormmidModel = ClassRegistry::init('TblMidCategory');
//			 return $ormmidModel->find('count');
//		}
//
//		public function getMinCategoryCount(){
//			$ormModel = ClassRegistry::init('TblBigCategory');
//			$ormminModel = ClassRegistry::init('TblMinCategory');
//			self::findListTblBigCategory($ormModel);
//            $bigData = self::findListTblBigCategory($ormModel);
//			$minarray=array();
//			foreach ($bigData as $value => $label){  
//				 $options = array(
//					'conditions'=>array('TblMinCategory.tbl_big_category_id'=>$value),	 
//					'recursive' =>0,
//				);
//				$minarray[]=count($ormminModel->find('list',$options));
//			}
//			return $minarray;	
//		}
//		public function getMinCategoryCountall(){
//			$ormminModel = ClassRegistry::init('TblMinCategory');
//			 return $ormminModel->find('count');
//		}
//		
//		public function getContentCount(){
//			$ormModel = ClassRegistry::init('TblBigCategory');
//			$ormcontentModel = ClassRegistry::init('TblContent');
//			self::findListTblBigCategory($ormModel);
//            $bigData = self::findListTblBigCategory($ormModel);
//			$contentarray=array();
//			foreach ($bigData as $value => $label){  
//				 $options = array(
//					'conditions'=>array('TblContent.tbl_big_category_id'=>$value),	 
//					'recursive' =>0,
//				);
//				$contentarray[]=count($ormcontentModel->find('list',$options));
//			}
//			return $contentarray;
//		}
//		public function getContentCountall(){
//			$ormcontentModel = ClassRegistry::init('TblContent');
//			return $ormcontentModel->find('count');
//		}
//
//		private static function findListTblMidCategory(TblMidCategory $ormModel, $tbl_big_category_id) {
//			$options = array(
//				'conditions' => array(
//					'TblMidCategory.tbl_big_category_id' => $tbl_big_category_id,
//				),
//				'sort' => array(
//					'TblMidCategory.sort' => 'DESC'
//				),
//			);
//
//			return $ormModel->find('list', $options);
//		}
//        
//        private static function setInputFormCategoriesDelete(self $ctlModel) {
//                 $field = 'id';
//		$ctlModel->fieldParams[$field] = array(
//			'type'		=> 'text',
//			'required'	=> false,
//		);
//	}
//        private static function setInputFormCategoriesDetail(self $ctlModel) {
//                 $field = 'id';
//		$ctlModel->fieldParams[$field] = array(
//			'type'		=> 'text',
//			'required'	=> false,
//		);
//	}
//        private static function setInputFormCategoriesEdit(self $ctlModel) {
//                 $field = 'id';
//		$ctlModel->fieldParams[$field] = array(
//			'type'		=> 'text',
//			'required'	=> false,
//		);
//	}
        
    private static function getConditions(CakeRequest $request) {
		$std = new stdClass();
		$std->conditions = array();
//		self::setConditionTblGroupId		($std, $request);
		self::setConditionBigCategoryName		($std, $request);
//		self::setConditionMemberMail			($std, $request);
//		self::setConditionMemberAgeMin		($std, $request);
//		self::setConditionMemberAgeMax		($std, $request);
//		self::setConditionMemberBirthdayMin	($std, $request);
//		self::setConditionMemberBirthdayMax	($std, $request);
//		self::setConditionTblGroupCountMin	($std, $request);
//		self::setConditionTblGroupCountMax	($std, $request);
		return $std->conditions;
	}
	
	private static function setConditionBigCategoryName(stdClass $std, CakeRequest $request) {
		$paginateOrmName	= self::PAGINATE_ORM_NAME;
		$value = $request->data('CategoriesSearch.content');
		if (!empty($value)) {
			$fieldName = $paginateOrmName . '.content Like';
			$std->conditions[0]['or'][$fieldName] = '%' . $value . '%';
		}
	}
	
	
	
        public function getDataPaginate(CategoriesSearchsController $ctl) {
		$paginateOrmName = self::PAGINATE_ORM_NAME;
		//debug($ctl->paginate($paginateOrmName));
		return $ctl->paginate($paginateOrmName);
	}
        

}
