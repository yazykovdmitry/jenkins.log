<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (empty($arParams['JENKINS_JSON_URL'])) {
    ShowMessage('Укажите путь до json файла');
    return false;
}

//  Получние данных
$serverData = file_get_contents($arParams['JENKINS_JSON_URL']);

if ($serverData === false) {
    ShowMessage('Данные не получены');
    return false;
}

//  Преобразуем json
$arrayData = json_decode($serverData);

//  Преобразуем данные для удобства использования
foreach ($arrayData->jobs as $job) {
    $status = '';
    $color = '';
    switch ($job->color) {
        //  Все ок
        case 'blue':
        case '':
            $status = 'Успешно';
            $color = 'green';
            break;

        //  В работе
        case 'blue_anime':
        case 'red_anime':
        case 'yellow_anime':
        case 'grey_anime':
        case 'disabled_anime':
        case 'aborted_anime':
        case 'botbuilt_anime':
            $status = 'В работе';
            $color = 'yellow';
            break;

        //  Что-то пошло не так
        case 'red':
        case 'yellow':
            $status = 'Ошибки';
            $color = 'red';
            break;

        //  Выключен
        case 'grey':
        case 'disabled':
            $status = 'Выключен';
            $color = 'grey';
            break;
    }

    //  При отсутствии артефактов, запишем false
    $changeSet = $job->lastBuild->changeSet->items;
    if (count($changeSet) == 0) {
        $changeSet = false;
    }

    //  Преобразование даты успешного выполнения
    $date = new DateTime();
    $tempTime = substr($job->lastBuild->timestamp, 0, 10);
    $date->setTimestamp($tempTime);

    //  Продолжительность
    $duration = new DateTime();
    $tempTime2 = substr($job->lastBuild->duration, 0, 5);
    $duration->setTimestamp($tempTime-$tempTime2);

    //  Не показываем выключенные сборки
    if (($arParams['SHOW_DISABLED'] == 'Y') || (($job->color !== 'disabled') && ($job->color !== 'grey'))) {
        $arResult['JOBS'][] = array(
            'NAME'          =>  $job->name,
            'URL'           =>  $job->url,
            'DESCRIPTION'   =>  $job->description,
            'STATUS'        =>  $status,
            'COLOR'         =>  $color,
            'LAST_BUILD'    =>  array(
                'NUMBER'    =>  $job->lastBuild->number,
                'CHANGES'   =>  $changeSet,
                'URL'       =>  $job->lastBuild->url,
                'TIME'      =>  $date->format('H:i:s d.m.Y'),
                'DURATION'  =>  $duration->format('H:i:s d.m.Y'),
            )
        );
    }
}

$this->IncludeComponentTemplate();