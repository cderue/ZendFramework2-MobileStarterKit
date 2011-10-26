<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
	Zend\Authentication\AuthenticationService,
	Zend\Authentication\Result as AuthenticationResult,
	Application\Adapter\CustomAuthenticationAdapter;

class UserController extends ActionController
{
    public function indexAction()
    {
        return array('user', 'zend');
    }
	
	public function loginAction()
	{
		if ($this->getRequest()->isPost()) {
			$auth = new AuthenticationService();
			$adapter = new CustomAuthenticationAdapter($_POST['login'], $_POST['password']);
			$result = $auth->authenticate($adapter);
			
			if ($result->getCode() ===  AuthenticationResult::SUCCESS) {
				$this->redirect()->toUrl('/user/index');
			} else{
				return array('error', 'La tentative de connexion a échouée.');
			}
		}
	}
	
	public function logoutAction()
	{
		$auth = new AuthenticationService();
		$auth->clearIdentity();
		$this->redirect()->toUrl('/index/index');
	}
}
