Главный модуль
===

Содержит вспомогательные библиотеки и компоненты.
Ознакомьтесь с [документацией](https://github.com/studiofact/citfact.core/blob/master/docs/) для получения дополнительной информации.

## Требования:

 - PHP версия >= 5.3.3
 - Bitrix версия >= 14
 
## Установка:

``` bash
# Переходим в корень проекта
cd /path/to/project/

# Клонируем репозиторий
git clone https://github.com/studiofact/citfact.core.git

# Если bitrix >= 14, то создадим папку local/modules и переносим туда модуль
mkdir local && mkdir local/modules
mv citfact.core local/modules

# Или переносим в пространство bitrix
mv citfact.core bitrix/modules
```

Или воспользоваться [установщиком](https://github.com/studiofact/sandbox).
Далее в административной панели в разделе "Marketplace > Установленные решения" устанавливаем модуль.

## Документация

 - [Привязка к глобальному меню](https://github.com/studiofact/citfact.core/blob/master/docs/global_menu.rst)
 - [Привязка к разделу в эрмитаже](https://github.com/studiofact/citfact.core/blob/master/docs/hermitage_menu.rst)
 - [API](https://github.com/studiofact/citfact.core/tree/master/docs/api)
 	- [Пользовательские переменные](https://github.com/studiofact/citfact.core/blob/master/docs/api/user_vars.rst)
