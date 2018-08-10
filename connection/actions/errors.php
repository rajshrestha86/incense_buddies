
<?php  if (count($errors) > 0) : ?>
<h4>There are errors: </h4>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>