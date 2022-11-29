build:
	docker-compose build

start:
	docker-compose up -d

stop:
	docker-compose down

fresh:
	docker-compose down && docker-compose up -d --build

ps:
	docker-compose ps

web:
	docker-compose exec web sh

api:
	docker-compose exec api sh

migrate:
	docker-compose exec api php artisan migrate

seed:
	docker-compose exec api php artisan db:seed

config-cache:
	docker-compose exec api php artisan config:cache

all-config:
	make config-cache && make migrate && make seed

laravel-config:
	cd src/api && cp .env.example .env && php artisan key:generate

config:
	cp .env.example .env && cd src/api && cp .env.example .env && php artisan key:generate

#light-start:
#
