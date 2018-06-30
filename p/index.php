<?php

    if(!isset($_GET['p']) && !isset($_GET['c']))
        header("location: ../");

    // Pegando dados do projeto
    // Casa iniciadora = Camara
    if($_GET['c'] == 'camara'){

        $url = "https://dadosabertos.camara.leg.br/api/v2/proposicoes/".$_GET['p'];
        $resultCamara = file_get_contents($url);
        $resultCamara = json_decode($resultCamara, true);
        $resultCamaraCount = count($resultCamara);

        // echo var_dump($resultCamara);

        $id = $resultCamara["dados"]["id"];
        $uri = $resultCamara["dados"]["uri"];
        $siglaTipo = $resultCamara["dados"]["siglaTipo"];
        $idTipo = $resultCamara["dados"]["idTipo"];
        $numero = $resultCamara["dados"]["numero"];
        $ano = $resultCamara["dados"]["ano"];
        $ementa = $resultCamara["dados"]["ementa"];
        $dataApresentacao = $resultCamara["dados"]["dataApresentacao"];
        $uriOrgaoNumerador = $resultCamara["dados"]["uriOrgaoNumerador"];
        $uriUltimoRelator = $resultCamara["dados"]["uriUltimoRelator"];
        $statusProposicao = $resultCamara["dados"]["statusProposicao"];
        $statusProposicaodataHora = $resultCamara["dados"]["statusProposicao"]["dataHora"];
        $statusProposicaosequencia = $resultCamara["dados"]["statusProposicao"]["sequencia"];
        $statusProposicaosiglaOrgao = $resultCamara["dados"]["statusProposicao"]["siglaOrgao"];
        $statusProposicaouriOrgao = $resultCamara["dados"]["statusProposicao"]["uriOrgao"];
        $statusProposicaoregime = $resultCamara["dados"]["statusProposicao"]["regime"];
        $statusProposicaodescricaoTramitacao = $resultCamara["dados"]["statusProposicao"]["descricaoTramitacao"];
        $statusProposicaoidTipoTramitacao = $resultCamara["dados"]["statusProposicao"]["idTipoTramitacao"];
        $statusProposicaodescricaoSituacao = $resultCamara["dados"]["statusProposicao"]["descricaoSituacao"];
        $statusProposicaoidSituacao = $resultCamara["dados"]["statusProposicao"]["idSituacao"];
        $statusProposicaodespacho = $resultCamara["dados"]["statusProposicao"]["despacho"];
        $statusProposicaourl = $resultCamara["dados"]["statusProposicao"]["url"];
        $uriAutores = $resultCamara["dados"]["uriAutores"];
        $descricaoTipo = $resultCamara["dados"]["descricaoTipo"];
        $ementaDetalhada = $resultCamara["dados"]["ementaDetalhada"];
        $keywords = $resultCamara["dados"]["keywords"]     ;
        $uriPropPrincipal = $resultCamara["dados"]["uriPropPrincipal"];
        $uriPropAnterior = $resultCamara["dados"]["uriPropAnterior"];
        $uriPropPosterior = $resultCamara["dados"]["uriPropPosterior"];
        $urlInteiroTeor = $resultCamara["dados"]["urlInteiroTeor"];
        $urnFinal = $resultCamara["dados"]["urnFinal"];
        $texto = $resultCamara["dados"]["texto"];
        $justificativa = $resultCamara["dados"]["justificativa"];


        // echo $resultCamara["dados"]["id"]."<br>";
        // echo $resultCamara["dados"]["uri"]."<br>";
        // echo $resultCamara["dados"]["siglaTipo"]."<br>";
        // echo $resultCamara["dados"]["idTipo"]."<br>";
        // echo $resultCamara["dados"]["numero"]."<br>";
        // echo $resultCamara["dados"]["ano"]."<br>";
        // echo $resultCamara["dados"]["ementa"]."<br>";
        // echo $resultCamara["dados"]["dataApresentacao"]."<br>";
        // echo $resultCamara["dados"]["uriOrgaoNumerador"]."<br>";
        // echo $resultCamara["dados"]["uriUltimoRelator"]."<br>";
        // // echo $resultCamara["dados"]["statusProposicao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["dataHora"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["sequencia"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["siglaOrgao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["uriOrgao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["regime"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["descricaoTramitacao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["idTipoTramitacao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["descricaoSituacao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["idSituacao"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["despacho"]."<br>";
        // echo $resultCamara["dados"]["statusProposicao"]["url"]."<br>";
        // echo $resultCamara["dados"]["uriAutores"]."<br>";
        // echo $resultCamara["dados"]["descricaoTipo"]."<br>";
        // echo $resultCamara["dados"]["ementaDetalhada"]."<br>";
        // echo $resultCamara["dados"]["keywords"]     ."<br>";
        // echo $resultCamara["dados"]["uriPropPrincipal"]."<br>";
        // echo $resultCamara["dados"]["uriPropAnterior"]."<br>";
        // echo $resultCamara["dados"]["uriPropPosterior"]."<br>";
        // echo $resultCamara["dados"]["urlInteiroTeor"]."<br>";
        // echo $resultCamara["dados"]["urnFinal"]."<br>";
        // echo $resultCamara["dados"]["texto"]."<br>";
        // echo $resultCamara["dados"]["justificativa"]."<br>";

        // exit();

    // Casa iniciadora = Senado
    }else if($_GET['c'] == 'senado'){

        // $url = "https://dadosabertos.camara.leg.br/api/v2/proposicoes/".$_GET['p'];
        $url = "http://legis.senado.leg.br/dadosabertos/materia/movimentacoes/".$_GET['p'].".json";
        $resultSenado = file_get_contents($url);
        $resultSenado = json_decode($resultSenado, true);
        $resultSenadoCount = count($resultSenado);


        // echo var_dump($resultSenado);
        // exit();


    }else{
        header("location: ../");
    }



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $siglaTipo." ".$numero."/".$ano;  ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="../src/css/main.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../src/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<a href="../" class="btn btn-flat" style="position: absolute; top:0;left:0;">Voltar</a>
<header class="ceu-mov center">
    <div class="row">
    <h1><?php echo $siglaTipo." ".$numero."/".$ano;  ?></h1>
    <p class='col s12 m6 offset-m3' style="
    font-size:  20px;
    font-weight:  bold;
    color:  #4a7cae;
