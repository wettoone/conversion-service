Установка: 

cp .env.example .env

docker-compose up -d

docker-compose exec laravel.test php artisan migrate 

Парсинг:

Для парсинга с сайта ЦБ я написал команду:

docker-compose exec laravel.test php artisan cb:parse 

Основная идея такова: Команда парсит данные из xml файла второго источника,
далее доступно два роута(я их не успел протестить), первый роут показывает курс одной валюты к другой.

Логика:

1)Route::get('/get_country_rates/{rate_country1}/{rate_country2}', [CurrencyRateController::class, 'conversion']);

В этом роуте сначала выбирается валюта, далее выбирается валюта, в которую конвертируется первая.

2)Route::get('/rate/{id}', [CurrencyRateController::class, 'show']);

это тестовый роут в котором показаны курсы валют к рублю.
