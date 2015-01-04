Привязка к глобальному меню
=========

Для привязки настроек модуля или компонента приопределен идентификатор меню ``global_menu_citfact``

``` php
  $menuList[] = array(
      'parent_menu' => 'global_menu_citfact',
      'section' => 'you_id',
      'sort' => 200,
      'text' => 'Test menu',
      'url' => 'file.php',
      'icon' => 'you_id_menu_icon',
      'page_icon' => 'you_id_page_icon',
      'more_url' => array(),
      'items_id' => 'you_id',
      'items' => array(),
  );
  
  return $menuList;
```

Если ваш модуль не имеет зависимостей от citfact.core то имеет смысл проверить установлен ли он в системе.
Если не установлен, то привязать настройки к дефолтным меню.

``` php
  use Bitrix\Main\Loader;
  
  $parentMenu = (Loader::includeModule('citfact.core')) ? 'global_menu_citfact' : 'global_menu_services';
  $menuList[] = array(
      'parent_menu' => $parentMenu,
      ...
  );
  
  return $menuList;
```