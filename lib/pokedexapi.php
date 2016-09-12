<?php

include("lib/Serializer.php");
//require '../class/class.pokemon.php';


class PokeAPI
{
    public $baseURL = "";

    public function __construct($url)
    {
        $this->baseURL = $url;
    }

    public function pokemon($lookUp)
    {
        $url = $this->baseURL.'pokemon/'.$lookUp;
        $json = file_get_contents($url);
        //$xmldata = $this->json_to_xml($json);


        $pokemon = Pokemon::FromJSON($json);
        return $pokemon;
    }

    public function json_to_xml($json) {

        $serializer = new XML_Serializer();
        $obj = json_decode($json);

        if ($serializer->serialize($obj)) {
            return $serializer->getSerializedData();
        }
        else {
            return null;
        }
    }
}