<?php

/**
 * Template Name: Nonprofits Page
 * PHP version 7
 *
 * @category   Page_Template
 * @package    scistories
 * @subpackage scistories-page-nonprofits
 * @author     SciStories
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @link       http://scistories.com/
 * @since      1.0.0
 */

get_header();

if (have_posts()) {
    the_post();

?>



<?php }
get_footer(); ?>