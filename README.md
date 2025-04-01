## Description  

Même chose que la branche `main`, mais avec une authentification et surtout avec un Serveur Apache

Les clés et certifcats serveurs sont à déposer dans le répertoire `./ssl`.  Ils sont donnés a titre d''exemple car ne peuvent pas fonctionner avec d'autres adresse IP. 
Dans l'exemple c'est les mêmes clefs et certificats que pour nginx.
Il sont défini dans le fichier httpd.conf ligne 51-52

Pour qu'il fonctionne normalement, il est nécessaire d'ajouter le certificat de l'Autorité de Certification (CA) dans votre navigateur. 

## Mise en place
Le certificat du CA CA_Cyber.crt est fourni dans ./ssl/. L'adresse IP du serveur est 192.168.1.110
