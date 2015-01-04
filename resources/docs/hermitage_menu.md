Привязка к разделу в эрмитаже
=============

Для отображения компонента в эрмитаже, приветствуется привязка к идентификатору раздела ``citfact``

``` php
  // .description.php
  
  $arComponentDescription = array(
    'NAME' => 'Название',
    'DESCRIPTION' => 'Описание',
    'SORT' => 10,
    'CACHE_PATH' => 'Y',
    'PATH' => array(
        'ID' => 'citfact',
        'NAME' => 'ЦИТ "Факт"',
    ),
  );
```