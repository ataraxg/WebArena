<html>
   
    <?php echo $this->Form->create('Connection'); ?>

    <div class="row">
        <div class="large-4" style="margin: auto; padding-top: 2em;">
            <?php echo $this->Form->input('username');?>
        </div>
        <div class="large-4" style="margin: auto;">
            <?php echo $this->Form->input('password');?>
        </div>
    </div>
    
    <?php $login = array('label' => 'Login', 'class' => 'small button');?>
    
    <div class="row">
        <div class="large-3 columns">
            <a href="#" data-reveal-id="myModal">Sign up !</a> 
        </div>
        <div class="large-3 columns">
            <?php echo $this->Form->end($login);?>
        </div>
    </div>
    
    <!-- FINIR LA CONFIGURATION DE FOUNDATION POUR LE JS-->

    <div id="myModal" class="reveal-modal" data-reveal> 
        <?php
            echo $this->Form->create('Registration');

            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');

            echo $this->Form->end('Register now !');
        ?>
    </div>
    
</html>