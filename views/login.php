<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brobook</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Brobook">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href='../css/maincss.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
<div class="container">
  <div class="row">


<form class="form-horizontal pull-right" action='status/showStatus' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
    </div>
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" required>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
        <p></p>
      </div>
    </div>


    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <input class="btn btn-success " type="submit" name="login_submit" value="Login" required=""/>
      </div>
    </div>
  </fieldset>
</form>

<form class="form-horizontal" action='user/addUser' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- first name -->
      <label class="control-label"  for="first_name">First Name</label>
      <div class="controls">
        <input type="text" id="first_name" name="firstname" placeholder="" class="input-xlarge" required>
      </div>
    </div>

    <div class="control-group">
      <!-- Last Name -->
      <label class="control-label"  for="last_name">Last Name</label>
      <div class="controls">
        <input type="text" id="last_name" name="lastname" placeholder="" class="input-xlarge" required>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <input class="btn btn-success " type="submit" name="register_submit" value="Register" required=""/>
      </div>
    </div>
  </fieldset>
</form>

</div> <!-- row -->
</div> <!-- container -->


</body>
</html>