<div class="row">
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Product</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="index.php?action=edit_product&id=<?php echo $id?>" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputProductName1">Product Name</label>
            <input type="text" class="form-control" id="exampleInputProductName1" placeholder="Enter Product Name" name="productname" value="<?php echo $productnameEdit?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPrice1">Price</label>
            <input type="text" class="form-control" id="exampleInputPrice1" placeholder="Price Enter" name="price"
            value="<?php echo $priceEdit?>">
          </div>
          <div class="form-group">
            <label for="exampleInputImage1">Image</label>
            <input type="text" class="form-control" id="exampleInputImage1" placeholder="Image Enter" name="image" value="<?php echo $imageEdit?>">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="edit_product">ADD USER</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
</div>        