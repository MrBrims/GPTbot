<?php
/*
Template Name: Diplomarbeit
*/


// Шапка
get_header();

// Главный экран
get_template_part('template-parts/sections/hero');

// Секция Детали (Details)
if (!empty(carbon_get_post_meta(get_the_ID(), 'details_show'))) {
  get_template_part('template-parts/sections/details');
}

// Секция Гарантии (Unsere Garantien)
if (!empty(carbon_get_post_meta(get_the_ID(), 'guarant_show'))) {
  get_template_part('template-parts/sections/guarant');
}

// Секция Как мы работаем (So arbeiten wir)
if (!empty(carbon_get_post_meta(get_the_ID(), 'how-work_show'))) {
  get_template_part('template-parts/sections/how-work');
}

// Секция Услуги (Unsere Fachbereiche)
if (!empty(carbon_get_post_meta(get_the_ID(), 'services_show'))) {
  get_template_part('template-parts/sections/services');
}

// Секция с темами работы
if (!empty(carbon_get_post_meta(get_the_ID(), 'additional_show'))) {
  get_template_part('template-parts/sections/additional');
}

// Секция Авторы (Unsere Autoren)
if (!empty(carbon_get_post_meta(get_the_ID(), 'authors_show'))) {
  get_template_part('template-parts/sections/authors');
}

// Секция с полной формой
if (!empty(carbon_get_post_meta(get_the_ID(), 'message_show'))) {
  get_template_part('template-parts/sections/message');
}

// Секция с оферами (Wir bieten folgende Unterstützung für Studentinnen und Studenten)
if (!empty(carbon_get_post_meta(get_the_ID(), 'offer_show'))) {
  get_template_part('template-parts/sections/offer');
}

// Секция с Прайсом (Price)
if (!empty(carbon_get_post_meta(get_the_ID(), 'price_show'))) {
  get_template_part('template-parts/sections/price');
}

// Секция с FAQ
if (!empty(carbon_get_post_meta(get_the_ID(), 'faq_show'))) {
  get_template_part('template-parts/sections/faq');
}

// Секция с отзывами (Bewertungen)
if (!empty(carbon_get_post_meta(get_the_ID(), 'reviews_show'))) {
  get_template_part('template-parts/sections/reviews');
}

// Секция со способами оплаты (Bezahlung)
if (!empty(carbon_get_post_meta(get_the_ID(), 'payments_show'))) {
  get_template_part('template-parts/sections/payments');
}

get_template_part('template-parts/blocks/popup-ok');
get_template_part('template-parts/blocks/popup-form');

// Подвал
get_footer();