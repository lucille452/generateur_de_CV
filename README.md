# Générateur de CV

    Créer des cv en ligne, depuis le navigateur
    Afficher et modifier un cv déjà créé et stocker en base de donnée
    Générer des CV au format PDF

## Consignes

    - Permettre la création d’un compte
    - Utiliser des formulaires pour récolter les informations
    - Définir des classes afin de permettre un choix dans une bibliothèque de modèles.
    - Mettre en place des procédures de contrôle et validation des données
    - Monter une base de données ou les données seront stockés
    - Utiliser des librairies natives au PHP pour générer les PDF.

## Prérequis

    ✓ PHP 7.1
    ✓ phpMyAdmin (ou Laragon ou autre gestionnaire de base de données)

## Installation

#### Avec phpMyAdmin

Cloner le repository dans votre dossier racine, dans xampp, dans le dossier htdocs : 
    
    C:\xampp\htdocs

#### Avec Laragon
Cloner le repository dans votre dossier racine, dans laragon, dans le dossier www :

    C:\laragon\www    

##### Cloner repository :
 ```bash
 git clone https://github.com/lucille452/generateur_de_CV.git
 ```
Ne pas oublier **d'importer la base de données** sur phpMyAdmin, laragon ou tout autre gestionnaire de base de données :

    ./database.sql

## Lancer

```bash
php -S localhost:8080
 ```
Accédez à l'application dans le navigateur à l'adresse : http://localhost/Generateur_de_CV/Front/Templates.

## MCD

![MCD](MCD_MLD/MCD.drawio.png)

## MLD

![MLD](MCD_MLD/MLD.png)

## Démonstration
[![Demo Vidéo](Front/image/demo.png)](Demo/demo_generation_cv.mp4)
J'ai un problème d'inclusion qui fait que je suis obligée d'utiliser parfois des chemins absolus. J'ai donc mis ci-dessus une démonstration de mon projet.