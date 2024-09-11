# お問い合わせフォーム

## 環境構築
### Dockerビルド

1. Git clone https://github.com/nobu1/confirmation-test.git
1. docker-compose up -d --build

※MYSQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイル  
を編集してください

### Laravel構築環境

1. docker-compose exec php bash
1. composer install
1. .env.exampleファイルから.envを作成し、環境変数を変更
1. php artisan key:generate
1. php artisan migrate
1. php artisan db:seed

## 使用技術

- PHP 7.4
- MySQL 8.0
- Laravel 8.83

## ER図


## URL

- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/