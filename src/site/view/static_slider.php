<!-- Start slider  -->
  <section id="mu-slider">
    <div class="mu-slider-area"> 
      <!-- Top slider -->
      <div class="mu-top-slider">
        <!-- Top slider single slide -->
        <div class="mu-top-slider-single">
          <img src="<?= xss_filter($vendor['photo']) ?>" style="width:100vw;height:950px"  alt="img">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <h2 class="mu-slider-title"><?= xss_filter($vendor['name']) ?></h2>
            <p><?= xss_filter($vendor['description']) ?></p>            
          </div>
          <!-- / Top slider content -->
        </div> 
    </div>
  </section>
  <!-- End slider  -->