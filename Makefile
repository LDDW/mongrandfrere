deploy: public/build/manifest.json
	rsync -avz public/build infotuto:~/sites/mongrandfrere/public
	ssh infotuto 'cd ~/sites/mongrandfrere && git pull origin main && make install' 

install: vendor/autoload.php .env/ public/storage 
	php artisan cache:clear
	php artisan migrate

.env :
	cp .env.example .env
	php artisan key:generate

public/storage :
	php artisan storage:link

vendor/autoload.php : composer.lock
	composer install
	touch vendor/autoload.php

public/build/manifest.json : package.json
	npm install
	npm run build