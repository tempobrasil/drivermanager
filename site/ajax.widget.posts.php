<?
//Carrega biblioteca do Wordpress
require('../blog/wp-load.php' );

//Carrega biblioteca do Sistema
require('../includes/autoload.php' );

//Pega 5 ultimos posts
$recent = new WP_Query("showposts=2");
while($recent->have_posts()) {
  $recent->the_post();

  $dataPub = get_the_date('Y-m-d H:i:s');

  $data = new girafaDate($dataPub, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);
  ?>
  <li>
    <article>
      <h2 class="nospace font-x1"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h2>
      <time class="font-xs block btmspace-10" datetime="<?= $data->GetDate('Y-m-d'); ?>"><?= $data->GetDayOfWeekLong() . ', ' . $data->GetFullDateForLong() ?></time>
      <!--<p class="nospace"><?= the_excerpt(); ?></p>-->
    </article>
  </li>
<?
}
?>
