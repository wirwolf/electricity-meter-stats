build:
	sudo docker-compose build
down:
	sudo docker-compose down
up:
	sudo docker-compose up
clear:
	sudo rm -rf .docker/*/logs/*
	sudo rm -rf .docker/*/data/*


	sudo rm -rf app/build/*/data/*

	sudo rm -rf app/vendor/
	sudo rm -rf app/cache.properties
	sudo rm -rf app/storage/runtime/log/*
	sudo rm -rf app/storage/runtime/cache/*
	sudo rm -rf app/storage/runtime/aspect/*
	sudo rm -rf app/storage/runtime/debug/*
	sudo rm -rf app/storage/runtime/html/*
	sudo rm -rf app/storage/runtime/html/*
	sudo rm -rf app/src/Modules/Database/Mysql/*
	sudo rm -rf app/src/Modules/Database/Mongodb/*

fix-permission:
	sudo chown -R $(shell whoami):$(shell whoami) *
	sudo chown -R $(shell whoami):$(shell whoami) .docker/*/logs/*


dump:
	sudo docker-compose exec mysql mysql_dump -u test -p test > dump.sql

apidoc:
	sudo docker-compose run apidoc yarn apidoc

tests:
	sudo docker-compose exec php vendor/bin/codecept run