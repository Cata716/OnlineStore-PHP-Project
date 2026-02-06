# Online Store PHP Project

A complete web application for an online store with administration panel, product management, shopping cart functionality, and contact form.

## Project Description

This project is an e-commerce application developed in PHP with MySQL, implementing all required functionalities for an online store management system.

### Project Requirements Implementation:

**A. ADMIN Module** - Complete administration system for product management
**B. STORE Module** - Customer-facing store with authentication and shopping
**C. Shopping Cart** - Full cart management with quantity updates
**D. Database** - MySQL database with all necessary tables
**BONUS:** Contact form with email functionality

## Technologies Used

- **Backend:** PHP
- **Database:** MySQL (phpMyAdmin)
- **Frontend:** HTML, CSS, JavaScript
- **Email:** SMTP (Gmail) via sendmail

## Project Structure

```
ProiectPHP/
│
├── admin_module/              # ADMIN MODULE
│   ├── register_admin.php     # Admin registration
│   ├── login_admin.php        # Admin login
│   ├── admin_home.php         # Admin dashboard
│   ├── admin_add_product.php  # Add new products
│   ├── admin_edit_product.php # Edit existing products
│   ├── admin_delete_product.php # Delete products
│   ├── logout_admin.php       # Admin logout
│   └── db_controller.php      # Database connection
│
├── magazin_module/            # STORE MODULE (for customers)
│   ├── index.php              # Store homepage
│   ├── produse.php            # Products listing by category
│   ├── produs.php             # Single product details
│   ├── register.php           # Customer registration
│   ├── login.php              # Customer login
│   ├── logout.php             # Customer logout
│   └── DBController.php       # Database connection
│
├── cart_module/               # SHOPPING CART MODULE
│   ├── cart.php               # View shopping cart
│   ├── addToCart.php          # Add product to cart
│   ├── updateCart.php         # Update product quantity
│   ├── removeFromCart.php     # Remove single product
│   ├── emptyCart.php          # Empty entire cart
│   └── DBController.php       # Database connection
│
├── contact_module/            # CONTACT MODULE (BONUS)
│   ├── index.php              # Contact form
│   └── send_script.php        # Email sending script
│
└── magazin2proiect.sql        # Database structure and sample data
```

## Installation and Setup

### Prerequisites
- **XAMPP** or **WAMP** (local server with PHP and MySQL)
- **PHP 7.4** or higher
- **phpMyAdmin**
- **Web browser**

### Installation Steps

#### 1. Download the Project
```bash
git clone https://github.com/Cata716/ProiectPHP.git
```
Or download as ZIP and extract to your local server folder.

#### 2. Place Project Files
- **XAMPP:** Place folder in `C:\xampp\htdocs\`
- **WAMP:** Place folder in `C:\wamp64\www\`

#### 3. Import Database
1. Start **Apache** and **MySQL** from XAMPP/WAMP Control Panel
2. Open browser and go to: `http://localhost/phpmyadmin`
3. Create new database named: **`magazin2proiect`**
4. Click on the database
5. Go to **Import** tab
6. Choose file: `magazin2proiect.sql`
7. Click **Go** to import

#### 4. Configure Database Connection (if needed)
If your MySQL username/password is different from default:
- Edit `admin_module/db_controller.php`
- Edit `magazin_module/DBController.php`
- Edit `cart_module/DBController.php`

Update these lines:
```php
private $host = "localhost";
private $user = "root";           // Change if different
private $password = "";           // Change if you have a password
private $database = "magazin2proiect";
```

#### 5. Access the Application

**Admin Panel:**
```
http://localhost/ProiectPHP/admin_module/login_admin.php
```

**Customer Store:**
```
http://localhost/ProiectPHP/magazin_module/index.php
```

**Contact Form:**
```
http://localhost/ProiectPHP/contact_module/index.php
```

## Test Accounts

### Admin Accounts:
- Username: `admin1` | Email: `admin1@admin.ro`
- Username: `catalina` | Email: `catalina@gmail.com`

*(Passwords are hashed in database - use the password you set during registration)*

