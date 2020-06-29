  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           <div class="mu-footer-social">
            <a href="<?= PATH_INDEX ?>"><span class="fa fa-facebook"></span></a>
            <a href="<?= PATH_INDEX ?>"><span class="fa fa-youtube"></span></a>
          </div>
          <div class="mu-footer-copyright">
            <p>Designed by <a rel="nofollow">Homelessness</a></p>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>

  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 
  <script>
  function submit_form(id_form,id_input,value_input){
    try {
      document.getElementById(id_input).value = value_input;
    }
    catch(err) {
      console.log("Error! Can not get element by id"); 
    }
    document.getElementById(id_form).submit(); // Form submission
  }
  function send_request(url,post_message){
    $.ajax({        
        url: url ,
        data: post_message,
        type: 'POST',
        success: function (resp) {
        },
        error: function(e){
            alert('Error: '+e);
        }  
    });
  }
  </script>
  </body>
</html>