"><?php echo $ementa;  ?></p>
    <small><?php echo $ementaDetalhada;  ?></small>
    <div class='col s12 m8 offset-m2'>
        <?php

        $tags = explode(", ", $resultCamara["dados"]["keywords"]);
        for($j=0;$j<count($tags);$j++){
            echo "<div class='chip truncate'>".$tags[$j]."</div>";
        }

        ?>
    </div>
    <div class='col s12 m8 offset-m2 center-align'>
    <a class="waves-effect waves-light btn modal-trigger z-depth-0" href="#detalhes" style="
    background-color:  transparent;
    color: #4a7cae;
    border:  solid 1px;
">Ver Detalhes</a>
    </div>

<!-- Modal Structure -->
<div id="detalhes" class="modal">
  <div class="modal-content">
    <h4>Detalhes deste projeto de lei</h4>
    <!-- <p>A bunch of text</p> -->
    <table>
    <?php

echo "<tr>
<th>Id</th>
<td>$id</td>
</tr>
<tr>
<th>uri</th>
<td>$uri</td>
</tr>
<tr>
<th>SiglaTipo</th>
<td>$siglaTipo</td>
</tr>
<tr>
<th>idTipo</th>
<td>$idTipo</td>
</tr>
<tr>
<th>Numero</th>
<td>$numero</td>
</tr>
<tr>
<th>ano</th>
<td>$ano</td>
</tr>
<tr>
<th>ementa</th>
<td>$ementa</td>
</tr>
<tr>
<th>dataApresentacao</th>
<td>$dataApresentacao</td>
</tr>
<tr>
<th>uriOrgaoNumerador</th>
<td>$uriOrgaoNumerador</td>
</tr>
<tr>
<th>uriUltimoRelator</th>
<td>$uriUltimoRelator</td>
</tr>
<tr>
<th>statusProposicaodataHora</th>
<td>$statusProposicaodataHora</td>
</tr>
<tr>
<th>statusProposicaosequencia</th>
<td>$statusProposicaosequencia</td>
</tr>
<tr>
<th>statusProposicaosiglaOrgao</th>
<td>$statusProposicaosiglaOrgao</td>
</tr>
<tr>
<th>statusProposicaouriOrgao</th>
<td>$statusProposicaouriOrgao</td>
</tr>
<tr>
<th>statusProposicaoregime</th>
<td>$statusProposicaoregime</td>
</tr>
<tr>
<th>statusProposicaodescricaoTramitacao</th>
<td>$statusProposicaodescricaoTramitacao</td>
</tr>
<tr>
<th>statusProposicaoidTipoTramitacao</th>
<td>$statusProposicaoidTipoTramitacao</td>
</tr>
<tr>
<th>statusProposicaodescricaoSituacao</th>
<td>$statusProposicaodescricaoSituacao</td>
</tr>
<tr>
<th>statusProposicaoidSituacao</th>
<td>$statusProposicaoidSituacao</td>
</tr>
<tr>
<th>statusProposicaodespacho</th>
<td>$statusProposicaodespacho</td>
</tr>
<tr>
<th>statusProposicaourl</th>
<td>$statusProposicaourl</td>
</tr>
<tr>
<th>Autores</th>
<td>$uriAutores</td>
</tr>
<tr>
<th>Descrição tipo</th>
<td>$descricaoTipo</td>
</tr>
<tr>
<th>Ementa Detalhada</th>
<td>$ementaDetalhada</td>
</tr>
<tr>
<th>keywords</th>
<td>$keywords</td>
</tr>
<tr>
<th>Principal</th>
<td>$uriPropPrincipal</td>
</tr>
<tr>
<th>Anterior</th>
<td>$uriPropAnterior</td>
</tr>
<tr>
<th>Posterior</th>
<td>$uriPropPosterior</td>
</tr>
<tr>
<th>Inteiro Teor</th>
<td>$urlInteiroTeor</td>
</tr>
<tr>
<th>Final:</th>
<td>$urnFinal</td>
</tr>
<tr>
<th>Texto:</th>
<td>$texto</td>
</tr>
<tr>
<th>Justificativa:</th>
<td>$justificativa</td>
</tr>";

