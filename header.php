<?php

/**
 * Header file for the scistories theme.
 * PHP version 7
 *
 * @category   Page_Template
 * @package    scistories
 * @subpackage scistories-page-header
 * @author     SciStories
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @link       http://scistories.com/
 * @since      1.0.0
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php esc_attr(bloginfo('charset')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>

    <title>Scistories Lab Website</title>

</head>


<body <?php body_class(); ?>>
    <div class="ss-navbar container">
        <a class="navbar__logo" href="<?php echo esc_attr(home_url()); ?>">
            <?php $logo_image_id = get_theme_mod('custom_logo');
            $logo_image_url = (('' !== $logo_image_id) ? wp_get_attachment_url($logo_image_id) : '');
            if ('' !== $logo_image_url) { ?>

                <img class="navbar__logo__img" src="<?php echo esc_attr($logo_image_url); ?>" />
            <?php } else { ?>
                <span><?php echo esc_attr(get_bloginfo('name')); ?></span>
            <?php } ?>
        </a>

        <div class="navbar__menu" id="menu-list">
            <?php
            if (has_nav_menu('primary_menu')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary_menu',
                        'menu_class' => 'menu',
                        'bootstrap'  => false
                    )
                );
            }

            ?>

        </div>

        <div class="navbar__desktop">
            <div class="navbar__social">
                <?php
                $twitter_url = get_theme_mod('twitter_setting');
                if (!empty($twitter_url)) {
                ?>
                    <div class="twitter">
                        <a href="<?php echo esc_attr($twitter_url); ?>" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>

                <?php
                }
                $instagram_url = get_theme_mod('instagram_setting');
                if (!empty($instagram_url)) {
                ?>
                    <div class="instagram">
                        <a href="<?php echo esc_attr($instagram_url); ?>" target="_blank"> <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>

                <?php
                } ?>
            </div>
        </div>

        <div class="navbar__mobile">
            <div class="navbar__social">

                <?php
                $twitter_url = get_theme_mod('twitter_setting');
                if (!empty($twitter_url)) {
                ?>
                    <div class="twitter">
                        <a href="<?php echo esc_attr($twitter_url); ?>" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>

                <?php
                }
                $instagram_url = get_theme_mod('instagram_setting');
                if (!empty($instagram_url)) {
                ?>
                    <div class="instagram">
                        <a href="<?php echo esc_attr($instagram_url); ?>" target="_blank"> <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>

                <?php
                } ?>
            </div>

            <div class="navbar__burger">
                <div class="first"></div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
        </div>

    </div>