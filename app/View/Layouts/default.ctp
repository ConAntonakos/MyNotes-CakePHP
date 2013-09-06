<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


?>

<?php echo $this->Html->docType('html5'); ?> 
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

			echo $this->Html->css('bootstrap');

			echo $this->fetch('css');
			
			echo $this->Html->script('jquery');
			echo $this->Html->script('notes');
			
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
				<?php echo $this->element('menu/top_menu'); ?>
			</div><!-- #header .container -->

			<div id="layout-flash-message">
				<?php echo $this->Session->flash(); ?>
			</div>
			
			<div id="content-container">
				<div id="blocks-container">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div><!-- #header .container -->
			
			<div id="footer">
			</div> <!-- #footer .container -->
			
		</div><!-- #main-container -->
	
		<?php echo $this->Js->writeBuffer(); ?>
	</body>

</html>