<html>

    <p>What would you like to do ?</p>

    <?php
        echo $this->Form->create('Fightermove');
        echo $this->Form->input('direction', array(
            'options' => array(
                'north'=>'north',
                'east'=>'east',
                'south'=>'south',
                'west'=>'west'
                ), 
            'default' => 'east')
        );
        echo $this->Form->end('Move');
        echo CakeSession::read('name');
        echo $this->Form->create('FighterAttack');
        echo $this->Form->input('direction', array(
            'options' => array(
                'north'=>'north',
                'east'=>'east',
                'south'=>'south',
                'west'=>'west'
                ), 
            'default' => 'east')
        );
        echo $this->Form->end('Attack');
    
    ?>
    
    <?php pr($raw); ?>
    <?php pr($xraw); ?>

</html>