<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//Helpers::dump($arResult);
?>
<table class="project_table">
    <thead>
        <tr>
            <th rowspan="2" colspan="2">Статус</th>
            <th rowspan="2">Название</th>
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
                <a href="<?=$job['URL']?>" target="_blank" title="<?=$job['DESCRIPTION']?>"><?=$job['NAME']?></a>
            </td>

            <td>
                <a href="<?=$job['LAST_BUILD']['URL']?>" target="_blank">#<?=$job['LAST_BUILD']['NUMBER']?></a>
            </td>
            <td>
                <?=$job['LAST_BUILD']['TIME']?>
            </td>

            <td>

            <?if ($job['LAST_BUILD']['CHANGES'] == false):?>

                <table>
                    <tbody>
                    <tr>
                        <td>Изменений нет, либо отмена изменений</td>
                    </tr>
                    </tbody>
                </table>

            <?else:?>

                <table class="innerTable">
                    <thead>
                        <tr>
                            <th>Коммит</th>
                            <th>Автор</th>
                            <th>Файлы</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?foreach ($job['LAST_BUILD']['CHANGES'] as $item):?>

                        <tr>
                            <td><?=$item->msg?></td>
                            <td><a href="<?=$item->author->absoluteUrl?>" target="_blank"><?=$item->author->fullName?></a></td>
                            <td>

                                <div class="hidden">
                                    <a class="show">Показать все (<?=count($item->paths)?>)</a>
                                    <ul>
                                        <?foreach ($item->paths as $path):?>
                                            <li>
                                                <b><?=$path->editType?></b>: <?=$path->file?>
                                            </li>
                                        <?endforeach?>
                                    </ul>
                                </div>

                            </td>
                        </tr>

                    <?endforeach?>

                    </tbody>
                </table>

            <?endif?>

            </td>


        </tr>
    <?endforeach?>
    </tbody>
</table>