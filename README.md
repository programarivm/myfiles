# myfiles

Simple file manager -- no MVC framework is used, PHP code only.

### 1. Build the Docker Containers

    docker-compose up --build

### 2. Set up the Environment

Find the IP of the mysql and nginx containers:

    docker inspect myfiles_mysql
    docker inspect myfiles_nginx

Copy the following `.env` into the app's root directory:

    MYFILES_NGINX_HOST=172.20.0.1

    DB_SERVER=172.20.0.1
    DB_DATABASE=myfiles
    DB_ROOT_PASSWORD=password
    DB_USERNAME=root
    DB_PASSWORD=password

### 3. Generate the SSL Certificate

    cd docker/nginx/ssl
    openssl genrsa -des3 -out myfiles.work.pem 2048
    openssl req -new -key myfiles.work.pem -out myfiles.work.csr
    openssl x509 -req -days 365 -in myfiles.work.csr -signkey myfiles.work.pem -out myfiles.work.crt
    openssl rsa -in myfiles.work.pem -out myfiles.work.key

### 4. Local Set up

Add the following entry to your `/etc/hosts` file:

    172.20.0.1      myfiles.work

Set up file permissions:

    chmod 775 -R storage
    chown -R standard:www-data storage

### 5. Run the Tests

    docker exec -it myfiles_php_fpm php vendor/bin/phpunit
