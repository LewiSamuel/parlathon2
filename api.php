<?php

// $request = new http();
// $request->setUrl('https://dadosabertos.camara.leg.br/api/v2/referencias/tiposEvento');
// $request->setMethod(HTTP_METH_GET);

// $request->setHeaders(array(
//   'Postman-Token' => '96d0e8dc-7d2c-cf16-0cab-8e53642f3df1',
//   'Cache-Control' => 'no-cache'
// ));

// try {
//   $response = $request->send();

//   echo $response->getBody();
// } catch (HttpException $ex) {
//   echo $ex;
// }


$url = 'https://dadosabertos.camara.leg.br/api/v2/referencias/tiposEvento';
// $data = array(
//   'to' => $emailToSend,
//   'subject' => $assunto,
//   'message' => $message,
//   'backTo' => $backTo,
//   'headers' => $headers);

// $data = array();
// $options = array(
//   'http' => array(
//     'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//     'method'  => 'GET',
//     'content' => http_build_query($data),
//   )
// );
// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);

$url = "https://dadosabertos.camara.leg.br/api/v2/proposicoes?ordem=ASC&ordenarPor=id";
// $url ="http://legis.senado.leg.br/dadosabertos/materia/tramitando?data=20140701";
$result = file_get_contents($url);
$result = json_decode($result, true);
// echo var_dump($result);

for($i=0; $i<count($result["dados"]); $i++){
//     echo $result["dados"][$i]["id"]."<br>";;
//     echo $result["dados"][$i]["sigla"]."<br>";;
//     echo $result["dados"][$i]["nome"]."<br>";;
//     echo $result["dados"][$i]["descricao"]."<br>";;
//     echo "<br>";

$prop_id          =       $result["dados"][$i]["id"];
$prop_uri         =       $result["dados"][$i]["uri"];
$prop_siglaTipo   =       $result["dados"][$i]["siglaTipo"];
$prop_idTipo      =       $result["dados"][$i]["idTipo"];
$prop_numero      =       $result["dados"][$i]["numero"];
$prop_ano         =       $result["dados"][$i]["ano"];
$prop_ementa      =       $result["dados"][$i]["ementa"];


echo $prop_id." | ";
echo $prop_uri." | ";
echo $prop_siglaTipo." | ";
echo $prop_idTipo." | ";
echo $prop_numero." | ";
echo $prop_ano." | ";
echo $prop_ementa." | ";
echo "<br>";

$result2 = file_get_contents($prop_uri);
$result2 = json_decode($result2, true);
// echo var_dump($result2);

for($j=0; $j<count($result2["dados"]); $j++){
    echo "<b>id:</b>".$result2["dados"]["id"]."<br>";
    echo "<b>uri:</b>".$result2["dados"]["uri"]."<br>";
    echo "<b>siglaTipo:</b>".$result2["dados"]["siglaTipo"]."<br>";
    echo "<b>idTipo:</b>".$result2["dados"]["idTipo"]."<br>";
    echo "<b>numero:</b>".$result2["dados"]["numero"]."<br>";
    echo "<b>ano:</b>".$result2["dados"]["ano"]."<br>";
    echo "<b>ementa:</b>".$result2["dados"]["ementa"]."<br>";
    echo "<b>dataApresentacao:</b>".$result2["dados"]["dataApresentacao"]."<br>";
    echo "<b>uriOrgaoNumerador:</b>".$result2["dados"]["uriOrgaoNumerador"]."<br>";
    echo "<b>uriUltimoRelator:</b>".$result2["dados"]["uriUltimoRelator"]."<br>";
        echo "<b>statusProposicao - dataHora:</b>".$result2["dados"]["statusProposicao"]["dataHora"]."<br>";
        echo "<b>statusProposicao - sequencia:</b>".$result2["dados"]["statusProposicao"]["sequencia"]."<br>";
        echo "<b>statusProposicao - siglaOrgao:</b>".$result2["dados"]["statusProposicao"]["siglaOrgao"]."<br>";
        echo "<b>statusProposicao - uriOrgao:</b>".$result2["dados"]["statusProposicao"]["uriOrgao"]."<br>";
        echo "<b>statusProposicao - regime:</b>".$result2["dados"]["statusProposicao"]["regime"]."<br>";
        echo "<b>statusProposicao - descricaoTramitacao:</b>".$result2["dados"]["statusProposicao"]["descricaoTramitacao"]."<br>";
        echo "<b>statusProposicao - idTipoTramitacao:</b>".$result2["dados"]["statusProposicao"]["idTipoTramitacao"]."<br>";
        echo "<b>statusProposicao - descricaoSituacao:</b>".$result2["dados"]["statusProposicao"]["descricaoSituacao"]."<br>";
        echo "<b>statusProposicao - idSituacao:</b>".$result2["dados"]["statusProposicao"]["idSituacao"]."<br>";
        echo "<b>statusProposicao - despacho:</b>".$result2["dados"]["statusProposicao"]["despacho"]."<br>";
        echo "<b>statusProposicao - url:</b>".$result2["dados"]["statusProposicao"]["url"]."<br>";
    echo "<b>uriAutores:</b>".$result2["dados"]["uriAutores"]."<br>";
    echo "<b>descricaoTipo:</b>".$result2["dados"]["descricaoTipo"]."<br>";
    echo "<b>ementaDetalhada:</b>".$result2["dados"]["ementaDetalhada"]."<br>";
    echo "<b>keywords:</b>".$result2["dados"]["keywords"]."<br>";
    echo "<b>uriPropPrincipal:</b>".$result2["dados"]["uriPropPrincipal"]."<br>";
    echo "<b>uriPropAnterior:</b>".$result2["dados"]["uriPropAnterior"]."<br>";
    echo "<b>uriPropPosterior:</b>".$result2["dados"]["uriPropPosterior"]."<br>";
    echo "<b>urlInteiroTeor:</b>".$result2["dados"]["urlInteiroTeor"]."<br>";
    echo "<b>urnFinal:</b>".$result2["dados"]["urnFinal"]."<br>";
    echo "<b>texto:</b>".$result2["dados"]["texto"]."<br>";
    echo "<b>justificativa:</b>".$result2["dados"]["justificativa"]."<br>";
    // echo $result2["links"][0]["rel"]."<br>";
    // echo $result2["links"][0]["href"]."<br>";
    echo "<hr>";
}


}


?>