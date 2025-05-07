## Description  

Similaire à la branche `main`, basé sur **quatre conteneurs Docker** :

- **Apache** : pour le site web
- **php-fpm** : pour l'exécution du code PHP
- **mysql** : pour la gestion de la base de données
- **phpMyAdmin** : pour visualiser et administrer la base de données

Le serveur Apache acecpte le https. La gestion des certifcats (auto signés) est réalisée via openssl
Il sont défini dans le fichier httpd.conf ligne 51-52

Pour qu'il fonctionne normalement, il est nécessaire d'ajouter le certificat de l'Autorité de Certification (CA) dans votre navigateur. 

## Mise en place
### Génréation clefs et certificats
Le script scriptGeneClef.sh permet de créer un certification+clef pour le serveur signé par une CA crée en début de script 
``` sh 
cd openSLL
./scriptGeneClef.sh
```

Les fichiers générés sont :
+ ca.key : clef privée CA
+ server.crt : certificat serveur
+ server.csr : demande de signature de certificat serveur
+ server.ext : fichier d'extensions (ajouter un Subject Alternative Name SAN, indispensable lorsqu'on utilise une adresse IP ou plusieurs noms de domaine dans un certificat SSL/TLS.
+ server.key : clef privée serveur

Penser à vérifier les noms du certificat et de la celf du serveur dans le fichier _httpd.conf_ ligne 51-52

### Ajout certificat CA dans le navigateur web 
#### 1. Ouvrir les paramètres de Firefox  
- Ouvrir **Firefox**  
- **Paramètres**  
-  **Vie privée et sécurité**  

#### 2. Accéder à la gestion des certificats  
- Section **Certificats**, cliquer sur **Afficher les certificats…**  
- Aller dans l'onglet **Autorités**  

#### 3. Importer le certificat CA  
- Cliquer sur **Importer…**  
- Sélectionner le fichier **`ca.crt`**  
- Cocher **Faire confiance à cette autorité pour identifier des sites web**  
- Valider avec **OK** 

### Visualisation du site web en https
Dans votre navigateur,
- https://@IP

Le site web apparait. 
Via l'îcone **cadenas**, il est possible d'afficher le certificat.