### Customer Accounts:
- Username: `alex_shop` | Password: `alex123`
- Username: `mihai_store` | Password: `mihai456`
- Username: `cristina_buy` | Password: `cristina789`

## Features

### A. ADMIN MODULE Features:

1. **Admin Registration** (`register_admin.php`)
   - Create new admin account
   - Password encryption (bcrypt)
   - Email validation

2. **Admin Login** (`login_admin.php`)
   - Secure authentication
   - Session management
   - Password verification

3. **Admin Dashboard** (`admin_home.php`)
   - View all products
   - Quick access to management functions
   - Product statistics

4. **Add Product** (`admin_add_product.php`)
   - Add new products to store
   - Set product details (name, code, price, description)
   - Set product category
   - Add product image URL

5. **Edit Product** (`admin_edit_product.php`)
   - Update existing product information
   - Modify prices and descriptions
   - Change product categories

6. **Delete Product** (`admin_delete_product.php`)
   - Remove products from store
   - Confirmation before deletion

7. **Logout** (`logout_admin.php`)
   - Secure session termination

### B. STORE MODULE Features (for Customers):

**User Flow:**
1. Customer views store homepage with product categories
2. Selects a category to view products
3. Clicks on a product to see details
4. Clicks "Add to Cart"
5. If not logged in → redirected to login page
6. After login → product is added to cart with quantity and user ID

**Pages:**
- `index.php` - Store homepage with categories
- `produse.php` - Products listing by category
- `register.php` - New customer registration
- `login.php` - Customer login
- `logout.php` - Customer logout

### C. SHOPPING CART Features:

In `cart.php`, users can:
-  View all products in cart
-  Update product quantities (`updateCart.php`)
-  Remove single product (`removeFromCart.php`)
-  Empty entire cart (`emptyCart.php`)
-  Continue shopping (return to store)
-  View total price
-  Logout

### D. BONUS - Contact Form:

- Contact form with fields: name, email, subject, message
- Email sending functionality via SMTP
- Form validation

## Security Features

-  **Password Encryption:** All passwords hashed with `password_hash()` (bcrypt)
-  **SQL Injection Protection:** Prepared statements in all database queries
-  **Session Management:** Secure PHP sessions for authentication
-  **Authentication Required:** Cart operations require user login
-  **Input Validation:** Form data validation and sanitization

## Database Structure

### Tables:

**1. admins** - Administrator accounts
- id (primary key)
- username
- password (hashed)
- email

**2. users** - Customer accounts
- id (primary key)
- username
- password (hashed)
- email

**3. tbl_product** - Products catalog
- id (primary key)
- name
- code
- image (URL)
- price
- descriere (description)
- categorie (category)

**4. tbl_cart** - Shopping cart items
- id (primary key)
- product_id (foreign key to tbl_product)
- quantity
- id_member (foreign key to users)

## Product Categories

- **Electronics** (Electronice)
- **Photo-Video** (Foto-Video)
- **Audio**
- **Computers** (Calculatoare)
- **Phones** (Telefoane)

## How to Use

### For Administrators:

1. **Register/Login** as admin
2. **Add Products:**
   - Go to Add Product
   - Fill in product details (name, code, price, description, category, image URL)
   - Submit
3. **Manage Products:**
   - View all products in dashboard
   - Edit or delete products as needed

### For Customers:

1. **Browse Store:**
   - Visit store homepage
   - Browse products by category
2. **Shopping:**
   - Click on product to view details
   - Click "Add to Cart"
   - If not logged in, register or login first
3. **Manage Cart:**
   - View cart
   - Update quantities or remove items
   - Continue shopping or proceed to checkout

## Author

**Lupu Catalina** - https://github.com/Cata716

## License

This project was created for educational purposes as part of a PHP web development course.

---

## Project Requirements Met

 **A. Admin Module** - Complete with all 7 required pages
 **B. Store Module** - Full customer-facing store with authentication
 **C. Shopping Cart** - All cart management features implemented
 **D. Database** - MySQL database with all required tables
 **Bonus:** Contact form with email functionality

---
