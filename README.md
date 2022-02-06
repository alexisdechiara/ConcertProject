# ConcertProject
Ce projet à été réalisé pour le cours de Symfony de la licence APIDAE de Montpellier en 2021-2022

## Installation
Après avoir installé le git et modifié le .env en y entrant les informations correspondants à la base de donnée de votre choix ex"cutez les commandes qui suivent :

``` 
composer install 
```
```
php bin/console doctrine:schema:update --force
```
```
php bin/console doctrine:fixtures:load
```

**Pour utilisé une base de donnée en local, j'ai utilisé  [laragon](https://laragon.org/)**

## Schéma de la base de donnée

![Symfony project](https://user-images.githubusercontent.com/48689074/152688831-874ac092-2f7c-4aa6-820e-fbdf89f1a70b.png)
