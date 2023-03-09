<?php

/**
 * Template Name: Research Page
 * PHP version 7
 *
 * @category   Page_Template
 * @package    scistories
 * @subpackage scistories-page-research
 * @author      SciStories
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @link       http://scistories.com/
 * @since      1.0.0
 */

get_header();

if (have_posts()) {
    the_post();

?>

    <!--- research areas cpt loop ---->

    <?php $research_areas = SciStoriesPage::getPosts('research_areas', -1, 'DESC');

    if ($research_areas->have_posts()) {
        while ($research_areas->have_posts()) {
            $research_areas->the_post();
            $featured_image_url = get_the_post_thumbnail_url();

    ?>
            <div class="">
                <!-- code here -->
            </div>
    <?php
        }
    };
    wp_reset_postdata(); ?>


<?php }
get_footer(); ?>