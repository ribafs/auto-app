<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <h2><?php langHelper::showMsg('BD-INFO'); ?></h2>
  <form method="POST" action="">
    <div class="form-group">
      <input type="text" class="form-control" id="host" name="host" value="localhost" required>
    </div>
    <div class="form-group">
      <input type="test" class="form-control" id="db" placeholder="<?php langHelper::showMsg('BD-NAME'); ?>" name="db" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="user" name="user" value="root" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pass" placeholder="<?php langHelper::showMsg('BD-PASS'); ?>" name="pass">
    </div>
    <div class="form-group">
      <input type="sgbd" class="form-control" id="sgbd" name="sgbd" value="mysql">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="port" name="port" value="3306">
    </div>
    <button type="submit" class="btn btn-primary"><?php langHelper::showMsg('SUBMIT'); ?></button>
  </form>
  </div>
</div>