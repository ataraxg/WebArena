<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

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

    public function signUp($email, $password) {
        
        if ($this->exists($email)) {

            $newPlayer = array(
                'Player' => array(
                    'email' => $email,
                    'password' => $password,
                )
            );

            $this->save($newPlayer);
        }
    }

    public function Login($email, $password) {
        
    }

    public function exists($id = null) {
        parent::exists($id);
    }

}
