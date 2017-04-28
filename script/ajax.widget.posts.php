<?
//Carrega biblioteca do Wordpress
require('../blog/wp-load.php' );

//Carrega biblioteca do Sistema
require('../includes/autoload.php' );

//Pega 5 ultimos posts
$recent = new WP_Query("showposts=5");
while($recent->have_posts()) {
  $recent->the_post();

  $dataPub = get_the_date('Y-m-d H:i:s');

  $data = new girafaDate($dataPub, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);
  ?>
    <div>
      <a href="<?php the_permalink(); ?>" target="_blank">
        <div class="thumb"
             style="background-image: url('<?= the_post_thumbnail_url(); ?>');"></div>
        <strong class="title"><?php the_title(); ?></strong>

        <div><?= the_excerpt(); ?></div>
        <small class="pull-right text-navy">há <?=  tempo_corrido($dataPub); ?></small>
        <small class="text-muted"><?= $data->GetDayOfWeekLong() . ', ' . $data->GetFullDateForLong() ?></small>
      </a>
    </div>
<?
}
?>
