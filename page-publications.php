<?php

/**
 * Template Name: Publications Page
 * PHP version 7
 *
 * @category   Page_Template
 * @package    scistories
 * @subpackage scistories-page-publications
 * @author      SciStories
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @link       http://scistories.com/
 * @since      1.0.0
 */

get_header();
if (have_posts()) {
    the_post();


?>
    <div class="container mt-88">
        <div class="years d-flex gap-24">
            <?php
            $updates_years = SciStoriesPage::getPublicationYears();
            ?>
            <div class="select__icon">
                <label class="filter-label" for="year">Filter by:</label>
                <select class="select__dropdown" name="year" id="update-years">
                    <option value="0">Year</option>

                    <?php
                    foreach ($updates_years as $year => $update) {
                    ?>

                        <option value="<?= esc_html($update->year); ?>"><?= esc_html($update->year); ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="select__icon">
                <?php
                $terms = get_terms('updates-categories');
                ?>
                <select class="select__dropdown select__dropdown--terms" name="terms" id="terms">
                    <option value="">Updates</option>
                    <?php
                    foreach ($terms as $key) { ?>
                        <option value="<?= $key->slug ?>"><?= $key->name ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div id="publications-content" class="pb-5" data-js-filter="target">
        <?php
        Publications::load_publications();
        ?>
    </div>

    </div>
<?php }
get_footer(); ?>