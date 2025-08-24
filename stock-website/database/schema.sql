-- Stock Management Database Schema

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'stock_manager', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories table
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    color VARCHAR(7) DEFAULT '#007bff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Locations table
CREATE TABLE locations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address TEXT,
    contact_person VARCHAR(100),
    contact_phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Stock Items table
CREATE TABLE stock_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sku VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    category_id INT,
    location_id INT,
    quantity INT DEFAULT 0,
    unit_price DECIMAL(10,2) DEFAULT 0.00,
    reorder_level INT DEFAULT 10,
    min_order_quantity INT DEFAULT 1,
    supplier VARCHAR(100),
    barcode VARCHAR(100),
    image_url VARCHAR(255),
    status ENUM('active', 'inactive', 'discontinued') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE SET NULL
);

-- Stock Movements table
CREATE TABLE stock_movements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    type ENUM('in', 'out', 'transfer', 'return', 'adjustment') NOT NULL,
    quantity INT NOT NULL,
    reference VARCHAR(100),
    notes TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES stock_items(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Stock Transfers table
CREATE TABLE stock_transfers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    from_location_id INT NOT NULL,
    to_location_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    transfer_date DATE NOT NULL,
    status ENUM('pending', 'in_transit', 'completed', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (to_location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES stock_items(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Stock Returns table
CREATE TABLE stock_returns (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    return_type ENUM('damaged', 'expired', 'wrong_item', 'other') NOT NULL,
    quantity INT NOT NULL,
    return_reason TEXT,
    return_date DATE NOT NULL,
    status ENUM('pending', 'approved', 'rejected', 'processed') DEFAULT 'pending',
    notes TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES stock_items(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Stock Counts table (for inventory audits)
CREATE TABLE stock_counts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    location_id INT NOT NULL,
    count_date DATE NOT NULL,
    status ENUM('draft', 'in_progress', 'completed', 'approved') DEFAULT 'draft',
    notes TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Stock Count Items table
CREATE TABLE stock_count_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    count_id INT NOT NULL,
    item_id INT NOT NULL,
    expected_quantity INT NOT NULL,
    actual_quantity INT,
    variance INT,
    notes TEXT,
    FOREIGN KEY (count_id) REFERENCES stock_counts(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES stock_items(id) ON DELETE CASCADE
);

-- Alerts table
CREATE TABLE alerts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type ENUM('low_stock', 'out_of_stock', 'expiry', 'system') NOT NULL,
    title VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    item_id INT,
    severity ENUM('low', 'medium', 'high', 'critical') DEFAULT 'medium',
    status ENUM('active', 'acknowledged', 'resolved') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    acknowledged_at TIMESTAMP NULL,
    acknowledged_by INT,
    FOREIGN KEY (item_id) REFERENCES stock_items(id) ON DELETE CASCADE,
    FOREIGN KEY (acknowledged_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Settings table
CREATE TABLE settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    description TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default data
INSERT INTO users (name, email, password, role) VALUES 
('Admin User', 'admin@stockpro.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('Stock Manager', 'manager@stockpro.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'stock_manager');

INSERT INTO categories (name, description, color) VALUES 
('Electronics', 'Electronic devices and components', '#007bff'),
('Office Supplies', 'Office stationery and supplies', '#28a745'),
('Furniture', 'Office furniture and fixtures', '#ffc107'),
('IT Equipment', 'Computers, printers, and IT accessories', '#17a2b8'),
('Maintenance', 'Maintenance tools and equipment', '#6c757d');

INSERT INTO locations (name, address, contact_person, contact_phone) VALUES 
('Main Warehouse', '123 Warehouse Street, Kigali', 'John Doe', '+250 788 123 456'),
('Office Storage', '456 Office Building, Kigali', 'Jane Smith', '+250 788 789 012'),
('Branch Warehouse', '789 Branch Road, Kigali', 'Mike Johnson', '+250 788 345 678');

INSERT INTO settings (setting_key, setting_value, description) VALUES 
('low_stock_threshold', '10', 'Threshold for low stock alerts'),
('critical_stock_threshold', '5', 'Threshold for critical stock alerts'),
('default_currency', 'RWF', 'Default currency for the system'),
('default_location', '1', 'Default location ID for new items');
