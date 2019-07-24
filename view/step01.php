<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <h2><?php langHelper::showMsg('BD-INFO'); ?></h2>
  <form method="POST" action="">
    <input type="hidden" id="formid" name="formid" value="database">
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
      <label for="dbms"><?php langHelper::showMsg('BD-DBMS'); ?></label>
      <select class="form-control" id="dbms" name="dbms">
        <option value="mysql">MySQL</option>
        <option value="pgsql">PostgreSQL</option>
        <option value="sqlite">SqLite</option>
      </select>
    </div>    
    <div class="form-group">
      <input type="text" class="form-control" id="port" name="port" value="3306">
    </div>
    <button type="submit" class="btn btn-primary"><?php langHelper::showMsg('BTN-SUBMIT'); ?></button>
  </form>
  </div>
</div>