# myfiles

Simple file manager.

### 1. Set up the Environment

`.env` file:

    DB_DATABASE=myfiles
    DB_ROOT_PASSWORD=password
    DB_USERNAME=root
    DB_PASSWORD=password

### 2. Generate the SSL Certificate

    cd docker/nginx/ssl
    openssl genrsa -des3 -out myfiles.work.pem 2048
    openssl req -new -key myfiles.work.pem -out myfiles.work.csr
    openssl x509 -req -days 365 -in myfiles.work.csr -signkey myfiles.work.pem -out myfiles.work.crt
    openssl rsa -in myfiles.work.pem -out myfiles.work.key

### 3. Build the Docker Containers

    docker-compose up --build

### 4. Run the Tests

    docker exec -it --user 1000:1000 myfiles_php_fpm php vendor/bin/phpunit tests
