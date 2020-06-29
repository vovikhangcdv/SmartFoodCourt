  <!-- Start slider  -->
  <section id="vendor-list">
    <div class="mu-slider-area">
      <!-- Top slider -->
      <div class="mu-top-slider">
        <?php for ($i = 0; $i < count($vendors); $i++) : ?>
          <?php $vendor = $vendors[$i] ?>
          <!-- Top slider single slide -->
          <div class="mu-top-slider-single">
            <img src="<?= $vendor['photo'] ?>" style="width:1920px;height:950px" alt="img">
            <!-- Top slider content -->
            <div class="mu-top-slider-content"><br><br>
              <h2 class="mu-slider-title"><?= $vendor['name'] ?></h2>
              <p>"<?= $vendor['description'] ?>"</p>
              <a href="<?= PATH_INDEX ?>?c=order&a=set_vendor&vendor_id=<?= $vendor['id'] ?>" class="mu-readmore-btn">View all food</a>
              <section id="mu-chef">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-chef-area">
                        <div class="mu-title">
                          <h2 style="color:White;">
                            FOOD VIEW</h2>
                          <i class="fa fa-spoon"></i>
                          <span class="mu-title-bar"></span>
                        </div>
                        <div class="mu-chef-content">
                          <ul class="mu-chef-nav">
                            <?php foreach ($vendor['products'] as $id => $product) : ?>
                              <li>
                                <div class="mu-single-chef">
                                  <figure class="mu-single-chef-img">
                                    <a href="<?= PATH_INDEX ?>?c=order&a=set_vendor&vendor_id=<?= $vendor['id'] ?>">
                                      <img style="width:275px;height:265px" src="<?= $product['photo'] ?>">
                                    </a>

                                  </figure>
                                  <div class="mu-single-chef-info">
                                    <h4><?= $product['product_name'] ?></h4>
                                    <span><?= $product['price'] ?> VND</span>
                                  </div>

                                </div>

                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- End Chef Section -->
            </div>
            <!-- / Top slider content -->
          </div>
          <!-- / Top slider single slide -->
        <?php endfor; ?>
        <!-- Top slider single slide -->

        <!-- / Top slider single slide -->
      </div>
    </div>
  </section>
  <!-- End slider  -->