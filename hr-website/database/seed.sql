-- Seed data for HR System
-- Run this after creating the schema

USE hr_system;

-- Insert sample employees
INSERT INTO employees (name, email, phone, department_id, position, hire_date, salary, status) VALUES
('John Doe', 'john.doe@company.com', '+250788123456', 1, 'HR Manager', '2022-01-15', 2500000, 'active'),
('Jane Smith', 'jane.smith@company.com', '+250788123457', 2, 'Software Developer', '2022-03-20', 3000000, 'active'),
('Mike Johnson', 'mike.johnson@company.com', '+250788123458', 3, 'Accountant', '2022-02-10', 2200000, 'active'),
('Sarah Wilson', 'sarah.wilson@company.com', '+250788123459', 4, 'Marketing Specialist', '2022-04-05', 2000000, 'active'),
('David Brown', 'david.brown@company.com', '+250788123460', 5, 'Operations Manager', '2022-01-25', 2800000, 'active'),
('Emily Davis', 'emily.davis@company.com', '+250788123461', 2, 'UI/UX Designer', '2022-05-12', 2500000, 'active'),
('Robert Wilson', 'robert.wilson@company.com', '+250788123462', 3, 'Financial Analyst', '2022-06-18', 2400000, 'active'),
('Lisa Anderson', 'lisa.anderson@company.com', '+250788123463', 4, 'Content Writer', '2022-07-22', 1800000, 'active'),
('James Taylor', 'james.taylor@company.com', '+250788123464', 5, 'Logistics Coordinator', '2022-08-30', 1900000, 'active'),
('Maria Garcia', 'maria.garcia@company.com', '+250788123465', 1, 'HR Assistant', '2022-09-14', 1600000, 'active');

-- Insert sample attendance records for today
INSERT INTO attendance (employee_id, check_in, check_out, status, notes) VALUES
(1, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(2, '2024-01-15 08:15:00', '2024-01-15 17:30:00', 'late', 'Traffic delay'),
(3, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(4, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(5, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(6, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(7, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(8, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(9, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time'),
(10, '2024-01-15 08:00:00', '2024-01-15 17:00:00', 'present', 'On time');

-- Insert sample leave requests
INSERT INTO leave_requests (employee_id, leave_type_id, start_date, end_date, reason, status) VALUES
(2, 1, '2024-02-01', '2024-02-05', 'Family vacation', 'pending'),
(4, 2, '2024-01-20', '2024-01-22', 'Medical appointment', 'approved'),
(6, 1, '2024-03-15', '2024-03-20', 'Personal trip', 'pending'),
(8, 3, '2024-04-01', '2024-07-01', 'Maternity leave', 'approved'),
(10, 4, '2024-02-10', '2024-02-24', 'Paternity leave', 'pending');

-- Insert sample payroll records for current month
INSERT INTO payroll (employee_id, pay_period, basic_salary, allowances, deductions, net_salary, status) VALUES
(1, '2024-01-01', 2500000, 200000, 150000, 2550000, 'processed'),
(2, '2024-01-01', 3000000, 250000, 180000, 3070000, 'processed'),
(3, '2024-01-01', 2200000, 180000, 120000, 2260000, 'processed'),
(4, '2024-01-01', 2000000, 150000, 100000, 2050000, 'processed'),
(5, '2024-01-01', 2800000, 220000, 160000, 2860000, 'processed'),
(6, '2024-01-01', 2500000, 200000, 140000, 2560000, 'processed'),
(7, '2024-01-01', 2400000, 190000, 130000, 2460000, 'processed'),
(8, '2024-01-01', 1800000, 140000, 90000, 1850000, 'processed'),
(9, '2024-01-01', 1900000, 150000, 95000, 1955000, 'processed'),
(10, '2024-01-01', 1600000, 120000, 80000, 1640000, 'processed');

-- Insert sample performance reviews
INSERT INTO performance_reviews (employee_id, reviewer_id, review_date, rating, comments, goals, next_review_date) VALUES
(1, 1, '2023-12-15', 5, 'Excellent leadership and management skills', 'Implement new HR software system', '2024-06-15'),
(2, 1, '2023-12-20', 4, 'Strong technical skills, good team player', 'Lead a major development project', '2024-06-20'),
(3, 1, '2023-12-18', 4, 'Reliable and accurate work', 'Improve financial reporting processes', '2024-06-18'),
(4, 1, '2023-12-22', 3, 'Good creative skills, needs improvement in analytics', 'Develop marketing analytics skills', '2024-06-22'),
(5, 1, '2023-12-25', 4, 'Efficient operations management', 'Optimize supply chain processes', '2024-06-25'),
(6, 1, '2023-12-28', 4, 'Creative designer with good technical skills', 'Learn advanced design tools', '2024-06-28'),
(7, 1, '2023-12-30', 3, 'Good analytical skills, needs better communication', 'Improve presentation skills', '2024-06-30'),
(8, 1, '2024-01-02', 4, 'Excellent writing skills and creativity', 'Develop content strategy skills', '2024-07-02'),
(9, 1, '2024-01-05', 3, 'Good coordination skills, needs leadership development', 'Take on team lead responsibilities', '2024-07-05'),
(10, 1, '2024-01-08', 4, 'Reliable and organized HR support', 'Develop recruitment skills', '2024-07-08');
