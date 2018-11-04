<style type="text/css">
  img{
    height: 70px;
  }
</style>
<div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php while ($row = $listNews->fetch_assoc()) {
                    $id    = $row['id'];
                    $image = $row['image'];
                  ?>
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['title']?></td>
                    <td><img src="dist/img/<?php echo $image;?>"></td>
                    <td>
                    <a href="admin.php?action=edit_news&id=<?php echo $id;?>"><button type="button" class="btn btn-block btn-info">EDIT</button></a> 
                    <a href="admin.php?action=delete_news&id=<?php echo $id;?>"><button type="button" class="btn btn-block btn-danger">DELETE</button></a>
                    </td>
                  </tr>
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!-- /.col -->
      </div>
  </div>     