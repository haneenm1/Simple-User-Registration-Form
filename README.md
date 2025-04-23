# 📄 README

## 👨‍💻 Project Title: Simple User Registration Form

## 📝 Description:
This is a basic PHP web application that allows users to register by submitting their name, age, email, address, and college. The data is validated, and if correct, it is stored in a MySQL database. Duplicate emails are not allowed.

## 🧰 Technologies Used:
- 🐘 PHP
- 🌐 HTML
- 💾 MySQL
- 🔗 MySQLi (PHP extension for DB interaction)

## 📋 Features:
- User registration with:
  - Name
  - Age
  - Email
  - Address
  - College (select menu)
- Email validation using PHP's built-in filter.
- Duplicate email checking.
- Display of error messages if validation fails.
- Insert data into a MySQL database.

## 🗂️ Database Structure:
**Database name:** `registration`  
**Table name:** `users`  
**Table columns:**
- `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `name` (VARCHAR)
- `age` (INT)
- `email` (VARCHAR, UNIQUE)
- `address` (VARCHAR)
- `college` (VARCHAR)

### SQL to create the table:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    email VARCHAR(100) UNIQUE,
    address VARCHAR(255),
    college VARCHAR(100)
);


