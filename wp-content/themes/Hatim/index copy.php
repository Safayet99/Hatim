<?php
/**
 *The main template file
 */
get_header();
?>
            <!-- End navbar  -->

            <!-- Start carousel -->

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                <?php
                        $args=array('post_type'=>'slider','posts_per_page'=>10);
                        $loop=new WP_Query($args);
                        $i=0;
                        while($loop->have_posts()){
                        $loop->the_post();
                    ?>
                        <div class="carousel-item <?= $i==0?'active':'' ?>">
                            <div class="row">
                                <div class="col-lg-12 col-sm-0 d-lg-block d-none  ">
                                    
                                
                                    <div class="d-grid justify-content-center">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="Image 3" class=" w-100">    
                                    
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                   
                  </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- End carousel -->

<!-- 
             Start our Product   -->
             <div class="container-fluid py-5">
          
                <!-- <div class="container text-center"> -->
                    <div class="row text-center">
                        <div class="col-sm-12 py-4">
                            <h2><?= get_option('my_options')['Our_product']?> <br> </h2>
                            <p><?= get_option('my_options')['Our_product_tagline']?></p>
                            <!-- <div class="container text-center"> -->
                              <div class="row text-center">
                               
                                <?php
                        $args=array('post_type'=>'product_cat','posts_per_page'=>10);
                        $loop=new WP_Query($args);
                        $i=0;
                        while($loop->have_posts()){
                        $loop->the_post();
                    ?>
                                  <div class="col-sm-4 col-12 mt-3 <?= $i ?>">
                                  <div class="card" style="width:400px">
                                  <h2><?= the_title() ?> <br> </h2>
                                  <p><?= the_content() ?></p>
                                 <div>
                                 <button class="btn btn-danger p-3">Learn More</button>
                                 </div>
                                </div>
                            
                              </div>
                              <?php $i++; } ?>
                            </div>
                        
                        </div>
                    </div>
                    
 
                </div>
             </div>
             <!-- End our Product 
            
             <!-- Start quality -->
             <div class="container-fluid">
                <!-- <div class="container py-5"> -->
                    <div class="row py-5">
                        <div class="col-sm-6 py-2">
                       <p> <img src="<?= get_option('my_options')['Client_image']?>" width="100%" alt=""> </p>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h2><?= get_option('my_options')['Service']?></h2>
                            <p><?= get_option('my_options')['Service_tagline']?></p>
                            <button class="btn btn-danger text-start px-3">Learn More</button>
                        
                               
                            
                        </div>
                    </div>
                </div>
             </div>
             <!-- End quality  -->

             <div class="container-fluid icon">
              <div class="row">
                <div class="col-sm-12">
                  <h1 class="text-center">Our Latest Product & Services</h1> <br>
                </div>
                  <?php
                        $args=array('post_type'=>'product_cat','posts_per_page'=>10);
                        $loop=new WP_Query($args);
                        $i=0;
                        while($loop->have_posts()){
                        $loop->the_post();
                    ?>
                <div class="col-lg-4 col-12 mt-3 <?= $i ?>">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url(); ?>" alt="Card image" style="width:100%">
                        <div class="card-body text-center">
                          <p class="card-title"><?php the_title() ?></p>
                          <p class="card-title"><?php the_content() ?></p>
                          <a href="#" class="btn btn-primary card-1">BUY Now &raquo;</a>
                        </div>
                    </div>
                </div>


 <?php $i++; } ?>
          </div>
       </div>
             <!-- Start Customer Review  -->
             <div class="container-fluid p-5">
                <!-- <div class="container"> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center">Clients Testimonial</h1>
                            <img class=" mx-auto d-block" width="10%" src="<?= get_option('my_options')['Cust_image']?>" alt="">
                            <p> <?= get_option('my_options')['Review']?></h4>
                            <h5 class="text-center"><?= get_option('my_options')['Reviewer_name']?></h5>
                           

                        </div>
                    </div>
                </div>
             </div>
               <!-- End Customer Review  -->
               <!-- Start Client  -->
               <div class="container-fluid py-5">
            
                   
    <div class="row">
    <h1 class="text-secondary text-center"><?= get_option('my_options')['Project']?> </h1>
        <?php
        $gallery_images = get_gallery_images();
        foreach ($gallery_images as $image_url) {
            ?>
            <div class="col-sm-12 col-md-4 col-lg-4 rounded mx-auto d-block p-1"><img class="img-fluid" src="<?php echo esc_url($image_url); ?>" alt=""></div>
            <?php
        }
        ?>
    </div>
</div>
</nav">


              
               <!-- End Client  -->
               <!-- Start carousel 1 -->
               <div class="container-fluid py-5">
               
                    
                    <div class="row">
                        <h2 class="text-success text-center">Product Priview</h2>
                        <div class="col-sm-6 p-2">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                <?php
                        $args=array('post_type'=>'slider','posts_per_page'=>10);
                        $loop=new WP_Query($args);
                        $i=0;
                        while($loop->have_posts()){
                        $loop->the_post();
                    ?>
                        <div class="carousel-item <?= $i==0?'active':'' ?>">
                            <div class="row">
                                <div class="col-lg-12 col-sm-0 d-lg-block d-none  ">
                                    
                                
                                    <div class="d-grid justify-content-center">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="Image 3" class="w-100">    
                                    
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                   
                  </div>
                                  
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                            

                        </div>
                        <div class="col-sm-6 p-2">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                <?php
                        $args=array('post_type'=>'slider','posts_per_page'=>10);
                        $loop=new WP_Query($args);
                        $i=0;
                        while($loop->have_posts()){
                        $loop->the_post();
                    ?>
                        <div class="carousel-item <?= $i==0?'active':'' ?>">
                            <div class="row">
                                <div class="col-lg-12 col-sm-0 d-lg-block d-none  ">
                                    
                                
                                    <div class="d-grid justify-content-center">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="Image 3" class="w-100">    
                                    
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                   
                  </div>
                                  
                                  
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                            

                        </div>
                    </div>
                </div>
               </div>
               <br>
               <!-- End carousel 1 -->

                 <!-- Start Industial Park -->
                 <h2 class="text-secondary text-center p-2">Our Industrial Park</h2>
               
               
      <section ('<?= get_option( 'my_options' )['Factory_image'] ?? ''; ?>');">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <h2 class = "text-white">Hatim Group</h2>
                    <h2 class = "mt-2 mb-4 text-white">Industrial Park</h2>
                    <a href = "#" class = "btn btn-secondary p-2">Visit Our IP</a>
                </div>
            </div>
        </div>
    </section>


             
             
    
               <!-- End Industial Park -->

                <!-- Start Map  -->
                <h2 class="text-secondary text-center p-2">Our Location In Map</h2>
                
<div id="map-container-google-2" class="z-depth-1-half map-container py-3" style="height: 500px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.3959481462457!2d91.8284584500633!3d22.33867358523149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd9cd0e637a3d%3A0x5ae9b200cdf4ae59!2sHATIM%20Group!5e0!3m2!1sen!2sbd!4v1678125778871!5m2!1sen!2sbd" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> frameborder="0"
      style="border:0" allowfullscreen></iframe>
  </div>
                <!-- End Map  -->
                <div class="container-fluid   footer-1 ">
            <div class="row">
                <div class="col-lg-12 mt-5   ">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

                <?php
    get_footer();
?>     

                