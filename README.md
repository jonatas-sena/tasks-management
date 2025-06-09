# Task Management - SPA with Laravel, Vue 3, PostgreSQL, and Inertia.js

A robust and modern single-page task management application.

---

## 🔧 Technologies Used

- **Backend**: Laravel 10  
- **Frontend**: Vue.js 3 + Inertia.js 1.0  
- **Database**: PostgreSQL 15  
- **State Management**: Pinia 2  
- **Testing**: Pest 2  
- **Development Environment**: Docker  

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/jonatas-sena/tasks-management.git
cd tasks-management
```

### 2. Copy the `.env` File

```bash
cp .env.example .env
```

> Make sure the `DB_*` environment variables match the Docker settings below.

### 3. Start the Docker Environment

```bash
docker-compose up -d --build
pnpm install
```

This will start the app (PHP + Laravel), PostgreSQL database, and Node.js containers.

### 4. Install Dependencies

Enter the app container:

```bash
docker exec -it tasks-management-app bash
```

Inside the container:

```bash
composer install
```

### 5. Generate App Key, Run Migrations and Seeders

```bash
php artisan key:generate
php artisan migrate:fresh --seed
```

---

## Running the Project

Inside the container:
```bash
php artisan serve --host=0.0.0.0 --port=8080
```

Access the application at:

🔗 http://localhost:8080

---


## 👤 Default Login

After seeding, you can log in using:

- **Email**: `test@example.com`
- **Password**: `12345678`

---

## 🧪 Running Tests

Inside the container
```bash
./vendor/bin/pest
```

> Includes tests for authentication, task creation, and validation rules.

---

## 📁 Folder Structure (Simplified)

```
resources/
  js/
    Pages/
      Tasks/           # Task pages (Index, Create, Edit)
    Components/
      Tasks/           # Task-related components like TaskForm.vue
    Layouts/           # Main layout with sidebar/header

tests/
  Feature/
    Http/
      Controllers/
        TaskControllerTest.php
```

