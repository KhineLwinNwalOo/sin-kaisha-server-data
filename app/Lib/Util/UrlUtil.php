<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UrlUtil
 *
 * @author hanai
 */
class UrlUtil {
	
	/**
	 * ログイン
	 * @return array
	 */
	public static function getLogin() {
		return array(
			'controller'	=> 'Mains',
			'action'		=> 'login',
		);
	}

	/**
	 * ログアウト
	 * @return array
	 */
	public static function getLogout() {
		return array(
			'controller'	=> 'Mains',
			'action'		=> 'logout',
		);
	}

	/**
	 * メニュ
	 * @return array
	 */
	
	/**
	 * メンバ作成
	 * @return array
	 */
	public static function getCategoriesCreate() {
		return array(
			'controller'	=> 'CategoriesCreates',
			'action'		=> 'index',
		);
	}
	
        public static function getCategoriesSearch() {
		return array(
			'controller'	=> 'CategoriesSearchs',
			'action'		=> 'index',
		);
	}
	public static function getCategoriesEditButtom() {
		return array(
			'controller'	=> 'CategoriesEdits',
			'action'		=> 'index',
		);
	}
	public static function getCategoriesDetail($tbl_big_category_id){
		return array(
			'controller'	=> 'CategoriesCreates',
			'action'		=> 'index',
			$tbl_big_category_id,
		);
	}
        public static function getCategoriesEdit($id){
		return array(
			'controller'	=> 'CategoriesEdits',
			'action'		=> 'index',
			$id,
		);
	}
        
        public static function getCategoriesDelete($tbl_big_category_id,$tbl_mid_category_id,$tbl_min_category_id){
		return array(
			'controller'	=> 'CategoriesCreates',
			'action'		=> 'index',
			$tbl_big_category_id,$tbl_mid_category_id,$tbl_min_category_id
		);
	}
	
	
}