<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//on importe le css de foundation (version minimisée)
		echo $this->Html->css('foundation.min');
                echo $this->Html->css('View_arena');

		//ici on importe jQuery (donné par foundation) et le javascript du framework foundation
		echo $this->Html->script('vendor/jquery.js');
		echo $this->Html->script('vendor/fastclick.js');
		echo $this->Html->script('foundation.min.js');
                echo $this->Html->script('foundation/foundation.orbit.js');
                
		//balises de cakePHP qui ira placer ici des éventuels ajouts de scripts et de design qui vous mettrez dans vos pages
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>


	<?php 
		//ici on importe un élément (ie un fichier de contenu affiché qui servira à plusieurs endroits)
		//il se trouve dans app/Views/Elements
		echo $this->element('navigation_bar'); 
	?>
	<?php 
		// et un autre (séparé pour plus de clarté)
		echo $this->element('sub_navigation_text'); 
	?>

	<div id="container">
		<div id="content">
			<div class="panel">


			<?php //ici on affiche les messages flash (avant le contenu de la vue)
				echo $this->Session->flash(); 
			?>

			<?php
				// la ligne suivante affiche le contenu rendu de la page de vue.
				echo $this->fetch('content'); 
			?>

			</div>
		</div>

		<?php // en dessous d'ici, le footer, rien à signaler de particulier ?>
		<div id="footer">
			<div class='row'>
				<div class='large-12 columns'>
					<p> Auteur : Mubb - Année 2014 </p>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

	<?php //ce script qui suit sert à activer certains éléments de foundation dans les pages, mettez le sans vous en préoccuper plus que ça ?>
	<script>
	  $(document).foundation();
	</script>

</body>



</html>
