<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//формирование массива параметров
$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "JENKINS_JSON_URL"   =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Ссылка на json файлы Jenkins",
            "TYPE"      =>  "STRING",
        ),
        'SHOW_DISABLED' =>  array(
            'PARENT'    =>  'BASE',
            'NAME'      =>  'Показывать не активные сборки',
            'TYPE'      =>  'CHECKBOX',
        )
    ),
);
?>