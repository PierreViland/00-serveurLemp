server {
    listen 443 ssl http2;  # Activation du support HTTP/2 pour de meilleures performances
    listen [::]:443 ssl http2;
    server_name 192.168.1.18;

    root /var/www/php;
    index index.html index.php;

    # Définition des certificats SSL 
    ssl_certificate /etc/nginx/ssl/serverHTTPs.crt;
    ssl_certificate_key /etc/nginx/ssl/serverHTTPs.key;

    # Configuration de PHP via FastCGI
    location ~* \.php$ {
        fastcgi_pass php:9000;  # Envoie les requêtes PHP au service PHP-FPM
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SCRIPT_NAME $fastcgi_script_name;
    }

}

server {
    listen 9114;
    server_name localhost;

    location /nginx_status {
        stub_status;
        allow all;
    }
}

