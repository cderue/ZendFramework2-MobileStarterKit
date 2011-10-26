<?php

/**
* Formulaire de connexion
*/
class LoginForm extends BaseForm
{
 public function init()
  {
   // Ajoute un champ de type 'text' pour l'identifiant
    $this->addElement('text', 'login');
    $loginElement = $this->getElement('login');
    $loginElement->setLabel('Identifiant :');
    $loginElement->setAttrib('placeholder', 'Identifiant');
    $loginElement->setAttrib('required', 'required');
    $loginElement->setRequired();
    
   // Ajoute un champ de type 'password' pour le mot de passe
   $this->addElement('password', 'password');
   $passwordElement = $this->getElement('password');
   $passwordElement->setLabel('Mot de passe :');
   $passwordElement->setAttrib('placeholder', 'Mot de passe');
    $passwordElement->setAttrib('required', 'required');
    $passwordElement->setRequired();
    
    // Ajoute un bouton de type 'submit' pour l'envoi du formulaire
    $this->addElement('submit', 'sender');
    $submitElement = $this->getElement('sender');
    $submitElement->setAttrib('data-theme', 'b');
    $submitElement->setLabel('Connexion');
}
}