Главный модуль
===

Содержит вспомогательные библиотеки и компоненты

## Установка:
	// Переходим в корень проекта
	cd /path/to/project/
	
	// Клонируем репозиторий
	git clone https://github.com/studiofact/core.git
	
	// Если bitrix >= 14, то создадим папку local/modules и переносим туда модуль
	mkdir local && mkdir local/modules
	mv form/src/citfact.core local/modules
	
	// Если версия < 14, переносим в пространство bitrix
	mv form/src/citfact.core bitrix/modules
	
	// Удаляем репозиторий
	rm -rf form

Или воспользоваться [установщиком](https://github.com/studiofact/sandbox).
Далее в административной панели в разделе "Marketplace > Установленные решения" устанавливаем модуль.
