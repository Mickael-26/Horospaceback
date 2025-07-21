# CMS Horoscope – Cosmospace

Ce projet est un CMS développé avec **Laravel 12** permettant d'importer, gérer et styliser des horoscopes à thème.  
Il expose une API RESTful qui envoie les contenus à un front-end distant (non inclus dans ce projet).

---

## Stack technique

- **Laravel 12**
- **PHP 8.4.7**
- **Tailwind CSS**
- **MySQL**
- **PhpSpreadsheet** (pour l'import Excel)
- **Docker / Docker Compose**
- **Nginx** (via conteneur Docker)

---

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Node.js](https://nodejs.org/) ≥ v18
- [Composer](https://getcomposer.org/)

---

## Installation locale

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/Mickael-26/Horospaceback
   cd cms-horoscope
   ```

2. **Copier le fichier d'environnement :**
   ```bash
   cp .env.example .env
   ```

3. **Lancer les conteneurs Docker :**
   ```bash
   docker-compose up -d
   ```

4. **Installer les dépendances PHP et JavaScript :**
   ```bash
   docker exec app composer install
   docker exec app npm install
   ```

5. **Générer la clé d'application Laravel :**
   ```bash
   docker exec app php artisan key:generate
   ```

6. **Lancer les migrations et les seeders :**
   ```bash
   docker exec app php artisan migrate --seed
   ```

7. **Créer le lien symbolique vers le stockage :**
   ```bash
   docker exec app php artisan storage:link
   ```

**Accès à l'application :** http://localhost:8080

---

##  Données de test

Le projet contient des seeders générant automatiquement :

- Des utilisateurs de test
- Des langues préconfigurées
- Des signes astrologiques

---

## Lancement & build

**Lancer le serveur de développement :**
```bash
npm run dev
```

**Compiler pour la production :**
```bash
npm run build
```

---

## Déploiement

L'application est conçue pour être déployée via Docker avec :

- Un conteneur Laravel PHP
- Un conteneur Nginx configuré pour servir l'application
- Un conteneur MySQL pour la base de données

La configuration réseau et les volumes persistants sont définis dans `docker-compose.yml`.

---

## Structure du projet

- `app/Http/Controllers/` : contrôleurs Laravel (logique métier, API)
- `app/Models/` : modèles Eloquent représentant les entités (contenus, styles…)
- `resources/views/` : vues Blade
- `database/seeders/` : données de test
- `storage/` : stockage des fichiers importés

---

##  Objectif pédagogique

Ce projet a été conçu dans le cadre d'un stage.

Il fournit un environnement reproductible, prêt à être installé, testé et potentiellement déployé sur un serveur de production ou en local avec Docker.

---

## Auteur

Projet réalisé par **Mickaël** – Formation CDA 
Encadré par l'entreprise **Cosmospace**