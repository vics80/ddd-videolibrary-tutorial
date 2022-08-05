JOB_NAME=videolibrary
PROJECT_NAME=${JOB_NAME}
USER_ID:=$(shell id -u)
GROUP_ID:=$(shell id -g)
COMPOSE=docker-compose -p "$(PROJECT_NAME)" -f docker/docker-compose.yml

.EXPORT_ALL_VARIABLES:
DOCKER_UID=$(USER_ID)
DOCKER_GID=$(GROUP_ID)

up:
	$(COMPOSE) build
	$(COMPOSE) up -d
down:
	$(COMPOSE) down
install:
	make down
	make up
	make api-vendors-install
reload:
	$(COMPOSE) stop
	make up
api-bash:
	docker exec -it $(PROJECT_NAME)_api_1 bash
nginx-bash:
	docker exec -it $(PROJECT_NAME)_nginx_1 bash
autoload:
	docker exec -it $(PROJECT_NAME)_api_1 composer dump-autoload
db-create:
	docker exec -it $(PROJECT_NAME)_api_1 sleep 10
	docker exec -it $(PROJECT_NAME)_api_1 bin/console doc:mig:mig --no-interaction
db-update-dump:
	docker exec -it $(PROJECT_NAME)_api_1 bin/console doc:sch:upd --dump-sql
db-update-force:
	docker exec -it $(PROJECT_NAME)_api_1 bin/console doc:mig:mig --no-interaction
db-migration-generate:
	docker exec -it $(PROJECT_NAME)_api_1 bin/console doc:mig:gen
db-migration-migrate:
	docker exec -it $(PROJECT_NAME)_api_1 bin/console doc:mig:mig
api-vendors-install:
	docker exec -it $(PROJECT_NAME)_api_1 composer install
api-vendor-require:
	docker exec -it $(PROJECT_NAME)_api_1 composer require $(package)
api-tests:
	docker exec -it $(PROJECT_NAME)_api_1 vendor/bin/phpunit