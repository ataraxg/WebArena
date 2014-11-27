<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

    class Fighter extends AppModel {
        
        public $arena_length = 10;
        public $arena_width = 15;

        public $displayField = 'name';

        public $belongsTo = array(
            'Player' => array(
                'className' => 'Player',
                'foreignKey' => 'player_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
       );
        
        
    /**
     * function doMove
     * @todo check the limits of the arena
     * 
     */
    public function doMove($fighterId, $direction){
            
            $datas = $this->read(null, $fighterId);
            
            $free_cells = $this->verif_nearby_cell($datas);
            
            switch($direction) {
                case 'north':
                    if($free_cells['north'] == null)
                        $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] + 1);
                    else
                        echo "Cannot go north : cell occupied by ".$free_cells['north']['f']['name'];
                    break;
                
                case 'east':
                    if($free_cells['east'] == null)
                        $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] + 1);
                    else
                        echo "Cannot go east : cell occupied by ".$free_cells['east']['f']['name'];
                    break;
                
                case 'south':
                    if($free_cells['south'] == null)
                        $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] - 1);
                    else
                        echo "Cannot go south : cell occupied by ".$free_cells['south']['f']['name'];
                    break;
                
                case'west':
                    if($free_cells['west'] == null)
                        $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] - 1);
                    else
                        echo "Cannot go west : cell occupied by ".$free_cells['west']['f']['name'];
                    break;   
                
                default:
                    return false;
            }
            
            $this->save();
            return true;

        }
        
    public function doAttack($fighterId, $direction){
            
        $datas = $this->read(null, $fighterId);
        
        $free_cells = $this->verif_nearby_cell($datas);

        switch($direction) {
                case 'north':
                    if($free_cells['north'] == null)
                        echo "Cannot attack north : empty cell";
                    else {
                        $opponentID = $free_cells['north']['f']['id'];
                        $this->combat($opponentID, $datas);
                    }
                    break;
                
                case 'east':
                    if($free_cells['east'] == null)
                        echo "Cannot attack east : empty cell";
                    else {
                        $opponentID = $free_cells['east']['f']['id'];
                        $this->combat($opponentID, $datas);
                    }
                    break;
                
                case 'south':
                    if($free_cells['south'] == null)
                        echo "Cannot attack south : empty cell";
                    else {
                        $opponentID = $free_cells['south']['f']['id'];
                        $this->combat($opponentID, $datas);
                        
                    }
                    break;
                
                case'west':
                    if($free_cells['west'] == null)
                        echo "Cannot attack west : empty cell";
                    else {
                        $opponentID = $free_cells['west']['f']['id'];
                        $this->combat($opponentID, $datas);
                    }
                    break;   
                
                default:
                    return false;
            }
            
            $this->save();
            return true;

        }
        
    public function verif_nearby_cell(array $datas){
        $fighterArray = $this->query("SELECT * FROM fighters as f where f.id != '" . $datas['Fighter']['id'] . "';");
        
        $my_x = $datas['Fighter']['coordinate_x'];
        $my_y = $datas['Fighter']['coordinate_y'];
        
        $free_cells = array(
            "north" => null,
            "east" => null,
            "south" => null,
            "west" => null,
        );

        foreach($fighterArray as $fighter) {
            
        $f_x = $fighter['f']['coordinate_x'];
        $f_y = $fighter['f']['coordinate_y'];
            if($f_x==$my_x) {
                if($f_y == $my_y+1) {
                    $free_cells['north']=$fighter;
                }

                else if($f_y == $my_y-1) {
                    $free_cells['south']=$fighter;
                }
            }

            else if($f_y==$my_y) {
                if($f_x == $my_x+1){
                    $free_cells['east']=$fighter;
                }

                else if($f_x == $my_x-1) {
                    $free_cells['west']=$fighter;
                }
            }
        }
        
        return $free_cells;
    }
    
    public function level_up($fighterId, $carac) {
        
        $datas = $this->read(null, $fighterId);

        switch($carac) {
            case 'strength':
                $this->set('skill_strength', $datas['Fighter']['skill_strength']+1);
                break;
            
            case 'sight':
                $this->set('skill_sight', $datas['Fighter']['skill_sight']+1);
                break;
            
            case 'health':
                $this->set('skill_health', $datas['Fighter']['skill_health']+3);
                break;
            
            default:
                return false;
        }
        
        $this->set('current_health', $datas['Fighter']['skill_health']);
        $this->set('xp', $datas['Fighter']['xp']-4);
        $this->set('level', $datas['Fighter']['level']+1);        
        
        $this->save();
        return true;
    }
    
    public function get_carac($fighterId, $carac) {
        $datas = $this->read(null, $fighterId);

        switch($carac) {
            case 'skill_health':
                $carac_value = $datas['Fighter']['skill_health'];
                break;
                
            case 'skill_sight':
                $carac_value = $datas['Fighter']['skill_sight'];
                break;
            
            case 'skill_strength':
                $carac_value = $datas['Fighter']['skill_strength'];
                break;
            
            case 'xp':
                $carac_value = $datas['Fighter']['xp'];
                break;
            
            case 'level':
                $carac_value = $datas['Fighter']['level'];
                break;
            
            case 'current_health':
                $carac_value = $datas['Fighter']['current_health'];
                break;
            
            case 'coordinate_x':
                $carac_value = $datas['Fighter']['coordinate_x'];
                break;
            
            case 'coordinate_y':
                $carac_value = $datas['Fighter']['coordinate_y'];
                break;
            
            case 'name':
                $carac_value = $datas['Fighter']['name'];
                break;
            
            default:
                return -1;
        }
        
        return $carac_value;
    }
    
    public function combat($opponentID, $datas) {
        
        $opponent = $this->read(null, $opponentID);
        
        echo "Attacking player : ". $opponent['Fighter']['name']. "!";
        
        
//        $this->save($opponent);
        
        $random = rand(0,20);
        $attack = 10+$opponent['Fighter']['level']-$datas['Fighter']['level'];
        
        if($random > $attack) {
            echo $datas['Fighter']['name']. " attacked " .$opponent['Fighter']['name']. " and succeeded ! Dice : ".$random.", attack : ". $attack;
            $health_left = $opponent['Fighter']['current_health'] - $datas['Fighter']['skill_strength'];
            if(!$this->isDead($opponent, $health_left)) {
                
            }
            
            else {
                $this->isDead($opponent, $health_left);
            }
        }
        
        else {
            echo $datas['Fighter']['name']. " attacked " .$opponent['Fighter']['name']. " and failed ! Dice : ".$random.", attack : ". $attack;
            $this->save($opponent);
        }
    }
    
    public function isDead($fighter, $health_left) {
        if($health_left <= 0) {
            echo " ...The fighter ". $fighter['Fighter']['name']. " is dead !";
            $fighter = array('id' => $fighter['Fighter']['id'], 
                'current_health' => 0,
                'coordinate_x' => -1,
                'coordinate_y' => -1);
            $this->save($fighter);
            return true;
        }
        
        else 
            return false;
    }
    
    public function isFighterAlreadyInCase($coordinate_x,$coordinate_y){
		$fighterArray = $this->query("SELECT * FROM fighters");
		foreach($fighterArray as $fighter){
			$my_x = $fighter['fighters']['coordinate_x'];
			$my_y = $fighter['fighters']['coordinate_y'];
			if($my_x == $coordinate_x && $my_y == $coordinate_y){
				return true;
			}
		}
		return false;
	}
    
    public function createCharacter($name){
            $coordinate_x = rand(0,14);
            $coordinate_y = rand(0,10);	
			while($this->isFighterAlreadyInCase($coordinate_x,$coordinate_y)){
				$coordinate_x = rand(0,14);
				$coordinate_y = rand(0,10);				
			}
            $newFighter = array(
                            'Fighter' => array(
                                'name' => $name,
                                'coordinate_x' => $coordinate_x,
                                'coordinate_y' => $coordinate_y,
                                'level' => 0,
                                'xp' => 0,
                                'skill_sight' => 0,
                                'skill_strength' => 1,
                                'current_health' => 3
                                )
                            );
			
            $this->save($newFighter);
        }
        
       /* public function getFighter(){
            $temp=$this->find('all',array('conditions'=>array(Player_id => CakeSession::read('name'))));
            return $temp;
    }*/
        

}
    
    

?>