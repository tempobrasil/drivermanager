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


    </div>
</div>

<?
template_getFooter();
?>