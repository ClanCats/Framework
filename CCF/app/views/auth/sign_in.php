<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="row">
			<div class="col-sm-offset-2 col-sm-10">
				<h2>Sign In</h2>
			</div>
		</div>

	<!-- sing in form -->
	<?php echo UI\Form::start( 'sign-in', array( 'method' => 'post', 'class' => 'form-horizontal' ) ); ?>

		<!-- identifier -->
		<div class="form-group">
			<?php echo UI\Form::label( 'email', 'Email' )->add_class( 'col-sm-2' ); ?>
			<div class="col-sm-10">
		  		<?php echo UI\Form::input( 'email' )->placeholder( 'Email' ); ?>
			</div>
		</div>

		<!-- password -->
		<div class="form-group">
			<?php echo UI\Form::label( 'password', 'Password' )->add_class( 'col-sm-2' ); ?>
			<div class="col-sm-10">
		  		<?php echo UI\Form::input( 'password', 'password' )->placeholder( 'Password' ); ?>
			</div>
		</div>

		<!-- remember me -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php echo UI\Form::checkbox( 'retain', 'Remember me', 1 ); ?>
			</div>
		</div>


	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-primary">Sign in</button>
		  <button type="submit" class="btn btn-default">Login with ClanCats</button>
		</div>
	  </div>
	<?php echo UI\Form::end(); ?>
	</div>
</div>