<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# 🛒 Mini ECommerce Cart in Laravel

A minimalist Laravel-based ECommerce Cart application utilizing **Laravel Sessions** to manage cart functionalities like Add to Cart, Update Quantity, Remove Items, Clear Cart, and Checkout Simulation. Designed for beginners learning **Laravel CRUD operations** and **Session Management**.

---

## 🚀 Features
- Product Listing with Add to Cart functionality.
- View Cart with Product Quantity, Price, Subtotal, and Grand Total.
- Update Product Quantity directly in Cart.
- Remove Single Product from Cart.
- Clear Entire Cart.
- Session-based Cart Storage (No Database Storage for Products).
- Responsive Design using TailwindCSS.
- Flash Messages for Add/Remove/Checkout actions.

---

## 🖼️ Screenshots

### 🛍️ Product Listing Page
<img src="shots/products.png" width="700">

---

### ➕ Product Added to Cart
<img src="shots/added%20to%20cart.png" width="700">

---

### 🛒 View Cart with Items
<img src="shots/cart.png" width="700">

---

### ✅ Checkout Confirmation
<img src="shots/checkout.png" width="700">

---

### 🗑️ Cart Cleared Message
<img src="shots/cart%20cleared.png" width="700">

---

## 📦 Installation Steps

```bash
git clone https://github.com/YourUsername/Ecommerce-Cart.git
cd Ecommerce-Cart
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
