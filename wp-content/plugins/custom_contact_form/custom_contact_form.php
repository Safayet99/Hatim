<?php
/*
Plugin Name: Custom Contact Form
Plugin URI: https://example.com/
Description: This plugin adds a custom contact form.
Version: 1.0
Author: Ahtesanul Hoque Kaiser
Author URI: https://example.com/
License: GPL2
*/

// Add the shortcode for the contact form
function custom_contact_form_shortcode() {
    ob_start(); // Start output buffering to capture the form HTML
    ?>
    <section class="inner_page_head">
        <div class="container-fluid bg-secondary mt- pt-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h3 class="text-white">Contact us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_section layout_padding">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="full">
                        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                            <fieldset>
                                <input type="hidden" name="action" value="process_contact_form">
                                <?php wp_nonce_field( 'contact_form_action', 'contact_form_nonce' ); ?>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your full name" name="name" required />
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Enter your email address" name="email" required />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your address" name="subject" required />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your Phone Number" name="subject" required />
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Enter your message" name="message" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-success" value="Submit" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean(); // Return the captured HTML as the shortcode output
}
add_shortcode( 'custom_contact_form', 'custom_contact_form_shortcode' );

// Process the form submission (add this part if it's not already present)
function process_contact_form() {
    // ... (your existing form processing code)
}
add_action( 'admin_post_process_contact_form', 'process_contact_form' );
add_action( 'admin_post_nopriv_process_contact_form', 'process_contact_form' );
