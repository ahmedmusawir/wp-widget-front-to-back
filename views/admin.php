<div class="front-to-back">
	<div>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Your Name:', 'front_to_back' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
	</div>
	<div>
		<label for="<?php echo $this->get_field_id( 'bio' ); ?>"><?php _e( 'Your Bio:', 'front_to_back' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'bio' ); ?>" name="<?php echo $this->get_field_name( 'bio' ); ?>" type="text" rows="5" maxlenght="160"><?php echo esc_attr( $bio ); ?></textarea>
		<p class="description"><?php _e('You Have', 'front_to_back') ?>
			<span class="front-to-back-count">160</span>
			<?php _e(' characters remaining ...', 'front_to_back') ?>
		</p>
	</div>
	<div>
		<label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Your Bio:', 'front_to_back' ); ?></label> 
		<select class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" >
			<option value="above" <?php selected( selected( 'above', $instance['position'], true) ); ?> ><?php _e(' above the bio', 'front_to_back'); ?> </option>
			<option value="below" <?php selected( selected( 'below', $instance['position'], true) ); ?>><?php _e(' below the bio', 'front_to_back'); ?> </option>
		</select>
	</div>
	<br>
	<div>
		<label for="<?php echo $this->get_field_id( 'homepage' ); ?>"><?php _e( 'HomePage Only?', 'front_to_back' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'homepage' ); ?>" 
				name="<?php echo $this->get_field_name( 'homepage' ); ?>" 
				type="checkbox" value="1" <?php checked(1, $instance['homepage'], true ); ?> />
	</div>
	<br>
</div>
