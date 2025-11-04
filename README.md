# Mini-Blog Laravel ("Blogger")

Un projet de mini-blog simple construit avec **Laravel 12**, utilisant l'authentification **Breeze**, une base de données **PostgreSQL** et un design personnalisé avec **Tailwind CSS**.

Ce projet a été construit dans le but d'apprendre les fondamentaux de Laravel, y compris :
* L'authentification (Breeze)
* Les relations Eloquent (ORM)
* Le pattern MVC (Modèle-Vue-Contrôleur)
* La validation des formulaires (FormRequests)
* Les politiques d'autorisation (Policies)
* La gestion de l'upload de fichiers (images)
* La personnalisation de Tailwind CSS

Le design inclut une page d'accueil personnalisée avec un fond animé, une palette de couleurs orange et une barre de navigation personnalisée.

---

## 🚀 Fonctionnalités

* **Authentification complète** (Inscription, Connexion, Déconnexion) gérée par Laravel Breeze.
* **Design personnalisé** : Pages d'accueil, de connexion et d'inscription avec un fond blanc et des éléments animés orange.
* **Barre de navigation personnalisée** : Fond orange avec logo et liens en blanc.
* **Gestion des articles (CRUD)** : Créer, Lire, Mettre à jour et Supprimer des articles.
* **Système d'autorisation** via Policies : Seul l'auteur d'un article peut le modifier ou le supprimer.
* **Validation des formulaires** externalisée via les `FormRequests` (`StorePostRequest`, `UpdatePostRequest`).
* **Upload d'images** : Possibilité d'associer une image (JPG, GIF, PNG, WebP) à chaque article.
* **Stockage de fichiers** : Utilisation du `storage:link` pour l'accès public aux images.
* **Relations Eloquent** : `User` `hasMany` `Post` et `Post` `belongsTo` `User`.
* **Liste paginée** des articles sur la page d'index.

---

## 💻 Stack Technique

* **Backend** : Laravel
* **Frontend** : Blade + Tailwind CSS + Alpine.js (via Breeze)
* **Base de données** : PostgreSQL
* **Authentification** : Laravel Breeze
* **Serveur de dev** : Vite

---

## 🛠️ Installation et Lancement

Suivez ces étapes pour lancer le projet sur votre machine locale (environnement Mac).

### 1. Prérequis

* [Composer](https://getcomposer.org/) (gestionnaire de paquets PHP)
* [Node.js & NPM](https://nodejs.org/en) (pour Tailwind/Vite)
* [DBngin](https://dbngin.com/) (pour démarrer PostgreSQL facilement)
* [DBeaver](https://dbeaver.io/) (ou un autre client SQL)

### 2. Installation des dépendances

En supposant que vous avez déjà le code du projet :

```bash
# 1. Installer les dépendances PHP (Laravel)
composer install

# 2. Installer les dépendances JS (Tailwind/Vite)
npm install
