<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<?php
    
?>
<div class="row">
                <div class="col-md-12">
                    <div class="latest-product">

                        <h2 class="section-title"><strong><a color="blue">Search Product</a></h2></strong>
                        <form action="" method="get" align =" center">
                                <input type="text" name="search" />
                                <button type="submit" name="submit">Search</button>
                                </form>
                                
                        <div class="product-carousel">
                          <?php
		  				   	$result = mysqli_query($conn, "SELECT * FROM product Where Product_Name LIKE '%Jordan%'" );
                            if(isset($_POST["search"]) && !empty($_POST["search"])){
                                $s =$_POST["search"];
                                $result = mysqli_query($conn, "SELECT * FROM product WHERE Product_Name LIKE '%$s%'" );
                            }
			                if (!$result) { 
                                die('Invalid query: ' . mysqli_error($conn));
                            }			            
			                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				            ?>				            
                            <div class="single-product">
                                <div class="product-f-imagemu">
                                   <img src="img/<?php echo $row['Pro_image']?>" width="550" height="450">
                                    <div class="product-hover">
                                        <a href="?page=product_management&&id=<?php echo  $row['Pro_image']?>" class="view-details-link"><i class="fa fa-link"></i> View Details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=quanly_chitietsanpham&&ma=<?php echo  $row['Product_ID']?>"><?php echo  $row['Product_Name' ]?></a>
                                </h2>
                                    
                                <div class="product-carousel-price">
                                    <ins><?php echo  $row['Price']?>,0$</ins> 
                                </div> 
                            </div>
                
                            <?php
				            }
				            ?>
                        </div>
                    </div>
                </div>
            </div>