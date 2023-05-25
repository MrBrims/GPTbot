<section style="margin-top:200px;margin-bottom:200px;">
  <div class="container">




    <?php
    $current_page = 1;
    $items_per_page = 3;

    $offset = $current_page * $items_per_page;



    $field_data = carbon_get_theme_option('card-a');
    $items_on_page = array_slice($field_data, $offset, $items_per_page);

    foreach ($items_on_page as $item) {
      echo $item['name-a'], ' ',  $item['sear-a'], '<br>';
    }

    if (count($field_data) > $offset + $items_per_page) {
      $next_page = $current_page + 1;
      echo '<button onclick="loadNextPage(' . $next_page . ')">Показать еще</button>';
    }


    // echo '<pre>';

    // print_r($first_five_items);
    // echo '</pre>';
    ?>







  </div>
</section>