# Тестовое задание для компании MediaNation

### Описание
Демо: http://medianation-test.strilchuk.ru/  
Проект представляет собой веб-приложение, предназначенное для быстрого тестирования навыков работы с HTTP-запросами, а также для проверки результатов и сбора контактных данных.  

### Проверка работы
Для успешного прохождения теста в каталоге с проектом присутствует скрипт testrequest_my.sh. Данный скрипт отправляет запрос, который проходит тестирование.

### Маршруты
- `GET /` - корневой маршрут. Сразу перекидывает в  `/test`; 
- `ANY /test` - Основной маршрут для тестирования. Обрабатывает все доступные типы запросов.
- `GET /welcome/{mark?}` - Маршрут для сбора контактных данных. Ссылка на данный маршрут становится доступной после успешного прохождения теста и находится в результатах тестирования. Параметр mark - уникальный идентификатор успешно пройденного результата тестирования, привязанный к ip-адресу тестируемого. Если не указан, то перекидывает на `/test`;
- `POST /welcome/{mark?}` - маршрут для сбора контактных данных. Отправляется из формы сбора контактных данных;
- `GET /login` - маршрут возвращает форму авторизации в административной панели. 
- `POST /login` - маршрут принимает параметры для входа и устанавливает cookie со значением hash суммы логина и пароля. Отправляется из формы авторизации;
- `GET /exit` - маршрут для выхода из учетной записи администратора.
- `GET /statistic` - маршрут для просмотра собранных данных о прохождении теста и контактных данных соискателей. Если нет авторизации, то перкидывает на `/login`.

### Данные для входа
 По умолчанию административная учетная запись имеет параметры:  
 Логин `admin`  
 Пароль `powerover321`  
 Данные параметры можно изменить в файле `.env`. 
 
 ### Логирование
Файл логов доступен по адресу `storage/logs/laravel.log`, в него попадают данные обо всех входящих http-запросах, относящихся к тестированию.

 ### Развертывание
Для развертывания проекта нужно выполнить следующие действия:
1. Склонировать репозиторий и перейти в каталог с проектом  
`git clone https://github.com/strilchuk/medianation-test.git`  
`cd medianation-test`
2. Установить зависимости с помощью Composer  
`composer install`
3. Скопировать и заполнить подключение к базе в файле `.env`  
`cd .env.example .env`   
4. Выполнить миграции для создания необходимых таблиц
`php artisan migrate`
 
 ### Используемые фреймворки
  - Laravel
    
  
