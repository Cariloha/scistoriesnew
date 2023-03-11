<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'crb_home_page');
function crb_home_page()
{
    Container::make('post_meta', __('Home Content'))
        ->where('post_id', '=', SciStoriesPage::page_get_id('home'))
        ->add_fields(array(
            Field::make('complex', 'crb_ss_illustration', 'Illustration')
                ->add_fields(array(
                    Field::make('image', 'crb_illustration_img', __('Img')),
                    Field::make('complex', 'crb_illustration_descriptions_list', __('List of descriptions'))
                        ->add_fields(array(
                            Field::make('text', 'crb_illustration_description', __('List item'))
                        ))
                )),
            Field::make('complex', 'crb_ss_design', 'Design')
                ->add_fields(array(
                    Field::make('image', 'crb_design_img', __('Img')),
                    Field::make('complex', 'crb_design_descriptions_list', __('List of descriptions'))
                        ->add_fields(array(
                            Field::make('text', 'crb_design_description', __('List item'))
                        ))
                )),
            Field::make('complex', 'crb_ss_technology', 'Technology')
                ->add_fields(array(
                    Field::make('image', 'crb_technology_img', __('Img')),
                    Field::make('complex', 'crb_technology_descriptions_list', __('List of descriptions'))
                        ->add_fields(array(
                            Field::make('text', 'crb_technology_description', __('List item'))
                        ))
                )),
            Field::make('complex', 'crb_ss_marketing', 'Marketing')
                ->add_fields(array(
                    Field::make('image', 'crb_marketing_img', __('Img')),
                    Field::make('complex', 'crb_marketing_descriptions_list', __('List of descriptions'))
                        ->add_fields(array(
                            Field::make('text', 'crb_marketing_description', __('List item'))
                        ))
                )),
        ))->add_tab(__('Working with SciStories'), array(
            Field::make('complex', 'crb_ss_steps', 'Working with SciStories')
                ->add_fields(array(
                    Field::make('image', 'crb_steps_img', __('Image')),
                    Field::make('text', 'crb_steps_title', __('Title')),
                    Field::make('text', 'crb_steps_text', __('Text'))
                )),
        ))->add_tab(__('SciStories Clients'), array(
            Field::make('complex', 'crb_ss_clients_bio', 'Biotech')
                ->add_fields(array(
                    Field::make('image', 'crb_bio_clients_logo', __('Logo')),
                    Field::make('text', 'crb_bio_clients_url', __('URL'))
                        ->set_help_text('Add complete URL, e.g. https://pubmed.ncbi.nlm.nih.gov')
                )),
            Field::make('complex', 'crb_ss_clients_nonprofit', 'Nonprofit')
                ->add_fields(array(
                    Field::make('image', 'crb_nonprofit_clients_logo', __('Logo')),
                    Field::make('text', 'crb_nonprofit_clients_url', __('URL'))
                        ->set_help_text('Add complete URL, e.g. https://pubmed.ncbi.nlm.nih.gov')
                )),
            Field::make('complex', 'crb_ss_clients_research', 'Research Universities')
                ->add_fields(array(
                    Field::make('image', 'crb_research_clients_logo', __('Logo')),
                    Field::make('text', 'crb_research_clients_url', __('URL'))
                        ->set_help_text('Add complete URL, e.g. https://pubmed.ncbi.nlm.nih.gov')
                ))
        ))->add_tab(__('Quote'), array(
            Field::make('association', 'crb_chosen_quotes', __('Select quote'))
                ->set_max(1)
                ->set_types(array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'quotes',
                    )
                ))
        ));
}
