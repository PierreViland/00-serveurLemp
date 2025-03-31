server {
    listen 80 default_server;
    root   /var/www/php;
    index  index.html;
    server_name 192.168.1.118;

    # Redirige toutes les requêtes HTTP vers HTTPS
    return 301 https://$host$request_uri;

}

server {
    listen 443 ssl http2;  # Activation du support HTTP/2 pour de meilleures performances
    listen [::]:443 ssl http2;
    server_name 192.168.1.118;

    root /var/www/php;
    index index.html index.php;

    # Définition des certificats SSL auto-signés
    ssl_certificate /etc/nginx/ssl/serveurNginxCyber.crt;
    ssl_certificate_key /etc/nginx/ssl/serveurNginxCyber.key;
   # ssl_dhparam /etc/nginx/ssl/dhparam.pem;


    # Configuration de PHP via FastCGI
    location ~* \.php$ {
        fastcgi_pass php:9000;  # Envoie les requêtes PHP au service PHP-FPM
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SCRIPT_NAME $fastcgi_script_name;
}


#Attention toutes les métriques sont visibles par tous
#Il faut restraindre
#De plus, erreur de sécurité => Si Prometheuse n'est pas actif

location /nginx_status {
        stub_status;
        allow all;  # À restreindre selon vos besoins de sécurité
    }	

}
