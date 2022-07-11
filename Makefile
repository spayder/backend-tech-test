build:
	docker-compose up -d --build

stop:
	docker-compose stop

migrateup:
	docker-compose run --rm php php artisan migrate

test:
	docker-compose run --rm php ./vendor/bin/pest

.PHONY: build stop migrateup test