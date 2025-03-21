# Projet Symfony Api

## Description
Rendu Symfony API

## Membres du Groupe
- Anthony Lopes
- Florien Decodts

## Installation

1. **Clonez le repository :**
   ```bash
   git clonehttps://github.com/AnthxnyL/symfony-api.git

2. **Allez dans le répertoire du projet :**
    ```bash
    cd veterinaire

3. **Installez les dépendances via Composer :**
    ```bash
    composer install

4. **Configurez votre .env pour la base de données et l'authentification JWT :**
    ```bash
    # Configuration de la base de données
    DATABASE_URL="mysql://root\:root@127.0.0.1:3306/lexik_api"

    # Configuration pour JWT (clé secrète)
    JWT_SECRET_KEY="votre_cle_secrète"

5. **Créez la base de données et appliquez les migrations :**
    ```bash
    php bin/console doctrine\:database\:create
    php bin/console doctrine\:migrations\:migrate   

6. **Générez la clé secrète JWT si nécessaire :**
    ```bash
    php bin/console lexik\:jwt\:generate-keypair

## Utilisation

1. **Démarrer le serveur Symfony :**
    ```bash
   symfony serve

2. **Accéder à l'API :**
  Vous pouvez accéder à l'API via http://localhost:8000/api.

3. **Documentation de l'API :**
   La documentation de l'API est également disponible via Swagger à http://localhost:8000/api/docs.




