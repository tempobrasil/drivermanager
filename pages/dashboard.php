<?
$login->verify();

set_config('TITLE', 'Painel');
template_getHeader();
?>

<div class="wrapper wrapper-content">



    <div class="row">


        <div class="col-lg-4">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Médias de Despesas</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Documentação Anual <small>/ dia</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_documentacao_dia(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Seguro Anual (completo) <small>/ dia</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_seguro_dia(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Lavação Completa <small>/ dia</small></td>
                                    <td> <span class="label label-default">R$  <?= number_format(carro_media_lavacao_dia(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Óleo e Filtro <small>/ km</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_oleo_km(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Pastilhas de Freio <small>/ km</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_pastilhas_km(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Discos de Freio <small>/ km</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_discos_km(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Jogo de Pneus <small>/ km</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_pneus_km(), 3, ',', '.')?></span></td>
                                </tr>

                                <tr>
                                    <td>Depreciação <small>/ dia</small></td>
                                    <td> <span class="label label-default">R$ <?= number_format(carro_media_depreciacao_dia(), 3, ',', '.')?></span></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-lg-4 widget-blog">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Últimas do Blog</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">

                        <?
                        $posts = blog_getPosts();
                        //print_r($posts);exit;
                        for($i = 0; ($i < 3 & $i < count($posts)); $i++){

                            $post = $posts[$i];

                            $dataPub = strtotime($post->pubDate);
                            $data = new girafaDate(date('Y-m-d H:i:s', $dataPub), ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);
                            ?>
                            <div class="feed-element">
                                <div>
                                    <a href="<?= $post->link; ?>" target="_blank">
                                    <div class="thumb" style="background-image: url(http://localhost/github/driverup/blog/wp-content/uploads/2017/04/driverup-blog-topo-750x410.jpg);"></div>
                                    <small class="pull-right text-navy">há <?= tempo_corrido($post->pubDate); ?></small>
                                    <strong class="title"><?= $post->title; ?></strong>

                                    <div><?= $post->description; ?></div>
                                    <small class="text-muted"><?= $data->GetDayOfWeekLong() . ', ' .  $data->GetFullDateForLong() ?></small>
                                    </a>
                                </div>
                            </div>
                        <?
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?
template_getFooter();
?>