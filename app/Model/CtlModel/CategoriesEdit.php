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
App::uses('OrmModelUtil', 'Lib/Util');
App::uses('CategoriesEditFromTblContent', 'Lib/Convert/TblContent');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class CategoriesEdit extends AppCtlModel {
	
	const TMP_REQUEST_SESSION_KEY = 'tmp.Request.CategoriesEdit';
	public $setInputFormFlag = false;
	const PAGINATE_ORM_NAME = 'TblContent';
	public $validate = array();
	public $fieldParams = array();
    public static $multipleFields = array();
	
	public function getSessionKey($content_id) {
		return static::TMP_REQUEST_SESSION_KEY . $content_id;
	}
	
	
	
	
	
	public function setEditDataToRequest(CakeRequest $request, $id) {
		$ctlModel	= $this;
		$ormModel	= ClassRegistry::init('TblContent');
		
		$ormData = self::findTblContent($ormModel, $id);
		if (empty($ormData)) {
			throw new BadRequestException();
		}
		$convert = new CategoriesEditFromTblContent($ctlModel, $ormModel);
		$convert->setOrmData($ormData);
		$ctlData = $convert->getCtlData();
		$request->data = $ctlData;
	}
	
	private static function findTblContent(TblContent $tblContents, $id) {
		$options = array(
			'conditions' => array(
				'TblContent.id' => $id,
				//'TblContent.tbl_mid_category_id' => $tbl_mid_category_id,
				//'TblContent.tbl_min_category_id' => $tbl_min_category_id,
			),
			'recursive' => 1,
		);
		return $tblContents->find('first', $options);
//		debug($tblContents->find('first', $options));
	}
	
//	public function setPaginateParams(CategoriesEditsController $ctl, CakeRequest $request) {
//		$paginateOrmName	= self::PAGINATE_ORM_NAME;
//
//		
//		$ctl->{$paginateOrmName} = ClassRegistry::init($paginateOrmName);
//		
//	}
//	public function getDataPaginate(CategoriesEditsController $ctl) {
//		$paginateOrmName = self::PAGINATE_ORM_NAME;
//		//debug($ctl->paginate($paginateOrmName));
//		return $ctl->paginate($paginateOrmName);
//	}
	
	public function setInputFormParams() {
		$ctlModel = $this;
		if ($ctlModel->setInputFormFlag === false) {
			
//			self::setInputFormBigCategoriesName									($ctlModel);
			self::setInputFormContentName									($ctlModel);
			self::setInputFormBigCatagoriesName									($ctlModel);
			self::setInputFormMidCatagoriesName									($ctlModel);
			self::setInputFormMinCatagoriesName									($ctlModel);
			//self::setInputFormMinCategoriesName									($ctlModel);
			//self::setInputFormTblGroup		($ctlModel);
            $ctlModel->setInputFormFlag = true;
		}
	}
	
	private static function setInputFormBigCatagoriesName(self $ctlModel) {
		$fieldName	= 'big_name';
		//$listModel	= ClassRegistry::init('TblBigCategory');
		//$list		= $listModel->find('list');
		// バリデーション設定
		$ctlModel->validate[$fieldName] = array(
			'notEmpty' => array(
				'rule'			=> array('notEmpty', ),
				'message'		=> 'E-Mailを入力して下さい',
			),
		);
		// 入力フォーム設定
		$ctlModel->fieldParams[$fieldName] = array(
			'type'			=> 'text',
			//'options'		=> $list,
			'required'		=> false,
			//'multiple'		=> true,
		);
	}
	private static function setInputFormMidCatagoriesName(self $ctlModel) {
		$fieldName	= 'mid_name';
		//$listModel	= ClassRegistry::init('TblBigCategory');
		//$list		= $listModel->find('list');
		// バリデーション設定
		$ctlModel->validate[$fieldName] = array(
			'notEmpty' => array(
				'rule'			=> array('notEmpty', ),
				'message'		=> 'E-Mailを入力して下さい',
			),
		);
		// 入力フォーム設定
		$ctlModel->fieldParams[$fieldName] = array(
			'type'			=> 'text',
			//'options'		=> $list,
			'required'		=> false,
			//'multiple'		=> true,
		);
	}
	private static function setInputFormMinCatagoriesName(self $ctlModel) {
		$fieldName	= 'min_name';
		//$listModel	= ClassRegistry::init('TblBigCategory');
		//$list		= $listModel->find('list');
		// バリデーション設定
		$ctlModel->validate[$fieldName] = array(
			'notEmpty' => array(
				'rule'			=> array('notEmpty', ),
				'message'		=> 'E-Mailを入力して下さい',
			),
		);
		// 入力フォーム設定
		$ctlModel->fieldParams[$fieldName] = array(
			'type'			=> 'text',
			//'options'		=> $list,
			'required'		=> false,
			//'multiple'		=> true,
		);
	}
	private static function setInputFormContentName(self $ctlModel) {
		$fieldName	= 'content';
		//$listModel	= ClassRegistry::init('TblBigCategory');
		//$list		= $listModel->find('list');
		// バリデーション設定
		$ctlModel->validate[$fieldName] = array(
			'notEmpty' => array(
				'rule'			=> array('notEmpty', ),
				'message'		=> 'E-Mailを入力して下さい',
			),
		);
		// 入力フォーム設定
		$ctlModel->fieldParams[$fieldName] = array(
			'type'			=> 'text',
			//'options'		=> $list,
			'required'		=> false,
			//'multiple'		=> true,
		);
	}
	
}
