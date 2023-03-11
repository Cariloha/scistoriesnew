<?php

/**
 * Template Name: Home Page
 * PHP version 7
 *
 * @category   Page_Template
 * @package    scistories
 * @subpackage scistories-page-home
 * @author      SciStories
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @link       http://scistories.com/
 * @since      1.0.0
 */

get_header();

if (have_posts()) {
  the_post();
  $id = get_the_ID();
  $hero_image_id = carbon_get_post_meta(get_the_ID(), 'crb_hero_image');
  $hero_image_url = wp_get_attachment_url($hero_image_id);
  $hero_title = carbon_get_post_meta(get_the_ID(), 'crb_hero_title');
?>

  <section class="hero">
    <div class="hero__bg" style="background-image: url('<?= $hero_image_url ?>');">
    </div>
    <div class="hero__text container">
      <h1 class="hero__text__title"><?= $hero_title ?></h1>
      <button onclick="location.href = '/contact';">GET A QUOTE</button>
    </div>
  </section>
  <?php
  $illustration_card = carbon_get_post_meta($id, 'crb_ss_illustration');
  $design_card = carbon_get_post_meta($id, 'crb_ss_design');
  $technology_card = carbon_get_post_meta($id, 'crb_ss_technology');
  $marketing_card = carbon_get_post_meta($id, 'crb_ss_marketing');

  ?>

  <section class="container mt-88">
    <div class="d-flex flex-wrap flex-md-grow-0 gap-8">
      <div class="info__group">
        <?php
        foreach ($illustration_card as $i_key) {
          $i_key_img_id = $i_key['crb_illustration_img'];
          $i_key_img_url = wp_get_attachment_url($i_key_img_id);
          $list_i = $i_key['crb_illustration_descriptions_list'];

        ?>
          <div class="info__group__img">
            <img class="img-fluid" src="<?= $i_key_img_url ?>" alt="illustration-img">
          </div>
          <ul class="info__group__list">
            <?php
            foreach ($list_i as $item) {
            ?>
              <li class="text-center">
                <?= $item['crb_illustration_description'] ?>
              </li>
            <?php     } ?>
          </ul>
        <?php }
        ?>

      </div>

      <div class="info__group">
        <?php
        foreach ($design_card as $d_key) {
          $d_key_img_id = $d_key['crb_design_img'];
          $d_key_img_url = wp_get_attachment_url($d_key_img_id);
          $list_d = $d_key['crb_design_descriptions_list'];

        ?>
          <div class="info__group__img">
            <img class="img-fluid" src="<?= $d_key_img_url ?>" alt="design-img">
          </div>

          <ul class="info__group__list">
            <?php
            foreach ($list_d as $item) {
            ?>
              <li class="text-center">
                <?= $item['crb_design_description'] ?>
              </li>
            <?php     } ?>

          </ul>
        <?php }
        ?>

      </div>

      <div class="info__group">
        <?php
        foreach ($technology_card as $t_key) {
          $t_key_img_id = $t_key['crb_technology_img'];
          $t_key_img_url = wp_get_attachment_url($t_key_img_id);
          $list_t = $t_key['crb_technology_descriptions_list'];

        ?>
          <div class="info__group__img">
            <img class="img-fluid" src="<?= $t_key_img_url ?>" alt="technology-img">
          </div>

          <ul class="info__group__list">
            <?php
            foreach ($list_t as $item) {
            ?>
              <li class="text-center">
                <?= $item['crb_technology_description'] ?>
              </li>
            <?php     } ?>

          </ul>
        <?php }
        ?>

      </div>


      <div class="info__group">
        <?php
        foreach ($marketing_card as $m_key) {
          $m_key_img_id = $m_key['crb_marketing_img'];
          $m_key_img_url = wp_get_attachment_url($m_key_img_id);
          $list_m = $m_key['crb_marketing_descriptions_list'];

        ?>
          <div class="info__group__img">
            <img class="img-fluid" src="<?= $m_key_img_url ?>" alt="marketing-img">
          </div>

          <ul class="info__group__list">
            <?php
            foreach ($list_m as $item) {
            ?>
              <li class="text-center">
                <?= $item['crb_marketing_description'] ?>
              </li>
            <?php     } ?>

          </ul>
        <?php }
        ?>
      </div>
    </div>
  </section>

  <?php
  $chosen_quote = carbon_get_post_meta(get_the_ID(), 'crb_chosen_quote');
  $id = wp_list_pluck($chosen_quote, 'id');

  // var_dump($get_post);
  $id_data = new WP_Query(array(
    'post_type' => 'quotes',
    'post__in' => $id,
  ));
  ?>

  <section class="quote">
    <div class="container d-flex">
      <div class="quote__content">
        <p></p>
      </div>
      <div class="quote__author d-flex">
        <div class="quote__author__img">
          <img src="" alt="quote-author-photo">
          <img src="" alt="quote-author-affiliation">
        </div>
        <div class="quote__author__info">
          <p></p>
        </div>
      </div>
    </div>
  </section>

<?php }
get_footer(); ?>