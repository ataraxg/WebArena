<html>
   
    <?php echo $this->Form->create('Connection'); ?>

    <div class="row">
        <div class="large-4" style="margin: auto; padding-top: 2em;">
            <?php echo $this->Form->input('email');?>
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
            
            echo $this->Form->input('email');
            echo $this->Form->input('password');

            echo $this->Form->end('Register now !');
        ?>
    </div>
    
<script>
hello.on('auth.login', function(r){
	// Get Profile
	hello( r.network ).api( '/me' ).then( function(p){
		var label = document.getElementById(r.network)
		label.innerHTML = "<img src='"+ p.thumbnail + "' width=24/>Connected to "+ r.network+" as " + p.name;
	});
});
hello.init({
	google : CLIENT_IDS.google,
	windows : CLIENT_IDS.windows,
	facebook : CLIENT_IDS.facebook
},{
	scope : 'email',
	redirect_uri:'../redirect.html'
});
</script>
    
</html>