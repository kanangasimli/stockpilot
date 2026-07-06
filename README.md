# 📦 StockPilot

A modern **Warehouse Management System** built with **Laravel 13**, designed to manage products, categories, suppliers, inventory movements, and warehouse reports.

This project was developed as a backend-focused final project using Laravel best practices and clean architecture principles.

---

## ✨ Features

### 🔐 Authentication & Authorization
- User Registration & Login
- Logout
- Role-based Access Control (Admin & Staff)
- Custom 403 Access Denied Page

### 📊 Dashboard
- Total Categories
- Total Suppliers
- Total Products
- Low Stock Counter
- Recent Stock Movements

### 📂 Category Management
- Create Category
- Edit Category
- Delete Category
- Category Validation

### 🚚 Supplier Management
- Create Supplier
- Edit Supplier
- Delete Supplier

### 📦 Product Management
- Create Product
- Edit Product
- Delete Product
- Live AJAX Product Search
- Low Stock Status

### 🔄 Inventory Management
- Stock In
- Stock Out
- Automatic Quantity Updates
- Stock Movement History
- Transaction-Based Operations

### 📈 Reports
- Low Stock Report

### 🗄 Database
- Laravel Migrations
- Database Seeders
- Eloquent Relationships

---

## 🛠 Technologies

- PHP 8.4
- Laravel 13
- MySQL
- Bootstrap 5
- JavaScript (AJAX)
- Blade
- Vite

---

## 🏗 Architecture

This project follows Laravel best practices:

- MVC Architecture
- Service Layer
- Form Request Validation
- Middleware Authorization
- Eloquent ORM Relationships
- Database Transactions
- Database Seeders

---

## 🚀 Installation

Clone the repository:

```bash
git clone https://github.com/YOUR_USERNAME/stockpilot.git
```

Go to the project folder:

```bash
cd stockpilot
```

Install dependencies:

```bash
composer install
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Run migrations and seed the database:

```bash
php artisan migrate:fresh --seed
```

Start Vite:

```bash
npm run dev
```

Run the Laravel server:

```bash
php artisan serve
```

---

## 👤 Demo Accounts

### Administrator

Email:

```
admin@stockpilot.com
```

Password:

```
password
```

### Staff

Create a new account using the Register page.

Every newly registered user is automatically assigned the **Staff** role.

---

## 📸 Screenshots

### Login

_Add screenshot here_

### Dashboard

_Add screenshot here_

### Categories

_Add screenshot here_

### Suppliers

_Add screenshot here_

### Products

_Add screenshot here_

### Stock Movements

_Add screenshot here_

### Low Stock Report

_Add screenshot here_

---

## 📁 Project Structure

```
app/
 ├── Http/
 │   ├── Controllers/
 │   ├── Middleware/
 │   └── Requests/
 │
 ├── Models/
 └── Services/

database/
 ├── migrations/
 └── seeders/

resources/
 └── views/

routes/
```

---

## 🔮 Future Improvements

- Product Images
- User Management Module
- Export Reports (PDF / Excel)
- Dashboard Charts
- Barcode Support
- Email Notifications

---

## 📄 License

This project is licensed under the MIT License.
