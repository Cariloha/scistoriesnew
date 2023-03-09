<?php

/* Manage Theme support
* PHP version 7
*
* @category   Class
* @author     SciStories
* @since      1.0.0
*/

if (!class_exists('Publications')) {

    class Publications
    {
        public static function init()
        {

            /* Ajax request to load publication pagination record */
            add_action('wp_ajax_pagination-load-publication', __CLASS__ . '::publication_filter');
            add_action('wp_ajax_nopriv_pagination-load-publication', __CLASS__ . '::publication_filter');
        }


        /**
         * Function to Load publication content
         *
         * @since 1.0
         * @static
         * @access public
         */
        public static function publication_filter()
        {
            $filter_data = [];
            $page_param = $_REQUEST['page'] ?? 1;
            $years_param = $_REQUEST['year'] ?? '';
            $terms_param = $_REQUEST['terms'] ?? '';
            $page = intval(sanitize_text_field(wp_unslash($page_param)));
            $filter_data['year'] = intval(sanitize_text_field(wp_unslash($years_param)));
            $filter_data['terms'] = (sanitize_text_field(wp_unslash($terms_param)));

            self::load_publications($page, $filter_data);
            die;
        }

        /**
         * Function to Load publication content
         *
         * @since 1.0
         * @static
         * @access public
         *
         * @param Integer $page Page number as integer.
         * @param Array   $filter_data Filter data for pagination as array.
         */
        public static function load_publications($page = 1, $filter_data = array())
        {
            $slug = isset($filter_data['terms']) ? $filter_data['terms'] : '';


            $limit      = 10;
            $start      = ($page - 1) * $limit;
            $args       = array(
                'post_type'      => 'publications',
                'posts_per_page' => $limit,
                'post_status '   => 'publish',
                'offset'         => $start,
                'order_by'       => 'date',
                'order'          => 'desc',
            );

            if (
                isset($filter_data['year']) && '' !== $filter_data['year']
            ) {
                $args['year'] = $filter_data['year'];
            }

            if (!empty($slug)) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'updates-categories',
                        'field' => 'slug',
                        'terms' => [$slug]
                    ]
                ];
            }


            $publications = new WP_Query($args);
            $total_record = $publications->found_posts;

            // var_dump($total_record);
?>
            <?php
            if ($publications->have_posts()) :
                while ($publications->have_posts()) :
                    $publications->the_post();
            ?>

                    <div class="">
                        <!-- code here -->
                    </div>

                <?php
                endwhile;
            else :
                ?>
                <div class="col-12 text-center pt-5 pb-5">No Results Found</div>
            <?php
            endif;
            wp_reset_postdata();

            /*load pagination section*/
            self::pagination_section($page, $total_record, $limit);
        }
        /**
         * Function to Load Pagination section
         *
         * @since 1.0
         * @static
         * @access public
         *
         * @param Integer $page Page number as integer.
         * @param Integer $total_record Total number of record as integer.
         * @param Integer $limit  Record per page as integer.
         * El id de la paginación en el js, es el id del contenedor de la función de load_news o load_publication.
         */
        public static function pagination_section($page = 1, $total_record = 0, $limit = 1)
        {
            $no_of_pages = ceil($total_record / $limit);

            if ($no_of_pages > 1) {
            ?>
                <div class="page-pagination" aria-label="page-navigation">
                    <ul class="pagination d-flex justify-content-center">
                        <?php
                        $range     = 4;
                        $init_page = $page - $range;
                        $last_page = $page + $range;

                        if ($init_page < 1) {
                            $last_page = $last_page + (1 - $init_page);
                            $init_page = 1;
                        }

                        if ($last_page > $no_of_pages) {
                            $init_page = $init_page - ($last_page - $no_of_pages);
                            $last_page = $no_of_pages;
                        }

                        for ($i = $init_page; $i <= $last_page; $i++) {
                            if ($i > 0 && $i <= $last_page) {
                                if (intval($i) === intval($page)) {
                        ?>
                                    <li class="page-item"><button class="pagination-button active">
                                            <?php echo esc_html($i); ?> </button>
                                    </li>
                                <?php } else {
                                ?>
                                    <li class="page-item"><button class="pagination-button" data-page="<?php echo esc_html($i); ?>"><?php echo esc_html($i) ?></button></li>

                                <?php
                                }

                                ?>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

<?php
            }
        }
    }

    Publications::init();
}
