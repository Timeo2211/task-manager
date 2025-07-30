# 📝 Gestionnaire de Tâches – Laravel + Livewire

Une application simple de gestion de tâches (todo-list) construite avec Laravel 8, Livewire, Alpine.js et TailwindCSS.

---

## ⚙️ Installation locale

### Prérequis

- PHP 8.0+
- Composer
- Node.js & npm
- MySQL ou SQLite
- Laravel CLI (`composer global require laravel/installer`)

### Étapes

1. Cloner le dépôt

```bash
git clone https://github.com/Timeo2211/task-manager.git
cd <nom-du-dossier>
```
2. Installer les dépendances PHP

```bash
composer install
```
3. Copier le fichier `.env.example` en `.env`

```bash
cp .env.example .env
```
4. Modifiez les variables de connexion à la base de données dans .env selon votre configuration locale :
```env
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=nom_de_la_base_de_données
DB_USERNAME=utilisateur
DB_PASSWORD=mot_de_passe
```
5. Générer la clé d'application

```bash
php artisan key:generate
```
6. Migrer la base de données

```bash
php artisan migrate
```
7. Installer les dépendances JavaScript

```bash
npm install
```
8. Compiler les assets

```bash
npm run dev
```
9. Lancer le serveur de développement

```bash
php artisan serve
```

## 🧱 Architecture rapide
### Structure des fichiers
```
app/
├── Http
│   ├── Controllers
│   ├── Livewire
│       ├── TaskManager.php
│   └── Middleware
├── Models
│   └── Task.php
├── Providers
│   └── AppServiceProvider.php
config/
├── app.php
database/
├── migrations
│   └── 2021_01_01_000000_create_tasks_table.php
public/
├── css
│   └── app.css
├── js
│   └── app.js
resources/
├── views
│   └── livewire
│       └── task-manager.blade.php
routes/
├── web.php
storage/
├── logs
└── app

```

### 📁 /app/Http/Livewire/TaskManager.php

Composant Livewire principal. Gère l’ajout, la complétion, la suppression et le filtrage des tâches.

### 📁 /resources/views/livewire/task-manager.blade.php

Vue du composant Livewire. Contient le formulaire, les filtres, et la liste des tâches avec les interactions Alpine.js.

### 📁 /resources/views/layouts/app.blade.php

Layout principal HTML avec Tailwind, Livewire et Alpine.js inclus.

### 📁 /resources/views/tasks/index.blade.php

Page qui affiche le composant TaskManager.

### 📁 /app/Models/Task.php

Modèle Eloquent représentant une tâche. Utilise le SoftDeletes.

### 📁 database/migrations/xxxx_xx_xx_create_tasks_table.php

Migration pour créer la table tasks avec les colonnes title, is_completed, deleted_at, etc.

### 📁 webpack.mix.js + /resources/css/app.css

Configuration Laravel Mix + fichier CSS Tailwind avec les directives @tailwind base, etc.

## 🚀 Technologies utilisées

- **Laravel 8** : Framework PHP pour le backend.
- **Livewire** : Pour les composants dynamiques sans JavaScript complexe.
- **Alpine.js** : Pour les interactions frontend légères.
- **TailwindCSS** : Pour le style et la mise en page.
- **MySQL/SQLite** : Pour la base de données.
- **Laravel Mix** : Pour la compilation des assets frontend.



