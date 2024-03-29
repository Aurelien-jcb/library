# Projet de bibliothèque avec Symfony

Projet ayant pour but de mettre en place et de prendre en main une base de donnée MariaDb avec Symfony.

## Côté front

- un catalogue en ligne des livres  
  *optionnel:* affichage de la disponibilité de chaque livre
- un formulaire d'inscription pour les emprunteurs  
  l'email doit être unique

## Côté back

- un CRUD pour les livres
- un CRUD pour les emprunteurs
- un CRUD pour les emprunts
- un CRUD pour les users

Le front est accessible à tout le monde.
Le back n'est accessible qu'aux bibliothécaires.
Les bibliothécaires peuvent utiliser un formulaire pour s'authentifier.

## Entités

### Livre

- titre du livre
- genre du livre
- langue du livre
- nom de l'auteur
- année de l'édition
- nombre de pages
- nom de l'éditeur
- cote du livre
- ISBN
- état du livre
- relation one to many avec Emprunt

### Emprunteur

- nom de l'emprunteur
- email / tel de l'emprunteur
- drapeau blacklisté pour emprunteur
- carte emprunteur : bool
- relation one to many avec Emprunt

*La classe Emprunteur est une entité normale générée par `php bin/console make:entity`.*

### Emprunt

- date d’emprunt
- date de retour
- relation many to one avec Livre
- relation many to one avec Emprunteur

### Paramètre

- durée de l'emprunt
- nombre de livres empruntables pour une personne par emprunt
- le montant des amendes de retard

### User (le bibliothécaire)

- email
- mot de passe

*La classe User est la classe User générée par `php bin/console make:user`.*

## À faire

- créer des fixtures qui insèrent au moins 1 user bilbiothécaire (de rôle `ROLE_ADMIN`)
- interface d'authentification pour le user bilbiothécaire
- un CRUD pour chaque entité sauf User (car on va gérer les user avec des fixtures)
- les CRUD doivent être protégé par mot de passe
  le plus simple c'est de rajouter un `/admin` dans leur prefix
- ajouter des contraintes de validation sur chaque entité
