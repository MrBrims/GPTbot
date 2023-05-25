<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class BasicMeta
{
  public function __construct()
  {
    add_action('carbon_fields_register_fields', [$this, 'basicFields']);
  }

  public function basicFields()
  {
    $basic_options_container = Container::make('theme_options', __('Общие настройки'))
      ->add_tab('Рейтинг', [
        Field::make('text', 'rating-google', 'Рейтинг Google')
          ->set_width(30),
        Field::make('text', 'rating-praven', 'Рейтинг Praven')
          ->set_width(30),
        Field::make('text', 'rating-trustami', 'Рейтинг Trustami')
          ->set_width(30),
      ])
      ->add_tab('Скрипты', [
        Field::make('header_scripts', 'crb_header_script', __('Скрипты в header')),
        Field::make('footer_scripts', 'crb_footer_script', __('Скрипты в footer')),
      ])
      ->add_tab('Авторы', [
        Field::make('complex', 'card-a', 'Карточки авторов')
          ->setup_labels(['singular_name' => 'что добавить'])
          ->set_layout('tabbed-horizontal')
          ->add_fields([
            Field::make('text', 'name-a', 'Имя')
              ->set_width(50),
            Field::make('text', 'sear-a', 'Фамилия')
              ->set_width(50),
          ]),
      ]);
  }
}

new BasicMeta();
