# Site Internet Éducatif pour des failles basiques

Ce dépôt propose une simulation d'un site internet type compte bancaire simplifié. Il permet de travailler sur les notions suivantes :

- Le hashage des mots de passe
- L'injection SQL (niveau basique)
- Les failles XSS (niveau basique)

Ce dépôt est constitué de 3 branches :
- **main** : nginx et http
- **httpsTest** : nginx et https
- **httpsApache** : Apache et https


## Architecture branche main

Ce projet repose sur **quatre conteneurs Docker** :

- **nginx** : pour le site web
- **php-fpm** : pour l'exécution du code PHP
- **mysql** : pour la gestion de la base de données
- **phpMyAdmin** : pour visualiser et administrer la base de données

## Utilisation

### 1. Création de l'image Docker

L'image docker de php est créé automatiquement via : 
```sh
build: ./.docker/php  # Construction de l'image à partir du dockerfile php pour communication avec bdd
image: phppv-image
```
Vous pouvez la créer manullement. En suivant la procédure ci-dessous : 
Créez votre propre image à l'aide du fichier `Dockerfile`. Cette image doit être nommée `phpPV`.

Exécutez les commandes suivantes :

```sh
cd ./.docker/php/  # Accès au répertoire contenant le Dockerfile
docker build -t phpPV .  # Construction de l'image Docker
cd ../..  # Retour à la racine du dépôt
```

Le nom de l'image peut bien sûr être changée mais il faudra alors modifer la ligne 19 du docker-compose.yml

### 2. Lancement des conteneurs

Dans le répertoire principal du projet, lancez :

```sh
sudo docker compose up -d
```

### 3. Création et importation des données

- Accédez à **phpMyAdmin** via : `http://@ip:8080`
  - **Login** : `root`
  - **Mot de passe** : `root`

La base de données est monté et crée automatiquement via : 
```sh
./init-db:/docker-entrypoint-initdb.d
```
Si elle ne se crée pas : 
```sh
sudo docker compose down -v 
sudo rm -rf ./mysqldata
sudo docker compose up -d
```
*Le volume monté doit absolument être supprimé*

### 4. Navigation sur le site wbeb
  
- Vous pouvez ensuite accéder au site web via l'adresse IP du serveur

---

**Remarque :** Assurez-vous que Docker et Docker Compose sont bien installés sur votre machine avant de lancer les commandes.
