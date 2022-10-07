<!--new-arrivals start -->
<?php

if(isset($_SESSION['uname']))
{
	echo $_SESSION['uname'];
}
else{
	header('location:index');
}
?>
<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<h2>new arrivals</h2>
				</div><!--/.section-header-->

				<div class="new-arrivals-content">

                <div class="row">
                    <?php
                                    foreach($all_product as $p)
                                    {?>

						<div class="col-md-3 col-sm-4">

							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">

									<img src="../admin/upload/<?php echo $p->pro_image;?>" 
                                    alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<div class="sale bg-1">
										<p>sale</p>
									</div>
									<div class="new-arrival-cart">
										<p>
											<span class="lnr lnr-cart"></span>
											<a href="#">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
											<span class="lnr lnr-heart"></span>
											<span class="lnr lnr-frame-expand"></span>
										</p>
									</div>
								</div>
								<form method="post">
								<input type="hidden" name="pid" value="<?php echo $p->pid;?>">
								<h4><?php echo $p->pro_name;?></h4>
								<p class="arrival-product-price">$<?php echo $p->pro_price;?></p>
								<input type="number" name="qty">
								<p>
									<span class ="lnr lnr-cart"></span>
									<button class="btn btn-warning" type="submit" name="cart">Add to cart</button>
							</div>
							</form>

						</div>

                        <?php
                                    }
                                    ?>

                        </div>      
						
			</div><!--/.container-->
		
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->
