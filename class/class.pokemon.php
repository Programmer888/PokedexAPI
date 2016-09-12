<?php
class Pokemon
{
    public $ID;
    public $Name;
    public $Description;
    public $Weight;

    public static function FromJSON($data)
    {
        $pokemon = new Pokemon();

        $json = json_decode($data, true);

        $pokemon->Name = $json['name'];
        $pokemon->Weight = $json['weight'];


        //$pokemon->Name = $data->value;
        /*$xml = new XMLReader();
        $xml->XML($data);
        $element = "";

        $inForms = false;
        $inTypes = false;

        while($xml->read()) {


            //echo $element . '<br>';

            if ($xml->nodeType == XMLReader::TEXT)
            {
                if ($element == "name" && $inForms) {
                    $pokemon->Name = $xml->value;
                }
                if ($element == "name" && $inTypes) {
                    //$pokemon->Types[] = $xml->value;
                }
            }

            $element = $xml->name;

            if ($xml->nodeType == XMLReader::ELEMENT) {
                if ($element == "forms") {
                    $inForms = true;
                }
                if ($element == "types") {
                    $inTypes = true;
                }

            }


            if ($xml->nodeType == XMLReader::END_ELEMENT) {
                if ($element == "forms") {
                    $inForms = false;
                }
                if ($element == "types") {
                    $inTypes = true;
                }
            }
        }*/

        return $pokemon;
    }
}