<?php use UI\Form; ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="row">
			<div class="col-sm-offset-2 col-sm-10">
				<h2><?php echo __( ':action.topic' ); ?></h2>
			</div>
		</div>

	<!-- sing in form -->
	<?php echo Form::start( 'sign-in', array( 'method' => 'post', 'class' => 'form-horizontal' ) ); ?>

		<!-- identifier -->
		<div class="form-group">
			<?php echo Form::label( 'identifier', __( 'model/user.label.email' ) )->add_class( 'col-sm-2' ); ?>
			<div class="col-sm-10">
		  		<?php echo Form::input( 'identifier' )
		  			->placeholder( __( 'model/user.label.email' ) )
		  			->value( _e( $last_identifier ) ); ?>
			</div>
		</div>

		<!-- password -->
		<div class="form-group">
			<?php echo Form::label( 'password', __( 'model/user.label.password' ) )->add_class( 'col-sm-2' ); ?>
			<div class="col-sm-10">
		  		<?php echo Form::input( 'password', 'password' )->placeholder( __( 'model/user.label.password' ) ); ?>
			</div>
		</div>

		<!-- remember me -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php echo Form::checkbox( 'retain', __( 'model/user.label.retain' ), 1 ); ?>
			</div>
		</div>
		
		<!-- buttons -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary"><?php echo __( ':action.topic' ); ?></button>
				<button type="submit" class="btn btn-default">Login with ClanCats</button>
			</div>
		</div>
		
	<?php echo Form::end(); ?>
	</div>
</div>