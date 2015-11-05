<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppCtlHelper', 'View/Helper');
App::uses('UrlUtil', 'Lib/Util');

/**
 * Description of ProjectAdminHelper
 *
 * @author hanai
 */
class ProjectHelper extends AppCtlHelper {
	
	const SYSTEM_NAME = 'sin-kaisha.jp';
	public function getUlMenuLinks() {
		$html	= $this->Html;
		
		
		$linkCategoriesCreate	= self::getLinkCategoriesCreate	($html);
		$linkLogout		= self::getLinkLogout		($html);
		
		$result = array(
			'<ul>',
				'<li>' . $linkCategoriesCreate	. '</li>',
				'<li>' . $linkLogout		. '</li>',
			'</ul>',
		);
		return join("\n", $result);
	}
	/**
	 * ログアウトリンク
	 * 
	 * @param HtmlHelper $html
	 * @return string
	 */
	private static function getLinkLogout(HtmlHelper $html) {
		$title		= __('Logout');
		$url		= UrlUtil::getLogout();
		$options	= array();
		
		return '<li>' . $html->link($title, $url, $options) . '</li>';
	}
       
        public function getLinkCategoriesCreate(HtmlHelper $html) {
		
		$title		= __('事業目的登録');
		$url		= UrlUtil::getCategoriesCreate();
		$options	= array();
		return '<li>' . $html->link($title, $url, $options) . '</li>';
	}
	
	public function setTitleForLayout($title_for_layout = '') {
		$this->title_for_layout = $title_for_layout;
	}
	public function getTextTitleName() {
		$title_for_layout	= $this->title_for_layout;
		$systemName			= self::SYSTEM_NAME;
		
		if (empty($title_for_layout)) {
			$titleName	= $systemName;
		} else {
			$titleName	= $systemName . '(' . $title_for_layout . ')';
		}
		return h($titleName);
	}
	
	/**
	 * システム名
	 * @return string
	 */
	public function getTextSystemName() {
		return h(self::SYSTEM_NAME);
	}
	
	/**
	 * コピーライト
	 * @return string
	 */
	public function getTextCopyright() {
		return h('© 2015 by MIDAS.');
	}
	
	public function getAuthSessionFlashMessage() {
		$session = $this->Session;
		$attrs = array(
			'element' => null,
		);
		$message = $session->flash('auth', $attrs);
		
		if (empty($message)) {
			return '';
		} else {
			return '<div class="message">' . h($message) . '</div>';
		}
	}
}