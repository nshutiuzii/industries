-- Quality Control System Database Schema
-- Database: quality_control_db

CREATE DATABASE IF NOT EXISTS quality_control_db;
USE quality_control_db;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'quality_manager', 'qc_inspector', 'operator') NOT NULL,
    department VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Quality batches table
CREATE TABLE quality_batches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    batch_number VARCHAR(50) UNIQUE NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    production_date DATE NOT NULL,
    quality_score DECIMAL(5,2) DEFAULT 0,
    status ENUM('pending', 'approved', 'rejected', 'under_review') DEFAULT 'pending',
    notes TEXT,
    created_by INT,
    approved_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id),
    FOREIGN KEY (approved_by) REFERENCES users(id)
);

-- QC issues table
CREATE TABLE qc_issues (
    id INT PRIMARY KEY AUTO_INCREMENT,
    issue_type ENUM('defect', 'contamination', 'dimension_error', 'packaging_issue', 'other') NOT NULL,
    severity ENUM('low', 'medium', 'high', 'critical') NOT NULL,
    description TEXT NOT NULL,
    batch_id INT,
    reported_by INT,
    assigned_to INT,
    status ENUM('open', 'investigating', 'resolved', 'closed') DEFAULT 'open',
    resolution_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    resolved_at TIMESTAMP NULL,
    FOREIGN KEY (batch_id) REFERENCES quality_batches(id),
    FOREIGN KEY (reported_by) REFERENCES users(id),
    FOREIGN KEY (assigned_to) REFERENCES users(id)
);

