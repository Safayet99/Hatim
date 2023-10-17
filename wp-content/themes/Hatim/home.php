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
<!-- Anniversary celebration Start -->
            
<div class="container-fluid py-5">
    <div class="row">
       
        <div class="col-sm-6">
            <img src="<?= get_option('my_options')['Chill_image']?>" alt="">
                        </div>
                        <div class="col-sm-6 py-5">
                        <h2 class="py-5 text-danger">Hatim Group 22 Year Anniversary</h2>
                        <p><?= get_option('my_options')['Product']?></p>
                        <button class="btn btn-danger text-start px-3">Join With Us</button>
                        </div>
                        
        
       
        </div>
    </div>
</div>
<!-- Anniversary celebration End -->
            
             <!-- Start our Product  -->
   
<div class="container-fluid mt-1 pdt">
    <div class="row">
    <h1 class="text-center text-success"><?= get_option('my_options')['Our_product']?></h1>
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' =>-1,
        );

        $products_query = new WP_Query($args);

        if ($products_query->have_posts()) {
            while ($products_query->have_posts()) {
                $products_query->the_post();
                global $product;

                $product_categories = get_the_terms(get_the_ID(), 'product_cat'); // Get the product categories
                $regular_price = $product->get_regular_price(); // Get the product regular price
                $sale_price = $product->get_sale_price(); // Get the product sale price
                $add_to_cart_url = esc_url(wc_get_cart_url()) . '?add-to-cart=' . get_the_ID(); // Get the add to cart URL

                // Display the first category if available
                $category_name = (is_array($product_categories) && !empty($product_categories)) ? $product_categories[0]->name : 'Uncategorized';
                ?>
                <div  class="col-sm-6 col-md-6 col-lg-3 justify-content-center producte text-center proback mt-4 px-2">
                    <div class="card">
                        <a class="text-decoration-none text-dark" href="<?php the_permalink(); ?>">
                            <img class="img-fluid text-center" src="<?= esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title() ?>">
                            <h4 class=" text-"><?php the_title() ?></h4>
                            <p class=""><?php the_excerpt(); ?></p>
                            <p class="">Category: <?php echo esc_html($category_name); ?></p>
                            <?php if ($sale_price) : ?>
                                <span class=""><b>Regular Price: </b> <del class="opacity"><?php echo wc_price($regular_price); ?></del><span><br>
                                <span class=""><b>Sale Price:</b><?php echo wc_price($sale_price); ?></span>
                            <?php else : ?> <br>
                                <span class=""><b>Price:</b>  <?php echo wc_price($regular_price); ?></span>
                            <?php endif; ?>
                            <a href="<?php echo $add_to_cart_url; ?>" class="btn btn-success text-white">Add to Cart</a>
                        </a>
                    </div>
                    
                </div>
                <?php
            }
            wp_reset_postdata();
         }
         ?>
         </div>
           </div>

             <!-- End our Product  -->


            
             <!-- Start Client -->
             <div class="container-fluid client">
                <!-- <div class="container py-5"> -->
                    <div class="row py-5">
                        <div class="col-sm-6 py-2">
                       <p> <img src="<?= get_option('my_options')['Client_image']?>" width="100%" alt=""> </p>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h2 class="py-5"><?= get_option('my_options')['Service']?></h2>
                            <p><?= get_option('my_options')['Service_tagline']?></p>
                            <button class="btn btn-danger text-start px-3">Learn More</button>
                        
                               
                            
                        </div>
                    </div>
                </div>
             </div>
             <!-- End Client  -->
<!-- Pipe and Fittings Items Start -->
             <div class="container-fluid icon">
              <div class="row">
                <div class="col-sm-12">
                  <h1 class="text-center text-success">Our Pipe And Fitting Items</h1> <br>
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
       <!-- Pipe and Fittings Items End -->

             <!-- Start Customer Review  -->

             
             <div class="container-fluid p-5 text-center ">
                <!-- <div class="container"> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center text-danger">Clients Testimonial</h1>
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
               

               <!-- Start Furniture -->
               
               <div class="container-fluid icon">
              <div class="row">
                <div class="col-sm-12">
                  <h1 class="text-center text-success">Our Furniture Items</h1> <br>
                </div>
                  <?php
                        $args=array('post_type'=>'product_cat1','posts_per_page'=>10);
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
               <!-- End Furniture -->

                 <!-- Start Industial Park -->
                 <h2 class="text-secondary text-center p-2">Our Industrial Park</h2>
               <?php
        $banner_image = '';
      // Get the banner image URL from the custom post type "banner"
      $args = array(
          'post_type'      => 'factory',
          'posts_per_page' => 1, // If you want to display multiple banners, change this value
      );
      $banner_query = new WP_Query($args);
      // Check if the query returned any results
      if ($banner_query->have_posts()) {
          while ($banner_query->have_posts()) {
              $banner_query->the_post();
              // Check if the post has a featured image
              if (has_post_thumbnail()) {
                  $banner_image = get_the_post_thumbnail_url(null, 'full');
              } else {
                  $banner_image = ''; // If no featured image, set it to an empty string
              }
          }
          wp_reset_postdata();
      } else {
          // If there are no posts in the "banner" custom post type, set the banner_image to a default image URL or leave it empty.
          $banner_image = ''; // Set it to a default URL or an empty string if you don't want to show a default image.
      }
    ?>

    <section id = "offers" class = "py-5" style = "background: url('<?php echo esc_url($banner_image); ?>');">
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

<!-- =======================Plugin Contact Us -->
        <div class="mt-5"></div>

<span class= text-white> <?php echo do_shortcode('[custom_contact_form]'); ?> </span> 

<section class="why_section layout_padding">
    <div class="container mt-5">
        <!-- Your other content goes here -->
    </div>
</section>
<!-- Plugin Contact us End -->
        

                <?php
    get_footer();
?>     

                