<?php

require_once 'lib/pokedexapi.php';
require 'class/class.pokemon.php';

//header("Content-type: text/xml");

/*function json_to_xml($json) {
    $serializer = new XML_Serializer();
    $obj = json_decode($json);

    if ($serializer->serialize($obj)) {
        return $serializer->getSerializedData();
    }
    else {
        return null;
    }
}*/

$url = 'https://pokeapi.co/api/v1/pokemon/';
$data = file_get_contents($url);


$json = json_decode($data, true);

//include("lib/Serializer.php");



//$xmldata = json_to_xml($data);
print_r($json['forms']);
echo $json['name'];
echo $json['weight'];

echo '<pre>';
print_r($json);

