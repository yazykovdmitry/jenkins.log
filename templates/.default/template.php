<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//Helpers::dump($arResult);
?>
<table class="project_table">
    <thead>
        <tr>
            <th rowspan="2" colspan="2">Статус</th>
            <th rowspan="2">Название</th>
            <th rowspan="2">Описание</th>
            <th colspan="3">Последняя сборка</th>
        </tr>
        <tr>
            <th>Номер</th>
            <th>Время</th>
            <th>Изменения</th>
        </tr>
    </thead>
    <tbody>
    <?foreach ($arResult['JOBS'] as $job):?>
        <tr>
            <td>
                <div class="<?=$job['COLOR']?>"></div>
            </td>
            <td>
                <?=$job['STATUS']?>
            </td>
            <td>
                <a href="<?=$job['URL']?>" target="_blank"><?=$job['NAME']?></a>
            </td>
            <td>
                <?=$job['DESCRIPTION']?>
            </td>

            <td>
                <a href="<?=$job['LAST_BUILD']['URL']?>" target="_blank">#<?=$job['LAST_BUILD']['NUMBER']?></a>
            </td>
            <td>
                <?=$job['LAST_BUILD']['TIME']?>
            </td>
            <td>

                <?if ($job['LAST_BUILD']['CHANGES'] == false):?>
                    Не определено
                <?else:?>
                    <ul>
                        <?foreach ($job['LAST_BUILD']['CHANGES'] as $item):?>
                            <li>
                                <?=$item->msg?>
                            </li>
                        <?endforeach?>
                    </ul>
                <?endif?>

            </td>
        </tr>
    <?endforeach?>
    </tbody>
</table>