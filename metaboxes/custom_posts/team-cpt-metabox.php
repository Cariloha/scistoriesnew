<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'crb_team_cpt_fields');
function crb_team_cpt_fields()
{
    Container::make('post_meta', __('Team Settings'))
        ->where('post_type', '=', 'team')
        ->add_fields(array(
            Field::make('text', 'crb_job_title', __('Job title')),
            Field::make('text', 'crb_affiliations', __('Affiliations')),
            Field::make('text', 'crb_email', __('Email')),
        ));
}
