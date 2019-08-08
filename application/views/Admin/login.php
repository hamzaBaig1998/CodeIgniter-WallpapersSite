<div class="jumbotron jumbotron-fluid bg-dark text-white">
    <h2 class="text-center display-3"><?=$title?></h2>
</div>
<div class="row">
    <div class="col-md-4 offset-md-4">
      <?= validation_errors();?>
       <?=form_open('admins/login');?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <button class="btn btn-primary btn-block" type="submit">Login</button>
        <?=form_close();?>
    </div>
</div>