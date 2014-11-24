<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Player extends AppModel {

    public $displayField = 'email';
    public $hasmany = array(
        'Fighter' => array(
            'className' => 'Fighter',
            'foreignKey' => 'id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    public $name = 'Player';
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'an email is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ''
            )
        )
    );
    
    public function accountExist($email){
        $data =  $this->find('first',array('conditions'=>array('email'=>$email)));
        if($data != null)
            return true ;
            else 
                return false;
        
    }

    public function createNew($email, $password) {

        if (!$this->accountExist($email)) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            

            $newPlayer = array(
                'Player' => array(
                    'email' => $email,
                    'password' =>  $passwordHasher->hash(
                $password
            ),
                )
            );

            $this->save($newPlayer);
            return true;
        }
        return false;
    }

    public function checklogin($email, $pw) {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $pw= $passwordHasher->hash(
                $pw);
        if ($this->accountExist($email)) {     // si l email existe 
            $temp = $this->find('first', array(
                'conditions' => array('Player.email' => $email)));

            if ($pw == $temp['Player']['password']) {  // verifier le mdp correspondant
                CakeSession::start();
                   CakeSession::write('name',$temp['Player']['id']);
                   CakeSession::write('Fighter',null);
                return true;
            }
        }
    }

}
