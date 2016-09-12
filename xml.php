<?php

require_once 'lib/pokedexapi.php';
require 'class/class.pokemon.php';

header("Content-type: text/xml");

function json_to_xml($json) {
    $serializer = new XML_Serializer();
    $obj = json_decode($json);

    if ($serializer->serialize($obj)) {
        return $serializer->getSerializedData();
    }
    else {
        return null;
    }
}

$api = new PokeAPI('https://pokeapi.co/api/v2/');

$data = $api->pokemon('1');

include("lib/Serializer.php");



$xmldata = json_to_xml($data);

echo $xmldata;
