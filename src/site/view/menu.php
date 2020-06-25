<!-- Start Restaurant Menu -->
<section id="mu-restaurant-menu">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="mu-restaurant-menu-area">
        <div class="mu-title">
            <span class="mu-subtitle">Discover</span>
            <h2>OUR MENU</h2>
            <?php $menu=$list_vendor[$vendor_id]; ?>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
        </div>
        <div class="mu-restaurant-menu-content">
            <ul class="nav nav-tabs mu-restaurant-menu">
            <?php foreach ($menu['categories'] as $row): ?>
            <?php if($active) echo('<li>'); else { echo('<li class="active">'); $active=1;} ?><a href="#<?= htmlentities(strtolower($row['catname']),ENT_QUOTES);?>" data-toggle="tab"><?= htmlentities(ucfirst(strtolower($row['catname'])),ENT_QUOTES);?></a></li>  
            <?php endforeach; ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
            <?php foreach ($menu['categories'] as $row): ?>
            <?php 
                $counter_product_of_category = 0;
                for ($i=0;$i<count($menu['products']);$i++){
                if ($row['id']==$menu['products'][$i]['category_id']) $counter_product_of_category+=1;
                }
            ?>
            <div class="tab-pane fade in <?php if(!$active2) { echo('active'); $active2=1;} ?>" id="<?= htmlentities(strtolower($row['catname']),ENT_QUOTES);?>">
                <div class="mu-tab-content-area">
                <div class="row">
                    <div class="col-md-6">
                    <div class="mu-tab-content-left">
                        <ul class="mu-menu-item-nav">
                        <?php $counter=0;$i=0?>
                        <?php while($counter < round($counter_product_of_category/2) ): ?>
                            <?php $product=$menu['products'][$i]; ?>
                            <?php if($product['category_id']==$row['id']): ?>
                            <?php $counter+=1 ?>
                        <li>
                            <div class="media">
                            <div class="media-left">
                                <a>
                                <img class="media-object" src="<?= $product['photo']?>" alt="img">
                                </a>
                            </div>
                            <div class="media-body">
                            <?php if($product['is_ready'] == 1): ?>
                                <h4 class="media-heading"><a onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" ><?= htmlentities($product['product_name'],ENT_QUOTES)?></a></h4>
                                <span class="mu-menu-price"><?= $product['price']?>VNĐ</span>
                                <!-- <p><?= htmlentities($product['description'],ENT_QUOTES)?></p> -->
                                <br><div style="padding-top:10px" onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" type="button" class="mu-readmore-btn" tabindex="-1">Add to cart</div>
                                <?php else:?>
                                <h4 class="media-heading"><a onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" ><del><?= htmlentities($product['product_name'],ENT_QUOTES)?></del></a></h4>
                                <span class="mu-menu-price"><?= $product['price']?>VNĐ</span>
                                <!-- <p><?= htmlentities($product['description'],ENT_QUOTES)?></p> -->
                                <?php endif;?>
                            </div>
                            </div>
                        </li>
                            <?php endif; ?>
                            <?php $i+=1 ?>
                        <?php endwhile; ?>
                        </ul>   
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mu-tab-content-left">
                        <ul class="mu-menu-item-nav">
                        <?php while($counter < $counter_product_of_category ): ?>
                            <?php $product=$menu['products'][$i]; ?>
                            <?php if($product['category_id']==$row['id']): ?>
                            <?php $counter+=1 ?>
                        <li>
                            <div class="media">
                            <div class="media-left">
                                <a onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')">
                                <img class="media-object" src="<?= $product['photo']?>" alt="img">
                                </a>
                            </div>
                            <div class="media-body">
                                <?php if($product['is_ready'] == 1): ?>
                                <h4 class="media-heading"><a onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" ><?= htmlentities($product['product_name'],ENT_QUOTES)?></a></h4>
                                <span class="mu-menu-price"><?= $product['price']?>VNĐ</span>
                                <!-- <p><?= htmlentities($product['description'],ENT_QUOTES)?></p> -->
                                <br><div style="padding-top:10px" onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" type="button" class="mu-readmore-btn" tabindex="-1">Add to cart</div>
                                <?php else:?>
                                <h4 class="media-heading"><a onclick="submit_form('add_to_cart','product_id','<?= $product['product_id']; ?>')" ><del><?= htmlentities($product['product_name'],ENT_QUOTES)?></del></a></h4>
                                <span class="mu-menu-price"><?= $product['price']?>VNĐ</span>
                                <!-- <p><?= htmlentities($product['description'],ENT_QUOTES)?></p> -->
                                <?php endif;?>
                        </li>
                            <?php endif; ?>
                            <?php $i+=1 ?>
                        <?php endwhile; ?>
                        </ul>   
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<form action="<?= PATH_INDEX ?>?c=order&a=add" id="add_to_cart" method="POST">
  <input type="hiden" id="product_id" name="product_id" value="a" style="display:none">
</form> 
</section>
<!-- End Restaurant Menu -->