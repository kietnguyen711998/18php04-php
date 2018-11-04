
<div class="container">
<?php while ($row = $listProduct->fetch_assoc()) {
      $id = $row['id'];
?>
	<div class="col-xs-12 col-md-6">
		<!-- First product box start here-->
		<div class="prod-info-main prod-wrap clearfix">
			<div class="row">
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="product-image"> 
							<img src="dist/img/<?php echo $row['image']?>" class="img-responsive"> 
							<span class="tag2 hot">
								HOT
							</span> 
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-deatil">
							<h5 class="name">
								<a href="#">
									<?php echo $row['name']?>
								</a>
								<a href="#">
									<span>Product Category</span>
								</a>                            

							</h5>
							<p class="price-container">
								<span>$<?php echo $row['price']?></span>
							</p>
							<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>A Short product description here </p>
					</div>
					<div class="product-info smart-form">
						<div class="row">
							<div class="col-md-12"> 
								<a href="#" class="btn btn-danger">Add to cart</a>
	                            <a href="#" class="btn btn-info">Detail</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end product -->
	</div>
<?php }?>
</div>
