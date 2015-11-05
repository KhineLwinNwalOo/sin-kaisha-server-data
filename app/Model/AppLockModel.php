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
abstract class AppLockModel extends AppModel {
	
	/**
	 * データロック用のsql発行
	 * 
	 * @param int or string $id
	 * @param Model $model
	 * @return boolean
	 */
	final public function rowDataLock($id) {
		$model	= $this;
		$pKey	= $model->primaryKey;
		$options = array(
			'fields' => array($pKey),
			'recursive' => -1,
			'conditions' => array(
				$pKey => $id,
				'1=1 FOR UPDATE',
			),
		);
		$result = $model->find('all', $options);
		if (empty($result)) {
			$message = 'Data Lock Model Data Not Exist';
			throw new ErrorException($message);
		}
 	}
	/**/
}