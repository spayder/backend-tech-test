# Backend tech test
This project is based on docker, so in order to run it you must have docker up and running on your local environment.

### How to run the project on local environment:
1. Build and run the project

   ``make build``
2. Install framework dependencies

   ``docker-compose run --rm composer install``
3. copy .env.example .env in ``src`` directory
4. Generate secret key

   ``docker-compose run --rm php php artisan key:generate``

6. At this stage we need to migrate all the database tables. For that just run:
``make migrateup``

The application by default is listening on port ``8085`` so the url will be: ``localhost:8085``

To run the tests, just execute:
``make test``

To stop all containers run:
``make stop``