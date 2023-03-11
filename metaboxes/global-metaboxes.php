<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_global_theme_options');
function crb_global_theme_options()
{
    Container::make('post_meta', 'Hero Settings')
        ->where('post_type', '=', 'page')
    ->add_fields(array(
        Field::make('image', 'crb_hero_image', 'Hero image'),
        Field::make('text', 'crb_hero_title', 'Hero title'),
        ));
}
