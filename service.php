<?php
require 'lib/nusoap/nusoap.php';
require 'lib/pokedexapi.php';
require 'class/class.pokemon.php';
//require 'class/Account.php';

$namespace = "Pokedex";
// create a new soap server
$server = new soap_server();
// configure our WSDL
$server->configureWSDL("Pokedex");
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;
// register our WebMethod



$server->wsdl->addComplexType(
    'Pokemon',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Name' => array('name'=>'Name','type'=>'xsd:string'),
        'Weight' => array('name'=>'Weight','type'=>'xsd:string')
    )
);

GetPokemon('1');

/*$server->wsdl->addComplexType(
    'AccountArray',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:AccountArray')),
    'tns:Account'
);*/

/*$server->register(
    'GetAllAccounts',
    array(),
    array('return'=>'tns:AccountArray'),
    $namespace,
    false,
    'rpc',
    false,
    'Get all accounts');*/

function GetPokemon($id)
{
    $api = new PokeAPI('https://pokeapi.co/api/v2/');
    $pokemon = $api->pokemon($id);
    return $pokemon;
}

$server->register(
    'GetPokemon',
    array('ID'=>"xsd:string"),
    array('return'=>'tns:Pokemon'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Get Pokemon by id');





// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
    ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);
exit();

