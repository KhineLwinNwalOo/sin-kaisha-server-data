<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppCtlHelper', 'View/Helper');
App::uses('UrlUtil', 'Lib/Util');

/**
 * Description of MainHelper
 *
 * @author hanai
 */
class MainHelper extends AppCtlHelper {
	
    /**
     * フォーム開始
     * @return string
     */
    public function getFormStart() {
        $form       = $this->ExtForm;
        $alias      = 'TblUser';
        $options    = array();
        return $form->create($alias, $options);
    }

    /**
     * メールアドレス
     * @return string
     */
    public function getInputUserMail() {
        $form       = $this->ExtForm;
        $field      = 'user_mail';
        $options    = array(
                    'type'	=> 'text',
                    'label'	=> false,
                    'div'	=> false,
                    'refer'	=> false,
        );
        return $form->input($field, $options);
    }

    /**
     * パスワード
     * @return string
     */
    public function getInputPassword() {
        $form       = $this->ExtForm;
        $field      = 'password';
        $options    = array(
                    'type'	=> 'password',
                    'label'	=> false,
                    'div'	=> false,
                    'refer'	=> false,
                    'value'	=> '',
        );
        return $form->input($field, $options);
    }

    /**
     * ログインボタン
     * @param string $caption
     * @return string
     */
    public function getSubmitLogin() {
        $form		= $this->ExtForm;
        $caption	= 'ログイン';
        $options	= array(
                'div'	=> false,
        );
        return $form->submit($caption, $options);
    }
    public function getLinkLogout() {
		$html		= $this->Html;
		$title		= __('ログアウト');
		$url		= UrlUtil::getLogout();
		$options	= array();
		return $html->link($title, $url, $options);
    }
    /**
     * フォーム終了
     * @return string
     */
    public function getFormEnd() {
        $form   = $this->ExtForm;
        return $form->end();
    }
	
	/**
	 * メンバ登録リンク
	 * @return string
	 */
	public function getLinkUserCreate() {
		$html		= $this->Html;
		$title		= __('新規メンバ登録');
		$url		= UrlUtil::getCustomerRegistrationsIndex();
		$options	= array();
		return $html->link($title, $url, $options);
	}
	
	/**
	 * メンバ検索リンク
	 * @return string
	 */
	public function getLinkUserSearch() {
		$html		= $this->Html;
		$title		= __('メンバ情報検索');
		$url		= UrlUtil::getUserSearch();
		$options	= array();
		return $html->link($title, $url, $options);
	}
}