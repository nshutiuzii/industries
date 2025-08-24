-- Finance Website Database Schema
-- Run this file to create the database and tables

CREATE DATABASE IF NOT EXISTS finance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE finance;

-- Users table for authentication
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(160) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','user') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Services offered by the company
CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  description TEXT,
  icon VARCHAR(80),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Blog posts
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  content TEXT,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Customer testimonials
CREATE TABLE testimonials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  author VARCHAR(120),
  role_company VARCHAR(160),
  quote TEXT,
  avatar VARCHAR(255),
  rating TINYINT DEFAULT 5,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Pricing plans
CREATE TABLE pricing (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plan VARCHAR(120),
  price DECIMAL(10,2),
  period ENUM('mo','yr') DEFAULT 'mo',
  features TEXT,
  featured TINYINT(1) DEFAULT 0
);

-- Contact form leads
CREATE TABLE leads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(160),
  phone VARCHAR(40),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user (password: admin123)
INSERT INTO users (name, email, password_hash, role) VALUES 
('Admin User', 'admin@financepro.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
