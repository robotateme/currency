## Деплой проекта
```
    $bash: cp .env.exmple .env      # Конфиг проекта 
    $bash: cd /laradock             
    $bash: cp env-exmple .env       # Конфиг Laradock
    $bash: docker-compose up mysql php-worker nginx # Поднятие докера (без демонизации "-d") 
    
    $bash: docker-compose exec workspace
    $bash: composer install
    $bash: npm run dev
    $bash: php artisan migrate 
    $bash: php artisan db:seed
```
