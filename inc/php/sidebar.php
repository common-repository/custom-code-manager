<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Sidebar
 */
?>
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <!-- SPACEXCHIMP -->
            <div class="postbox banner">
                <h3 class="title"><?php _e( 'We are «Space X-Chimp»', $plugin_combo['text'] ); ?></h3>
                <div class="inside">
                    <a href="https://www.spacexchimp.com/" target="_blank">
                        <img src="<?php echo $plugin_combo['url'] . 'inc/img/spacexchimp-logo.png'; ?>" alt="Space X-Chimp">
                    </a>
                </div>
            </div>
            <!-- END SPACEXCHIMP -->

            <!-- UPGRADE -->
            <div class="postbox banner">
                <div class="inside">
                    <a href="https://www.spacexchimp.com/plugins/<?php echo $plugin_combo['slug'] . '-pro'; ?>.html" target="_blank">
                        <img src="<?php echo $plugin_combo['url'] . 'inc/img/upgrade.png'; ?>" alt="Upgrade" style="margin-top:-16px;">
                    </a>
                </div>
            </div>
            <!-- END UPGRADE -->

            <!-- ABOUT -->
            <div class="postbox about">
                <h3 class="title"><?php _e( 'About', $plugin_combo['text'] ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin gives you the ability to easily and safely add your custom code (PHP, HTML, CSS, JavaScript, etc.) to your WordPress website, directly out of the WordPress Admin Area, without the need to have an external editor.', $plugin_combo['text'] ); ?></p>
                </div>
            </div>
            <!-- END ABOUT -->

            <!-- HELP -->
            <div class="postbox help">
                <h3 class="title"><?php _e( 'Help', $plugin_combo['text'] ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'If you have a question, please read the information in the FAQ section.', $plugin_combo['text'] ); ?></p>
                </div>
            </div>
            <!-- END HELP -->

            <!-- SUPPORT -->
            <div class="postbox support">
                <h3 class="title"><?php _e( 'Support', $plugin_combo['text'] ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Every little contribution helps to cover our costs and allows us to spend more time creating things for awesome people like you to enjoy.', $plugin_combo['text'] ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                            <span class="btn-label">
                                <img src="<?php echo $plugin_combo['url'] . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                            </span>
                            <?php _e( 'Donate with PayPal', $plugin_combo['text'] ); ?>
                    </a>
                    <p><?php _e( 'Thanks for your support!', $plugin_combo['text'] ); ?></p>
                </div>
            </div>
            <!-- END SUPPORT -->

        </div>
    </div>
<?php
