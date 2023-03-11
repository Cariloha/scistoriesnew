<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'crb_quotes_cpt_fields');
function crb_quotes_cpt_fields()
{
    Container::make('post_meta', __('Quotes Content'))
        ->where('post_type', '=', 'quotes')
        ->add_fields(array(
            Field::make('textarea', 'crb_quote', __('Quote')),
            Field::make('textarea', 'crb_affiliations', __('Affiliations')),
            Field::make('image', 'crb_affiliations_logo', __('Logo')),
        ));
}

add_filter('crb_media_buttons_html', function ($html, $field_name) {
    if ($field_name === 'crb_affiliations') {
        return;
    }
    return $html;
}, 10, 2);
