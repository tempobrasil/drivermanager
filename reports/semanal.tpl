{{TEMPLATE}}
<content>

  <p>%%CARRO%% - Placa %%CARRO_PLACA%%</p>
  <hr>

  <h2>Ganhos</h2>
  <p>Confira abaixo o relatório semanal das corridas feitas pelos aplicativos.</p>

  <table width="800" border="0" cellspacing="5">
    <thead>
    <tr>
      <th  align="center" scope="col">Semana</th>
      <th width="80" align="center" scope="col">Serviço</th>
      <th width="80" align="center" scope="col">Kms</th>
      <th width="100" align="center" scope="col">Dias Trab.</th>
      <th width="150" align="center" scope="col">Tempo Online</th>
      <th width="80" align="center" scope="col">Corridas</th>
      <th width="120" align="right" scope="col">Ganho</th>
    </tr>
    </thead>
    %%SEMANAS_LISTA_FOOTER%%

    %%SEMANAS_LISTA%%

  </table>

  <h2>Despesas</h2>
  <p>Confira abaixo detalhamento do custo da sua semana.</p>
  <table width="800" border="0" cellspacing="5">
    <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th align="center" scope="col">Observação</th>
      <th width="30" align="right" scope="col">Perc.</th>
      <th align="right" scope="col">Valor</th>

    </tr>
    </thead>
    <tr>
      <td>Ganhos</td>
      <td align="center">&nbsp;</td>
      <td align="right"></td>
      <td align="right">R$ %%DESPESA_GANHOS%%</td>
    </tr>
    <tr>
      <td>Despesas Extras</td>
      <td align="center">&nbsp;</td>
      <td align="right">%%DESPESA_EXTRAS_PERC%%</td>
      <td align="right"> (-) R$ %%DESPESA_EXTRAS%%</td>
    </tr>
    <tr>
      <td>Combustível <sup>1</sup></td>
      <td align="center">%%DESPESA_COMBUSTIVEL_LITROS%% lts</td>
      <td align="right">%%DESPESA_COMBUSTIVEL_PERC%%</td>
      <td align="right"> (-) R$ %%DESPESA_COMBUSTIVEL%%</td>
    </tr>
    <tr>
      <td>Documentação do Carro <sup>2</sup></td>
      <td align="center">&nbsp;</td>
      <td align="right">%%DESPESA_DOCUMENTACAO_PERC%%</td>
      <td align="right"> (-) R$ %%DESPESA_DOCUMENTACAO%%</td>
    </tr>
    <tr>
      <td>Seguro do Carro <sup>2</sup></td>
      <td align="center"></td>
      <td align="right">%%DESPESA_SEGURO_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_SEGURO%%</td>
    </tr>
    <tr>
      <td>Lavação do Carro <sup>2</sup></td>
      <td align="center">%%DESPESA_LAVACAO_FREQUENCIA%%</td>
      <td align="right">%%DESPESA_LAVACAO_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_LAVACAO%%</td>
    </tr>
    <tr>
      <td>Depreciação do carro <sup>2</sup></td>
      <td align="center">%%DESPESA_DEPRECIACAO_TAXA%% a.a.</td>
      <td align="right">%%DESPESA_DEPRECIACAO_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_DEPRECIACAO%%</td>
    </tr>
    <tr>
      <td>Óleo + Filtro <sup>1</sup></td>
      <td align="center">&nbsp;</td>
      <td align="right">%%DESPESA_OLEO_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_OLEO%%</td>
    </tr>
    <tr>
      <td>Pneus <sup>1</sup></td>
      <td align="center">o jogo</td>
      <td align="right">%%DESPESA_PNEUS_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_PNEUS%%</td>
    </tr>
    <tr>
      <td>Pastilhas de Freio <sup>1</sup></td>
      <td align="center">o jogo</td>
      <td align="right">%%DESPESA_PASTILHAS_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_PASTILHAS%%</td>
    </tr>
    <tr>
      <td>Discos de Freio <sup>1</sup></td>
      <td align="center">o jogo</td>
      <td align="right">%%DESPESA_DISCOS_PERC%%</td>
      <td align="right">(-) R$ %%DESPESA_DISCOS%%</td>
    </tr>
    <tfoot>
    <tr>
      <td>Saldo da Semana (Lucro do Motorista)</td>
      <td align="center">&nbsp;</td>
      <td align="right">%%SALDO_SEMANA_PERC%%</td>
      <td align="right">R$ %%SALDO_SEMANA%%</td>
    </tr>
    </tfoot>
  </table>
  <p class="small">
    <sup>1</sup> Valor fracionado por quilômetro rodado. / <sup>2</sup> Valor fracionado por dia trabalhado.
  </p>

  <hr>

  <h2>Resumo da semana</h2>

  <p>Provisão do carro: R$%%PROVISAO%%</p>
  <p style="font-size: 18px;">Lucro do motorista: <strong>R$ %%LUCRO%%</strong></p>

  <hr>



  <p class="small"> * <u>Lucro do motorista</u>, é o valor a qualor que o motorista considera como sua remuneração.</p>
  <p class="small"> * <u>Provisão do carro</u> é o valor que o motorista deve guardar para manter seu negócio funcionando.</p>


</content>