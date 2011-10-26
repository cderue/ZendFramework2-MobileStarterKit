<?php

namespace Application\Adapter;

use Zend\Authentication\Adapter as AuthenticationAdapter,
	Zend\Authentication\Result as AuthenticationResult;

class CustomAuthenticationAdapter implements AuthenticationAdapter
{
	protected $login;
	protected $paswword;
	
	public function __construct($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
	
	public function authenticate()
	{
		$result = array(
            'code'  => AuthenticationResult::FAILURE,
            'identity' => array(
                'login' => $this->login,
            ),
            'messages' => array(),
        );
			
		if ($this->login === 'zend' && $this->password === 'zend') {
			 $result['code'] = AuthenticationResult::SUCCESS;
		} else {
			$result['code'] = AuthenticationResult::FAILURE_CREDENTIAL_INVALID;
			$result['messages'][] = 'Identifiant ou mot de passe incorrect';
		}
		
		return new AuthenticationResult($result['code'], $result['identity'], $result['messages']);
	}
}