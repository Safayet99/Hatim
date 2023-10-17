
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Hatim.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <?= wp_enqueue_style( 'style', get_stylesheet_uri() ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <div class="container-fluid ">
        <div class="container-fluid bg-secondary">
            <div class="row">
                <div class="col-sm-4">
                  <a href="#"><i class="fa-brands fa-facebook fs-5 px-2 pt-2 text-white"></i></a>  
                  <a href="#"><i class="fa-brands fa-instagram fs-5 px-2 pt-2 text-white"></i></a>
                  <a href="#"><i class="fa-brands fa-youtube fs-5 px-2 pt-2 text-white"></i></a>
              


                </div>
                <div class="col-sm-4">
                <p class="btn text-white"><?= get_option('my_options')['email_address']?> |
                <?= get_option('my_options')['contact_number']?></p>
                    

                    
                </div>
                <div class="col-sm-2">
                   <a href="#" class="btn text-white"><?= get_option('my_options')['button']?></a>  
                </div>
                <div class="col-sm-2">
                <a href="#" class="btn text-white"><?= get_option('my_options')['button1']?></a>  
                   
                  
                </div>
                
                
            </div>

          
            </div>
           
             <!-- mynave -->
      <nav class="navbar navbar-expand-md navbar-light text-dark ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 pt-4">
                <a href="<?= home_url() ?>">
                        <?php
                            $logo_id=get_theme_mod('custom_logo');
                            $logo=wp_get_attachment_image_src($logo_id, 'full');
                            if(has_custom_logo()){
                        ?>
                                <img src="<?= esc_url($logo[0]); ?>" alt="<?php bloginfo('name') ?>" style="width:200px;" class="">
                        <?php }else{ ?>
                                <img src="<?= get_template_directory_uri(); ?>/images/Hatit logo.png" alt="Hatim Logo" style="width:200px;" class="">
                        <?php } ?>
                    </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynav">
              <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="col-sm-8">
        <div class="collapse navbar-collapse" id="mynav">
        <ul class="navbar-nav fs-5 px-0 pt-5 ">
            
       
              <?php wp_nav_menu(array('submenu_class'=>'dropdown-menu','a_class_1'=>"dropdown-item",'li_class'=>'nav-item dropdown','a_class'=>'nav-link dropdown-toggle','theme_location'=>'main_menu','container'=>"ul",'menu_class'=>"navbar-nav fs-5 px-5 p-1 text-dark")) ?>
    </div>
</div>

        </div>
        </div>
      </nav>
                       