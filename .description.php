<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    "NAME"          =>  GetMessage('JL_NAME'),
    "DESCRIPTION"   =>  "",
    "ICON"          =>  "/images/icon.gif",
    "SORT"          =>  10,
    "CACHE_PATH"    =>  "Y",
    "PATH"          =>  array(
        "ID"    =>  "dd",
        "NAME"  =>  GetMessage('JL_NAME_2'),
        "CHILD" =>  array(
            'ID'    =>  'jenkins',
            'NAME'  =>  GetMessage('JL_NAME_3'),
        ),
    ),
    "COMPLEX"       => "N",
);