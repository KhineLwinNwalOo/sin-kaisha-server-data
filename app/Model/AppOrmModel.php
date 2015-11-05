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

App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
abstract class AppOrmModel extends AppModel {
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		
		$ormModel		= $this;
		$name			= $ormModel->name;
		$alias			= $ormModel->alias;
		$virtualFields	= $ormModel->virtualFields;
		if ($alias !== $name) {
			$ormModel->virtualFields = preg_replace('/' . $name . '/' , $alias, $virtualFields);
		}
	}	
	
	/**
	 * BelongsTo連係データの存在チェック
	 * 
	 * @param mix $check
	 * @param string $modelName
	 * @return boolean
	 */
	public function checkBelongsToData($check, $modelName) {
		$model = $this;
		$btModel = $model->{$modelName};
		$check = is_array($check)? array_shift($check): $check;
		$tmpRecursive = $btModel->recursive;
		$btModel->recursive = -1;
		$result = $btModel->read(array($btModel->primaryKey), $check);
		$btModel->recursive = $tmpRecursive;
		return empty($result)? false: true;
	}
	
	/**
	 * 動的なBelongsTo連係データの存在チェック
	 * 
	 * @param mix $check
	 * @param string $dynamicField
	 * @param array $listDynamicModels
	 */
	public function checkDynamicBelongsToData($check, $dynamicField, array $listDynamicModels) {
		$model = $this;
		$modelKey	= $model->data[$model->alias][$dynamicField];
		$modelName	= $listDynamicModels[$modelKey];
		return $model->checkBelongsToData($check, $modelName);
	}
	
	/**
	 * 更新確認用バリデーション
	 * 
	 */
	public function edited($check) {
		$model = $this;
		$alias		= $model->alias;
		$primaryKey	= $model->primaryKey;
		$id = $model->data[$alias][$primaryKey];
		$check = is_array($check)? array_shift($check): $check;
		$recursive = $model->recursive;
		$model->recursive = -1;
		$result = $model->read(array('updated'), $id);
		$model->recursive = $recursive;
		return $result[$alias]['updated'] === $check;
	}
	/**/
}