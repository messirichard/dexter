<?php
/**
 * AuthFilter class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package auth.components
 */

/**
 * Filter that automatically checks if the user has access to the current controller action.
 */
class AuthFilter extends CFilter
{
	/**
	 * @var array name-value pairs that would be passed to business rules associated
	 * with the tasks and roles assigned to the user.
	 */
	public $params = array();

	/**
	 * Performs the pre-action filtering.
	 * @param CFilterChain $filterChain the filter chain that the filter is on.
	 * @return boolean whether the filtering process should continue and the action should be executed.
	 * @throws CHttpException if the user is denied access.
	 */
	protected function preFilter($filterChain)
	{
		$itemName = '';
		$controller = $filterChain->controller;

		$akses = User::model()->getUserAccess();

		/* @var $user CWebUser */
		$user = Yii::app()->getUser();

		if ($user->isGuest)
			$user->loginRequired();

		if (($module = $controller->getModule()) !== null)
		{
			$itemName .= $module->getId() . '.';
			if (isset($akses[$itemName.'*']))
				return true;
		}
		$itemName .= $controller->getId();
		$itemName = str_replace("/", ".", $itemName);

		if (isset($akses[$itemName.'.*']))
			return true;


		$itemName .= '.' . $controller->action->getId();
		if (isset($akses[$itemName]))
			return true;

		if ($akses == "All")
			return true;

		$session = new CHttpSession;
		$session->open();
		$login_admin = $session['login'];
		if ($login_admin['type'] == 'gerai') {
			if ($controller->getId() == 'order' AND $controller->action->getId() == 'create') {
				return true;
			}else{
				throw new CHttpException(401, 'Access denied.');				
			}
		}


		// echo array_search($controller->action->getId(), $this->params['actionAllowOnLogin']);
		// exit;

		if (is_array($this->params['actionAllowOnLogin'])) {
			if ( array_search($controller->action->getId(), $this->params['actionAllowOnLogin']) >= 0)
				return true;
		}

		throw new CHttpException(401, 'Access denied.');
	}
}