-- Quality tests table
CREATE TABLE quality_tests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    test_name VARCHAR(100) NOT NULL,
    test_method VARCHAR(100),
    parameters JSON,
    expected_results TEXT,
    actual_results TEXT,
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    tester_id INT,
    batch_id INT,
    status ENUM('pending', 'in_progress', 'completed', 'failed') DEFAULT 'pending',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tester_id) REFERENCES users(id),
    FOREIGN KEY (batch_id) REFERENCES quality_batches(id),
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Test methods table
CREATE TABLE test_methods (
    id INT PRIMARY KEY AUTO_INCREMENT,
    method_name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    parameters JSON,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Compliance checklists table
CREATE TABLE compliance_checklists (
    id INT PRIMARY KEY AUTO_INCREMENT,
    checklist_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    description TEXT,
    items JSON,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Quality standards table
CREATE TABLE quality_standards (
    id INT PRIMARY KEY AUTO_INCREMENT,
    standard_name VARCHAR(100) NOT NULL,
    standard_code VARCHAR(50),
    description TEXT,
    requirements JSON,
    effective_date DATE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Quality audits table
CREATE TABLE quality_audits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    audit_type ENUM('internal', 'external', 'regulatory') NOT NULL,
    audit_name VARCHAR(100) NOT NULL,
    auditor_id INT,
    scheduled_date DATE NOT NULL,
    actual_date DATE,
    status ENUM('scheduled', 'in_progress', 'completed', 'cancelled') DEFAULT 'scheduled',
    findings TEXT,
    recommendations TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (auditor_id) REFERENCES users(id)
);

-- Quality audit log table
CREATE TABLE quality_audit_log (
    id INT PRIMARY KEY AUTO_INCREMENT,
    action VARCHAR(100) NOT NULL,
    details TEXT,
    user_id INT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample data

-- Sample users
INSERT INTO users (username, email, password_hash, full_name, role, department) VALUES
('admin', 'admin@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin', 'IT'),
('quality_mgr', 'quality@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Quality Manager', 'quality_manager', 'Quality Control'),
('inspector1', 'inspector1@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QC Inspector 1', 'qc_inspector', 'Quality Control'),
('inspector2', 'inspector2@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QC Inspector 2', 'qc_inspector', 'Quality Control'),
('operator1', 'operator1@adma.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Production Operator', 'operator', 'Production');

-- Sample quality batches
INSERT INTO quality_batches (batch_number, product_name, quantity, production_date, quality_score, status, created_by) VALUES
('BATCH-20241201-ABCD', 'Product A', 1000, '2024-12-01', 95.5, 'approved', 3),
('BATCH-20241201-EFGH', 'Product B', 800, '2024-12-01', 87.2, 'pending', 3),
('BATCH-20241202-IJKL', 'Product A', 1200, '2024-12-02', 92.8, 'approved', 4),
('BATCH-20241202-MNOP', 'Product C', 600, '2024-12-02', 78.5, 'rejected', 4),
('BATCH-20241203-QRST', 'Product B', 900, '2024-12-03', 89.1, 'pending', 3);

-- Sample QC issues
INSERT INTO qc_issues (issue_type, severity, description, batch_id, reported_by, status) VALUES
('defect', 'high', 'Surface finish below specification', 4, 3, 'open'),
('contamination', 'medium', 'Minor dust particles detected', 2, 4, 'investigating'),
('dimension_error', 'low', 'Slight size variation within tolerance', 1, 3, 'resolved'),
('packaging_issue', 'medium', 'Label alignment issue', 3, 4, 'open');

-- Sample test methods
INSERT INTO test_methods (method_name, description, category, parameters) VALUES
('Visual Inspection', 'Standard visual quality assessment', 'Inspection', '{"duration": "5min", "lighting": "standard", "magnification": "1x"}'),
('Dimensional Check', 'Measurements using calipers and gauges', 'Measurement', '{"tolerance": "±0.1mm", "instruments": ["caliper", "gauge"]}'),
('Weight Verification', 'Product weight measurement', 'Measurement', '{"scale_precision": "0.01g", "tolerance": "±2%"}'),
('Material Testing', 'Material composition verification', 'Laboratory', '{"test_duration": "24h", "temperature": "25°C"}');

-- Sample compliance checklists
INSERT INTO compliance_checklists (checklist_name, category, description, items) VALUES
('Production Line QC', 'Production', 'Daily quality control checklist for production line', '["Equipment calibration", "Material verification", "Process parameters", "Output sampling"]'),
('Safety Compliance', 'Safety', 'Workplace safety compliance checklist', '["PPE availability", "Emergency exits", "Fire extinguishers", "First aid kits"]'),
('Documentation Review', 'Administrative', 'Quality documentation review checklist', '["Batch records", "Test results", "Approval signatures", "Document versioning"]');

-- Sample quality standards
INSERT INTO quality_standards (standard_name, standard_code, description, requirements, effective_date) VALUES
('ISO 9001:2015', 'ISO9001-2015', 'Quality Management Systems', '{"documentation": "required", "audit_frequency": "annual", "continuous_improvement": "mandatory"}', '2024-01-01'),
('Product Specification A', 'PS-A-001', 'Product A quality specifications', '{"dimensions": "100±0.1mm", "weight": "50±2g", "finish": "smooth"}', '2024-01-01'),
('Material Standards', 'MS-001', 'Raw material quality standards', '{"purity": "99.5%", "moisture": "<0.1%", "particle_size": "0.1-1.0mm"}', '2024-01-01');

-- Sample quality audits
INSERT INTO quality_audits (audit_type, audit_name, auditor_id, scheduled_date, status) VALUES
('internal', 'Monthly Quality Review', 2, '2024-12-15', 'scheduled'),
('external', 'ISO Certification Audit', 2, '2024-12-20', 'scheduled'),
('regulatory', 'Safety Compliance Check', 2, '2024-12-10', 'completed');

-- Sample quality tests
INSERT INTO quality_tests (test_name, test_method, parameters, expected_results, created_by, batch_id, status) VALUES
('Visual Quality Check', 'Visual Inspection', '{"duration": "5min", "lighting": "standard"}', 'No visible defects, smooth finish', 3, 1, 'completed'),
('Dimensional Verification', 'Dimensional Check', '{"tolerance": "±0.1mm"}', 'All dimensions within specification', 4, 2, 'in_progress'),
('Weight Verification', 'Weight Verification', '{"tolerance": "±2%"}', 'Weight within 48-52g range', 3, 3, 'pending');

-- Create indexes for better performance
CREATE INDEX idx_batch_number ON quality_batches(batch_number);
CREATE INDEX idx_batch_status ON quality_batches(status);
CREATE INDEX idx_batch_date ON quality_batches(production_date);
CREATE INDEX idx_issue_severity ON qc_issues(severity);
CREATE INDEX idx_issue_status ON qc_issues(status);
CREATE INDEX idx_test_status ON quality_tests(status);
CREATE INDEX idx_audit_date ON quality_audits(scheduled_date);
CREATE INDEX idx_user_role ON users(role);
