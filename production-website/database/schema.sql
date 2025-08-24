-- Production Management System Database Schema

-- Create database
CREATE DATABASE IF NOT EXISTS production_management;
USE production_management;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'production_manager', 'supervisor', 'operator') NOT NULL DEFAULT 'operator',
    department_id INT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    phone VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Departments table
CREATE TABLE departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    manager_id INT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products table
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    sku VARCHAR(50) UNIQUE,
    category VARCHAR(50),
    unit_price DECIMAL(10,2),
    target_cycle_time INT, -- in minutes
    quality_standard DECIMAL(5,2), -- percentage
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Machines table
CREATE TABLE machines (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    model VARCHAR(100),
    serial_number VARCHAR(100),
    department_id INT,
    capacity INT,
    efficiency_target DECIMAL(5,2), -- percentage
    maintenance_schedule DATE,
    status ENUM('active', 'maintenance', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Materials table
CREATE TABLE materials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    sku VARCHAR(50) UNIQUE,
    category VARCHAR(50),
    unit VARCHAR(20),
    current_stock DECIMAL(10,2) DEFAULT 0,
    reorder_level DECIMAL(10,2),
    supplier_id INT,
    unit_cost DECIMAL(10,2),
    status ENUM('active', 'inactive') DEFAULT 'active',
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Suppliers table
CREATE TABLE suppliers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    contact_person VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Production Plans table
CREATE TABLE production_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT NOT NULL,
    machine_id INT NOT NULL,
    target_quantity INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status ENUM('pending', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
    priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
    notes TEXT,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (machine_id) REFERENCES machines(id),
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Daily Production Log table
CREATE TABLE daily_production_log (
    id INT PRIMARY KEY AUTO_INCREMENT,
    production_plan_id INT,
    product_id INT NOT NULL,
    machine_id INT NOT NULL,
    operator_id INT NOT NULL,
    quantity_produced INT NOT NULL,
    quality_score DECIMAL(5,2),
    production_date DATE NOT NULL,
    shift_start TIME,
    shift_end TIME,
    downtime_minutes INT DEFAULT 0,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (production_plan_id) REFERENCES production_plans(id),
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (machine_id) REFERENCES machines(id),
    FOREIGN KEY (operator_id) REFERENCES users(id)
);

-- Machine Usage table
CREATE TABLE machine_usage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    machine_id INT NOT NULL,
    operator_id INT NOT NULL,
    product_id INT,
    start_time DATETIME NOT NULL,
    end_time DATETIME,
    hours_worked DECIMAL(4,2),
    efficiency_percentage DECIMAL(5,2),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (machine_id) REFERENCES machines(id),
    FOREIGN KEY (operator_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Material Tracker table
CREATE TABLE material_tracker (
    id INT PRIMARY KEY AUTO_INCREMENT,
    material_id INT NOT NULL,
    transaction_type ENUM('in', 'out', 'adjustment') NOT NULL,
    quantity DECIMAL(10,2) NOT NULL,
    reference VARCHAR(100),
    notes TEXT,
    user_id INT NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (material_id) REFERENCES materials(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Alerts table
CREATE TABLE alerts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('info', 'warning', 'error', 'success') DEFAULT 'info',
    priority ENUM('low', 'medium', 'high', 'critical') DEFAULT 'medium',
    status ENUM('active', 'acknowledged', 'resolved') DEFAULT 'active',
    related_entity VARCHAR(50),
    entity_id INT,
    created_by INT,
    acknowledged_by INT,
    acknowledged_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id),
    FOREIGN KEY (acknowledged_by) REFERENCES users(id)
);

-- Insert sample data
INSERT INTO departments (name, description) VALUES 
('Production Line A', 'Main production line for product A'),
('Production Line B', 'Secondary production line for product B'),
('Quality Control', 'Quality assurance and testing department'),
('Maintenance', 'Machine maintenance and repair team');

INSERT INTO products (name, description, sku, category, unit_price, target_cycle_time, quality_standard) VALUES 
('BISCUIT Classic', 'Traditional biscuit product', 'BIS-001', 'Biscuits', 150.00, 2, 95.00),
('BISCUIT Premium', 'Premium quality biscuit', 'BIS-002', 'Biscuits', 250.00, 3, 98.00),
('BISCUIT Chocolate', 'Chocolate coated biscuit', 'BIS-003', 'Biscuits', 200.00, 2.5, 96.00);

INSERT INTO machines (name, model, serial_number, department_id, capacity, efficiency_target) VALUES 
('Mixer A1', 'Industrial Mixer 5000', 'MIX-001', 1, 1000, 90.00),
('Oven B1', 'Conveyor Oven 2000', 'OVN-001', 1, 800, 85.00),
('Packager C1', 'Auto Packager 3000', 'PKG-001', 1, 1200, 95.00);

INSERT INTO materials (name, description, sku, category, unit, current_stock, reorder_level, unit_cost) VALUES 
('Flour', 'Premium wheat flour', 'MAT-001', 'Raw Materials', 'kg', 5000.00, 1000.00, 120.00),
('Sugar', 'Granulated white sugar', 'MAT-002', 'Raw Materials', 'kg', 3000.00, 800.00, 150.00),
('Butter', 'Unsalted butter', 'MAT-003', 'Raw Materials', 'kg', 2000.00, 500.00, 800.00);

INSERT INTO suppliers (name, contact_person, email, phone) VALUES 
('Flour Co Ltd', 'John Smith', 'john@flourco.com', '+250788123456'),
('Sugar Suppliers', 'Jane Doe', 'jane@sugarsuppliers.com', '+250788789012'),
('Dairy Products', 'Mike Johnson', 'mike@dairyproducts.com', '+250788345678');

-- Insert admin user
INSERT INTO users (username, email, password, role, first_name, last_name) VALUES 
('admin', 'admin@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'Admin', 'User');