?>
</table>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
  </div>
</div>


</div>
</header>


<!-- Passo a passo Tramitação -->
<section class="container">
<table class="striped" style="font-size: 12px; overflow-x: scroll;">
    <thead>
        <tr class='hide-on-med-and-down'>
            <th>#</th>
            <th>Data/hora</th>
            <th style="width: 250px;">Orgao</th>
            <th>Descrição</th>
            <th style="width: 300px;">Despacho</th>
            <th>Regime</th>
            <th>url</th>
        </tr>
    </thead>
    <tbody>

<?php

    $url = "https://dadosabertos.camara.leg.br/api/v2/proposicoes/".$_GET['p']."/tramitacoes";
    $resultTramitacoes = file_get_contents($url);
    $resultTramitacoes = json_decode($resultTramitacoes, true);
    $resultTramitacoesCount = count($resultTramitacoes);

    // var_dump($resultTramitacoesCount);
    // exit();

    for($i=0; $i<count($resultTramitacoes["dados"]); $i++){

       $dataHora = $resultTramitacoes["dados"][$i]["dataHora"];
       $sequencia = $resultTramitacoes["dados"][$i]["sequencia"];
       $siglaOrgao = $resultTramitacoes["dados"][$i]["siglaOrgao"];
       $uriOrgao = $resultTramitacoes["dados"][$i]["uriOrgao"];
       $regime = $resultTramitacoes["dados"][$i]["regime"];
       $descricaoTramitacao = $resultTramitacoes["dados"][$i]["descricaoTramitacao"];
       $idTipoTramitacao = $resultTramitacoes["dados"][$i]["idTipoTramitacao"];
       $descricaoSituacao = $resultTramitacoes["dados"][$i]["descricaoSituacao"];
       $idSituacao = $resultTramitacoes["dados"][$i]["idSituacao"];
       $despacho = $resultTramitacoes["dados"][$i]["despacho"];
       $url = $resultTramitacoes["dados"][$i]["url"];


       $orgao = file_get_contents($uriOrgao);
       $orgao = json_decode($orgao, true);

    //    echo var_dump($orgao);
    //    exit();

    



       $Orgaoid = $orgao["dados"]["id"];
       $Orgaouri = $orgao["dados"]["uri"];
       $Orgaosigla = $orgao["dados"]["sigla"];
       $Orgaonome = $orgao["dados"]["nome"];
       $Orgaoapelido = $orgao["dados"]["apelido"];
       $OrgaoidTipoOrgao = $orgao["dados"]["idTipoOrgao"];
       $OrgaotipoOrgao = $orgao["dados"]["tipoOrgao"];
       $OrgaodataInicio = $orgao["dados"]["dataInicio"];
       $OrgaodataInstalacao = $orgao["dados"]["dataInstalacao"];
       $OrgaodataFim = $orgao["dados"]["dataFim"];
       $OrgaodataFimOriginal = $orgao["dados"]["dataFimOriginal"];
       $Orgaocasa = $orgao["dados"]["casa"];
       $Orgaosala = $orgao["dados"]["sala"];
       $OrgaourlWebsite = $orgao["dados"]["urlWebsite"];

       $j = $i+1;

      echo "<tr class='hide-on-med-and-down'>
            <td>
                <a href='' class='btn-floating orange center' style='font-size:  20px;font-weight:  bold;' >
                    $j"."º
                </a>
            </td>
            <td>".date("d/m/Y h:i", strtotime($dataHora))."</td>
            <td>$Orgaonome - $OrgaotipoOrgao</td>
            <td>$descricaoTramitacao</td>
            <td>$despacho</td>
            <td>$regime</td>
            <td>";

            if(isset($url)){
                echo "<a href='$url' target='_blank'>
                <i class='material-icons'>attach_file</i>
            </a>";
            }
                
            echo "</td>
        </tr>";


    echo "<tr class='hide-on-large-only'>
        <td colspan='7'>
                <div class='row'>
                    <div class='col s12 center-align'>
                        <a href='' class='btn-floating orange center' style='font-size:  20px;font-weight:  bold;' >
                            $j"."º
                        </a>
                    </div>
                    <div class='col s12 center-align'>
                        <b>
                        $Orgaonome - $OrgaotipoOrgao <br>
                        ($descricaoTramitacao)
                        </b>
                    </div>
                    <div class='col s12 center-align'>
                        $despacho
                    </div>
                    <div class='col s12 left-align'>
                        <small>
                        $regime <br>
                        ".date("d/m/Y h:i", strtotime($dataHora))."
                        </small>";

                        if(isset($url)){
                            echo "<a href='$url' target='_blank' class='right'>
                            <i class='material-icons'>attach_file</i>
                        </a>";
                        }

                   echo" </div>
                </div>
        </td>
    </tr>";
    }

?>


        </tbody>
</table>
</section>



<script type="text/javascript" src="../src/js/jquery.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../src/js/materialize.min.js"></script>
<script src="../src/js/main.js"></script>
</body>
</html>