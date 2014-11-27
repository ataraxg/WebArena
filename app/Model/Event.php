<?php


App::uses('AppModel', 'Model');

class Event extends AppModel {

    public $name = 'Event';

    

    
    public function CreateEvent($X, $Y) {
        App::uses('CakeTime', 'Utility');
        $date =new DateTime();
        $date_format=$date->format('Y-m-d H:i:s');
        echo $date_format;
        $newEvent = array(
                'name' => 'none',
                'date' => $date_format,
                'coordinate_x' => $X,
                'coordinate_y' => $Y
        );
        $this->save($newEvent) ;
        return $newEvent;
    }

    public function newEvent($Aname, $Bname, $action, $X, $Y) {
        $newEvent = $this->CreateEvent($X, $Y);
        switch ($action) {
            case 'Success':
                $name = $Aname . ' Attacked ' . $Bname . 'and touched him !';
                break;
            case 'Missed':
                $name = $Aname . 'Attacked ' . $Bname . 'and missed him !';
                break;
            case 'Kill':
                $name = $Aname . 'killed' . $Bname;
                break;
            case 'Moved':
                $name = $Aname . 'moved ...';
                break;
            case 'NewFighter':
                $name = $Aname . 'is ready to fight , welcome in the arena ';
                break;
            case 'lvlup':
                $name = $Aname . 'level up ! Congrats ';
                break;
        }
        $NewEvent['Event']['name'] = $name;
        $this->save($NewEvent);
        return true;
    }

    public function newPlayerEvent($email) {
        $newEvent = $this->CreateEvent(-1, -1);
        $name = 'A new player ( '.$email.' ) join the arena !';
        $NewEvent['Event']['name'] = $name;
        $this->save($NewEvent);
    }

}

?>