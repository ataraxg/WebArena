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
    
   <div>
    <h1>GAME PANEL</h1>
    <div id="gamePanel" class="panel">
        
        <table border=1 class="gameTable">
            <?php
                $raws=10;
                $colums=15;
                for ($i=$raws;$i>=0; $i--){
                    echo '<tr class="sizeCell">';
                    for ($j=0;$j<$colums; $j++){
                        echo '<td class="sizeCell">&nbsp;';
                        echo '('.$j.'.'.$i.')';
                        echo "<br>";
                        foreach($raw as $fighter)
                        {
                            if(($fighter['Fighter']['coordinate_x'] == $j) && ($fighter['Fighter']['coordinate_y'] == $i))
                            {
                                //echo $this->Html->image("game/perso_front.png", array('fullBase' => true));
                                echo $fighter['Fighter']['name'];
                            }
                        }
                        echo "</td>";
                    }
                   echo '</tr>';
                }
            ?>
        </table>
        <div class="slides">
          
    <?php echo $this->element('Characsliders')?>
    </div>
        <div class="clearfix"></div>
    </div>
</div>
    
    <?php pr($raw); ?>

</html>