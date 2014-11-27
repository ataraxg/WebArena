<?php

App::uses('AppController', 'Controller');


class PlayersController extends AppController{
    public $uses = array('Player','Event');
    public $components = array('Openid'=> array('accept_google_apps' => true));

  public function signUp()
    {
        if ($this->request->is('post')){
            if(isset($this->request->data['Registration'])){
                $this->Player->createNew($this->request->data['Registration']['email'],$this->request->data['Registration']['password']);  
            }
        }
 
    }
    
    public function login() {
        
        if ($this->request->is('post')){
            if(isset($this->request->data['Registration'])){
                if($this->Player->createNew($this->request->data['Registration']['email'],$this->request->data['Registration']['password'])){
                 $this->Session->setflash('Sign Up Succeed !'); 
                 $this->Event->newPlayerEvent($this->request->data['Registration']['email']);
                 $this->redirect(array("controller"=>"Arena",
                            "action"=>"index"));
                }  
            else {
                $this->Session->setflash('An account with this email already exists !');
        }
            }
        }
    if ($this->request->is('post')) {
        if(isset($this->request->data['Connection'])){
               if($this->Player->checklogin($this->request->data['Connection']['email'],$this->request->data['Connection']['password'])){
                   
                   $this->Session->setflash("Welcome".$this->request->data['Connection']['email']);
                   
                   
               }
                   
            
        }
    }
    }
    
    
 

}