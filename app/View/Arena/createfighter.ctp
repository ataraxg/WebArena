<html>
    <p> Create your character !! </p>
   
    <?php
        echo $this->Form->create('createFighter');
        echo $this->Form->input('nom');
        echo $this->Form->end('Create');
    ?>
</html>