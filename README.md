# 🛒 ShopEasy — Online Shopping System

A full-stack e-commerce prototype built for the MCA Web Design curriculum (MC4014A – Assignment 2), demonstrating a responsive front-end, event-driven cart management, asynchronous data retrieval, and a PHP/MySQL backend.

![Status](https://img.shields.io/badge/status-academic%20project-blue)
![PHP](https://img.shields.io/badge/PHP-8.2-777bb4)
![MySQL](https://img.shields.io/badge/MySQL-10.4.x-4479A1)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-7952B3)
![jQuery](https://img.shields.io/badge/jQuery-3.6.0-0769AD)
![License](https://img.shields.io/badge/license-MIT-green)

---

## 📖 Overview

**ShopEasy** is a database-backed online shopping system that lets users browse a product catalog, manage a shopping cart in real time, and register/log in securely — all without full-page reloads. It was built to demonstrate practical full-stack workflows: responsive UI design, client-side interactivity, AJAX data fetching, and server-side authentication and persistence.

## ✨ Features

- 🏠 **Responsive home & catalog page** built with Bootstrap 5 grids and cards
- 🎨 **CSS3 animations** — hover elevation, transitions, and button pulse effects
- 🧩 **ES6 `Product` class** encapsulating product data and event bindings
- 🖱️ **jQuery-driven cart** — add, remove, and update items dynamically without reloading
- 🌀 **Visual feedback** via `fadeIn()`, `fadeOut()`, `slideToggle()`, and `animate()`
- ⚡ **AJAX product retrieval** — JSON catalog data fetched from a PHP backend
- 🔐 **Secure authentication** — `password_hash()` / `password_verify()` for registration and login
- 🗂️ **PHP data handling** — arrays, associative configs, and flat-file access logging
- 🍪 **Session & cookie management** — persistent login state and stored preferences
- 🗄️ **MySQL persistence** — normalized `customers` and `products` tables via phpMyAdmin

## 🛠️ Tech Stack

| Layer | Technologies |
|---|---|
| **Front-end** | HTML5, CSS3, Bootstrap 5.3.0 |
| **Client scripting** | JavaScript (ES2021), jQuery 3.6.0+, AJAX |
| **Back-end** | PHP 8.2 |
| **Database** | MySQL / MariaDB 10.4.x, phpMyAdmin |
| **Server environment** | Apache 2.4.x (via XAMPP) |

## 🏗️ Architecture

```
[ CLIENT TIER: Browser ]
  HTML5 / CSS3 / Bootstrap 5  +  JavaScript ES6 / jQuery
        │
        │  HTTP POST (forms)  /  jQuery $.ajax() GET-POST
        ▼
[ APPLICATION TIER: Apache + PHP ]
  index.php · products.php · login.php · register.php
  Session handlers ($_SESSION) · Cookies · File I/O logging
        │
        │  mysqli / PDO
        ▼
[ DATA TIER: MySQL ]
  Tables: customers, products
```

## 🗄️ Database Schema

**Database:** `online_shopping`

### `customers`
| Column | Type | Constraint | Description |
|---|---|---|---|
| `id` | `INT(11)` | PK, AUTO_INCREMENT | Unique customer identifier |
| `name` | `VARCHAR(100)` | NOT NULL | Full name |
| `email` | `VARCHAR(100)` | NOT NULL, UNIQUE | Login username |
| `password` | `VARCHAR(255)` | NOT NULL | Hashed password |

### `products`
| Column | Type | Constraint | Description |
|---|---|---|---|
| `id` | `INT(11)` | PK, AUTO_INCREMENT | Unique product identifier |
| `name` | `VARCHAR(150)` | NOT NULL | Product name |
| `category` | `VARCHAR(50)` | NOT NULL | e.g. Fashion, Electronics |
| `price` | `DECIMAL(10,2)` | NOT NULL | Retail unit price |
| `description` | `TEXT` | NULL | Item specifications |
| `image` | `VARCHAR(255)` | NOT NULL | Relative asset path |

## 📁 Project Structure

```
online-shopping/
├── index.php              # Home & product listing page
├── products.php           # AJAX-loaded product catalog
├── register.php           # Customer registration
├── login.php               # Customer authentication
├── db.php                 # Centralized MySQL connector
├── ajax/
│   └── products.php       # JSON endpoint for AJAX catalog fetch
├── assets/
│   ├── css/                # Custom stylesheets (transitions, animations)
│   ├── js/                 # Product class, cart logic, jQuery handlers
│   └── images/              # Product images
├── system_access.log       # Flat-file access/audit log
└── README.md
```

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL/MariaDB + PHP 8.2)
- A modern browser (Chrome 120+ recommended)

### Installation

1. **Clone the repository** into your XAMPP `htdocs` folder:
   ```bash
   git clone https://github.com/<your-username>/shopeasy.git C:/xampp/htdocs/online-shopping
   ```

2. **Start Apache and MySQL** from the XAMPP Control Panel.

3. **Create the database:**
   - Open `http://localhost/phpmyadmin`
   - Create a database named `online_shopping`
   - Import the schema (or run the `customers`/`products` `CREATE TABLE` statements from [Database Schema](#-database-schema))

4. **Configure the database connection** in `db.php`:
   ```php
   $host     = "localhost";
   $username = "root";
   $password = "";
   $database = "online_shopping";
   ```

5. **Launch the app** in your browser:
   ```
   http://localhost/online-shopping/index.php
   ```

## 🔗 Key Routes

| Route | Description |
|---|---|
| `/index.php` | Home page & product catalog |
| `/products.php` | AJAX-driven catalog view |
| `/register.php` | New customer sign-up |
| `/login.php` | Customer sign-in |
| `/phpmyadmin` | Database administration console |

## ✅ Testing

Manual functional testing covered home page load, product grid rendering, AJAX retrieval, registration, login, navigation routing, and local server stack startup — all verified passing. See the full test log in the project report.

## ⚠️ Known Limitations

- Product thumbnails may fail to load if relative image paths are missing
- Cart state is held in client-side memory only (resets on tab close)
- Basic error handling; no inline field-level validation yet
- No role-restricted admin dashboard in the current build

## 🗺️ Roadmap

- [ ] Integrate a payment gateway sandbox (Razorpay / Stripe / PayPal)
- [ ] Persist cart items in a `cart_items` database table
- [ ] Build an authenticated admin dashboard for product/sales management
- [ ] Add real-time, debounced search and category/price filtering
- [ ] Send transactional emails via PHPMailer/SMTP

## 👤 Author

**Akshaya Kishore**
MCA, Department of Computer Applications
S.A. Engineering College, Chennai

## 📚 References

- [W3Schools — PHP Tutorial](https://www.w3schools.com/php/)
- [Bootstrap 5.3 Documentation](https://getbootstrap.com/docs/5.3/)
- [jQuery API Documentation](https://api.jquery.com/)
- [MDN Web Docs — JavaScript](https://developer.mozilla.org/)
- [MySQL 8.0 Reference Manual](https://dev.mysql.com/doc/)
- [XAMPP Documentation](https://www.apachefriends.org/)

## 📄 License

This project was developed for academic purposes as part of the MCA Web Design curriculum (MC4014A, Anna University). Feel free to use it as a learning reference.
