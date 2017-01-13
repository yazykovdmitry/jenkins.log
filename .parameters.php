<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//формирование массива параметров
$arComponentParameters = array(
    'GROUPS' => array(
    ),
    'PARAMETERS' => array(
        'JENKINS_JSON_URL'   =>  array(
            'PARENT'    =>  'BASE',
            'NAME'      =>  GetMessage('JENKINS_JSON_URL'),
            'TYPE'      =>  'STRING',
        ),
        'SHOW_DISABLED' =>  array(
            'PARENT'    =>  'BASE',
            'NAME'      =>  GetMessage('SHOW_DISABLED'),
            'TYPE'      =>  'CHECKBOX',
        )
    ),
);
?>