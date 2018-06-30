<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trilha Legislativa</title>
    <link rel="stylesheet" type="text/css" media="screen" href="src/css/main.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="src/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<header class="ceu-mov center">
    <h1>Trilha <span style="color:white">Legislativa</span></h1>
    <div class="row">
        <form id="pesquisa" class="input-field col s12 m8 offset-m2" method="GET">
            <i class="material-icons prefix" style="right: 0; font-size: 1.7rem; line-height: 1.5;" onclick="$('#pesquisa').submit();">search</i>
            <input id="projectname" type="text" name="s" <?php if(isset($_GET['s'])) echo "value='".$_GET['s']."'"; ?>>
            <label for="projectname">Pesquise aqui</label>
        </form>
    </div>
</header>
<?php

//  Extrair Dados da Camara
$url = "https://dadosabertos.camara.leg.br/api/v2/proposicoes?ordem=ASC&ordenarPor=id";
$resultCamara = file_get_contents($url);
$resultCamara = json_decode($resultCamara, true);
$resultCamaraCount = count($resultCamara);
// echo var_dump($resultCamara);
// exit();

//  Extrair Dados do Senado
$url = "http://legis.senado.leg.br/dadosabertos/materia/tramitando.json?data=".date("Ymd", strtotime("-30 day"));
$resultSenado = file_get_contents($url);
$resultSenado = json_decode($resultSenado, true);
$resultSenadoCount = count($resultSenado);
// echo var_dump($resultSenado);
// exit();

?>
<section class="container">
<div class="row">
    <div class="col s12">
        <ul class="tabs transparent">
            <li class="tab col s3"><a class="active" href="#test1">Camara</a></li>
            <li class="tab col s3"><a href="#test2">Senado</a></li>
        </ul>
    </div>
    <div id="test1" class="col s12">
        <small>Casa iniciadora Câmara</small>
        <br>
        <?php

        $casa = "camara";

        for($i=0; $i<count($resultCamara["dados"]); $i++){

            $prop_id          =       $resultCamara["dados"][$i]["id"];
            $prop_uri         =       $resultCamara["dados"][$i]["uri"];
            $prop_siglaTipo   =       $resultCamara["dados"][$i]["siglaTipo"];
            $prop_idTipo      =       $resultCamara["dados"][$i]["idTipo"];
            $prop_numero      =       $resultCamara["dados"][$i]["numero"];
            $prop_ano         =       $resultCamara["dados"][$i]["ano"];
            $prop_ementa      =       $resultCamara["dados"][$i]["ementa"];

            $result2 = file_get_contents($prop_uri);
            $result2 = json_decode($result2, true);
            // echo var_dump($result2);

            include "components/prop.phtml";
        }

        ?>
    </div>
    <div id="test2" class="col s12">
        <small>Casa iniciadora Senado</small>
        <br>
        <?php

        $casa = "senado";

        for($i=0; $i<count($resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"]); $i++){

            $prop_id = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["CodigoMateria"];
            $prop_siglaCasa = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["SiglaCasaIdentificacaoMateria"];
            $prop_nomeCasa = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["NomeCasaIdentificacaoMateria"];
            $prop_siglaTipo = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["SiglaSubtipoMateria"];
            $prop_descricao = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["DescricaoSubtipoMateria"];
            $prop_numero = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["NumeroMateria"];
            $prop_ano = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["AnoMateria"];
            $prop_tramitando = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["IdentificacaoMateria"]["IndicadorTramitando"];
            $prop_lastUp = $resultSenado["ListaMateriasTramitando"]["Materias"]["Materia"][$i]["DataUltimaAtualizacao"];

            // echo "<br>";
            // echo $prop_id." | ".$prop_siglaCasa." | ".$prop_nomeCasa." | ".$prop_siglaSubMateria." | ".$prop_descricao." | ".$prop_numero." | ".$prop_ano." | ".$prop_tramitando." | ".$prop_lastUp;
            // echo "<br>";

            // $url2 = "http://legis.senado.leg.br/dadosabertos/materia/".$prop_id.".json";
            // $result2 = file_get_contents($url2);
            // $result2 = json_decode($result2, true);

            // echo var_dump($result2);
            // exit();

            include "components/prop.phtml";

            }

        ?>
    </div>
</div>
</section>

<footer>
    
</footer>

<script type="text/javascript" src="src/js/jquery.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="src/js/materialize.min.js"></script>
<script src="src/js/main.js"></script>
</body>
</html>