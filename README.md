# Simple feed manager

## Feature:
 - List, read, add, remove feed using command line
 - List, read, add, remove feed using UI.

## Setup:
 Create database then edit .env file in DB_DATABASE, DB_USERNAME and DB_PASSWORD.

 Run these command line:
 - git clone https://github.com/nguyenttngan/manage_feed
 - cd manage_feed
 - git checkout develop
 - composer install
 - php artisan migrate
 - php artisan db:seed
 - npm install
 - npm run dev
 - php artisan serve

 Go to link: http://127.0.0.1:8000

## Usage:

 CLI list:
 - php artisan feed:list (Display all feed)
 - php artisan feed:read {feed_id} (Read specific feed)
 - php artisan feed:read {feed_url} (Read feed with provided url)
 - php artisan feed:add (Add new feed)
 - php artisan feed:remove {feed_id} (Remove specific feed)

