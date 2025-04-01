## Description  

Même chose que la branche `main`, mais avec une authentification et surtout avec un Serveur Apache

Les clés et certifcats serveurs sont à déposer dans le répertoire `./ssl`.  Ils sont donnés a titre d''exemple car ne peuvent pas fonctionner avec d'autres adresse IP. 
Dans l'exemple c'est les mêmes clefs et certificats que pour nginx.
Il sont défini dans le fichier httpd.conf ligne 51-52

Pour qu'il fonctionne normalement, il est nécessaire d'ajouter le certificat de l'Autorité de Certification (CA) dans votre navigateur. 

## Mise en place
Le script scriptGeneClef.sh permet de créer un certification+clef pour le serveur signé par une CA crée en début de script 
``` sh 
cd openSLL
./scriptGeneClef.sh
```
Dois alors être crée : 
+ ca.crt : certificat CA
+ ca.key : clef privée CA
+ server.crt : certificat serveur
+ server.csr : demande de signature de certificat serveur
+ server.ext : fichier d'extensions (ajouter un Subject Alternative Name SAN, indispensable lorsqu'on utilise une adresse IP ou plusieurs noms de domaine dans un certificat SSL/TLS.
+ server.key : clef privée serveur

