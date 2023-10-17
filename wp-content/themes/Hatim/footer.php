
<!-- Start Footer -->
 <!-- Back to Top -->
 <div class="container">
  <div class="row">
      <div class="col-sm-12 text-end">
          <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top "> 
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
          </svg>
          </a>
      </div>
  </div>
</div>

<div class="container-fluid mt-4  footer-2 bg-dark text-white">
            <div class="row">
                <div class="col-lg-3 py-3 footer-2-p1">
                <img src="<?= get_option('my_options')['Footer_image']?>" width="100%" alt="">
                    
                    
                    
                    <div class="icon pt-3 text-center ">

                        <a href="#"> <i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#"> <i class="fab fa-linkedin fa-2x"></i></a>
                        <a href="#"> <i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#"> <i class="fab fa-pinterest fa-2x"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4  footer--p2-p3 py-2">
                <img src="<?= get_option('my_options')['Pg_image']?>" width="100%" alt="">
                </div>
              
                <div class="col-lg-3 mt-4    footer-2-p4 text-white">
                <?php if ( is_active_sidebar( 'address-widget-area' ) ) : ?>
                        <?php dynamic_sidebar( 'address-widget-area' ); ?>
                    <?php endif; ?>
                    <!-- <h3 class="text-center">Corporate Office</h3>
                    <ul class="foot-p4-ul ps-5">
                        <li>8 Shewrapara,
                            Rokeya Sarani, Mirpur,
                            Dhaka-1216,
                            Bangladesh.
                        </li>
                        <br>
                        <li>
                            <a href="tel:88 02 58054370">Tel:+88 02 58054370</a>
                        </li>
                        <li>
                            <a href="tel:+88 01713441000"> Phone:+88 01713441000</a>
                        </li>
                        <li>
                            <a href="mailto: info@hatil.com">Email: &nbspinfo@hatil.com</a> 
                        </li>
                    </ul> -->
                </div>
            </div>
          
        </div>



<!-- Copywrite -->
                
<div class="div bg-dark text-center text-white">
    <p class="p-0"><i class="fa-sharp fa-regular fa-copyright"></i> 2023 All right reserved by HATIM Group</p>
</div>
<?php wp_footer(); ?>
 
           

                <!-- End Footer -->

                
            

     
   
    
</body>

<script src="<?php echo get_template_directory_uri(); ?>/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>