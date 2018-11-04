<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List product</h3>
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">ID</th>
            <th>ProductName</th>
            <th>Price</th>
            <th>Image</th>
            <th style="width: 40px">Action</th>
          </tr>
          <?php while ($row = $listProduct->fetch_assoc()) {
            $id = $row['id'];?>
            <tr>
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['productname']?></td>
              <td><?php echo $row['price']?></td>
              <td><?php echo $row['image']?></td>
              <td>
                <a href="index.php?action=edit_product&id=<?php echo $id;?>"><button type="button" class="btn btn-block btn-info">EDIT</button></a> 
                <a href="index.php?action=delete_product&id=<?php echo $id;?>"><button type="button" class="btn btn-block btn-danger">DELETE</button></a>
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