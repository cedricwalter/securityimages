<?php
/**
 * @version        SecurityImages
 * @package
 * @copyright    Copyright (C) 2004-2012 Cedric Walter. All rights reserved.
 * @copyright    www.cedricwalter.com / www.waltercedric.com
 *
 * @license        GNU/GPL, see LICENSE.php
 *
 * SecurityImages is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die;

jimport('joomla.form.formrule');
jimport('joomla.html.parameter');


class JFormRuleKeyCaptcha extends JFormRule
{
	public function test(&$element, $value, $group = null, &$input = null, &$form = null)
	{
        require_once(dirname(__FILE__).DS.'..'.DS.'include'.DS.'keycaptchalib.php');
		$params 	= new JParameter(JPluginHelper::getPlugin('system', 'securityimages')->params);
		$kc_o =  new SecurityImagesKeyCaptcha($params->get('keycaptcha_privateKey'), $params->get('keycaptcha_userId'));
		return $kc_o->check_result($_POST['capcode']);
	}
}