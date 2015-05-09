
<?php // echo $instance[ 'homepage' ]; ?>

<?php // if ( ( 1 == $instance[ 'homepage' ] && is_home() ) || 1 !== $instance[ 'homepage' ] ) : ?>
<?php // if ( ( 1 == $instance[ 'homepage' ] && is_home() ) ) : ?>
<?php if ( 1 != $instance[ 'homepage' ] || ( 1 == $instance[ 'homepage' ] && is_home() ) ) : ?>

		
<?php echo $args['before_widget']; ?>
	<h1 class="widget-title">Front to Back</h1>

	<div class="widget-image">
		<img src="http://lorempixel.com/100/50/nature" alt="">
	</div>

	<?php if ( 'above' == $instance['position']) : ?>

		<p class="front-to-back-name">
			<h3><?php echo $instance['name']; ?></h3>
		</p>
		<p class="front-to-back-name">
			<?php echo $instance['bio']; ?>
		</p>

	<?php else : ?>

		<p class="front-to-back-name">
			<?php echo $instance['bio']; ?>
		</p>
		<p class="front-to-back-name">
			<h3><?php echo $instance['name']; ?></h3>
		</p>
		
	<?php endif; ?>
<?php echo $args['after_widget']; ?>

<?php endif; ?>