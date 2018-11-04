<div class="row">
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add User</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="index.php?action=add_user" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="add_user">ADD USER</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
</div>        