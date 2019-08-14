# myfiles

Simple file manager.

### 1. Generate the SSL Certificate

    cd docker/nginx/ssl
    openssl genrsa -des3 -out myfiles.work.pem 2048
    openssl req -new -key myfiles.work.pem -out myfiles.work.csr
    openssl x509 -req -days 365 -in myfiles.work.csr -signkey myfiles.work.pem -out myfiles.work.crt
    openssl rsa -in myfiles.work.pem -out myfiles.work.key
