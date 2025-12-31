# 🗂️ Collaborative To-Do API

A RESTful API built with Laravel using an API-first approach.
The system supports boards, tasks, authentication, and board sharing with role-based authorization.
This project is backend-only and designed to be consumed by a React frontend.

---

## 🚀 Features
- Token-based authentication (Laravel Sanctum)
- Boards & Tasks CRUD
- Share boards with other users
- Role-based authorization via Policies
- Clean REST API structure
- Form Requests & API Resources
- Production-ready backend architecture

---

## 🧱 Tech Stack
- Laravel (latest stable)
- Laravel Sanctum
- MySQL
- REST API

---

## 🔐 Authentication

POST /api/register  
POST /api/login  
POST /api/logout  

Required headers for protected routes:
Authorization: Bearer {token}  
Accept: application/json

---

## 📋 Boards

GET /api/boards  
Returns all boards the user can access (owned or shared).

Example response:
{
  "id": 1,
  "title": "Work",
  "description": "Daily tasks"
}

POST /api/boards  
Request body:
{
  "title": "Work",
  "description": "Daily tasks"
}

PUT /api/boards/{board}  
DELETE /api/boards/{board}

---

## 🤝 Board Sharing

POST /api/boards/{board}/share  

Request body:
{
  "email": "user@test.com",
  "role": "editor"
}

Supported roles:
- owner: full access
- editor: manage tasks
- viewer: read-only

Authorization is enforced via Laravel Policies.

---

## ✅ Tasks

GET /api/boards/{board}/tasks  

POST /api/boards/{board}/tasks  
Request body:
{
  "title": "Buy milk",
  "description": "Before 9 PM"
}

PUT /api/tasks/{task}  
Request body:
{
  "title": "Buy milk",
  "completed": true
}

DELETE /api/tasks/{task}

---

## 🧠 Authorization Rules
- Access is controlled using Laravel Policies
- Board owner has full permissions
- Shared users are restricted based on their assigned role
- Unauthorized actions return 403 Forbidden

---

## 🗂 Database Structure

User -> Boards  
Board -> Tasks  
Board <-> User (pivot table with role)

---

## ⚙️ Local Setup

git clone https://github.com/USERNAME/REPO_NAME.git  
cd REPO_NAME  
composer install  
cp .env.example .env  
php artisan key:generate  
php artisan migrate  
php artisan serve  

---

## 📌 Notes
- API-only backend (no frontend included)
- Designed to be consumed by a React / Vite frontend
- Clean separation between authentication, authorization, and resources
