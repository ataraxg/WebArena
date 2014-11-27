<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ArenaController extends AppController
{
    public $uses = array('Player', 'Fighter', 'Event');
    
    public function beforeFilter(){
        if (!
                CakeSession::check('name')){
            
            $this->redirect(array("controller"=>"Players",
                            "action"=>"login"));
        }
        
    }    
    
    
    
    
    /**
     * index method : first page
     *
     * @return void
     */
    
    public function index()
    {
        $this->set('myname', "Antoine G");
    }
    
    public function logout()
    {
        CakeSession::destroy();
        $this->redirect(array("controller"=>"Players",
                            "action"=>"login"));
        
        
    }    
    public function character()
    {
        if ($this->request->is('post')) {
            if(isset($this->request->data['NewLevel'])) {
                $this->Fighter->level_up(1, $this->request->data['NewLevel']['improve']);
            }
        }
        
        $this->set('strength', $this->Fighter->get_carac(1, 'skill_strength'));
        $this->set('health', $this->Fighter->get_carac(1, 'skill_health'));
        $this->set('sight', $this->Fighter->get_carac(1, 'skill_sight'));
        $this->set('exp', $this->Fighter->get_carac(1, 'xp'));
        $this->set('lvl', $this->Fighter->get_carac(1, 'level'));
        
        
        $this->set('raw',$this->Fighter->findById(1));
    }
    
    public function createfighter() {
        if ($this->request->is('post')){
            if(isset($this->request->data['createFighter'])){
                $this->Fighter->createCharacter($this->request->data['createFighter']['nom']); 
               
            }
        }
    }
    
    public function sight()
    {
        
        if ($this->request->is('post')) {
            if(isset($this->request->data['Fightermove'])) {
                $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
            }
            
         if(isset($this->request->data['FighterAttack'])) {
                $this->Fighter->doAttack(1, $this->request->data['FighterAttack']['direction']);
         }
        }
        
        //$this->set('raw', $this->Fighter->find('all'));
        $this->set('xraw', $this->Fighter->find('all',array('conditions'=>array(Player_id => CakeSession::read('name')),'fields'=> name)));

    }
    
    public function diary() 
    {
        $this->set('raw',$this->Event->find());
        
        $a = array(
            "11/10/14" => "Took the stairway to heaven",
            "11/09/14" => "Ate a potato",
            "11/07/14" => "Drank a shot o' rhum"
            );
        
        $this->set('arr', $a);
    }
}
?>