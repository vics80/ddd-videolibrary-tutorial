JOB_NAME=?api
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
refresh:
	$(COMPOSE) down
	$(COMPOSE) build
	$(COMPOSE) up -d
reload:
	$(COMPOSE) stop
	$(COMPOSE) build
	$(COMPOSE) up -d
bash:
	$(COMPOSE) run --rm api-videolibrary bash
autoload:
	$(COMPOSE) run --rm api-videolibrary composer dump-autoload
db-create:
	$(COMPOSE) run --rm api-videolibrary bin/console doc:sch:cre
db-update-dump:
	$(COMPOSE) run --rm api-videolibrary bin/console doc:sch:upd --dump-sql
db-update-force:
	$(COMPOSE) run --rm api-videolibrary bin/console doc:sch:upd --force