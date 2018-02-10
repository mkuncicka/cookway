To set up project
====

1. Git clone
2. Composer install
3. Generate jwt public and private keys:
 - openssl genrsa -out app/Resources/jwt/private.pem -aes256 4096
 - openssl rsa -pubout -in app/Resources/jwt/private.pem -out app/Resources/jwt/public.pem
 - chmod 664 on both files