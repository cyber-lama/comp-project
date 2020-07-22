#!make

ifneq ("$(test -f .env)","0")
	include .env
	export $(shell sed 's/=.*//' .env)
endif

init:
	bash bin/init.sh
build:
	docker-compose up --build -d
	@make status
up:
	docker-compose up -d
	@make status
status:
	docker-compose ps
down:
	@make dump
	docker-compose stop
exec:
	docker-compose exec app bash
rm:
	docker-compose rm
dump:
	echo "\e[42m\e[37m[INFO]\033[0m Делаем дамп базы данных"
	docker-compose exec db mysqldump -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} > ./docker/dump.sql
	sed -i '1,1d' docker/dump.sql
exec.nginx:
	docker-compose exec nginx /bin/sh
exec.db:
	docker-compose exec db bash
network.down:
	@make down
	docker network prune
remove.all:
	docker system prune -a
composer:
	docker-compose exec app composer install