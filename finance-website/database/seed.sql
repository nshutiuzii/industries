-- Seed data for Finance Website
-- Run this after creating the schema

USE finance;

-- Insert sample services
INSERT INTO services (name, description, icon) VALUES
('Financial Planning', 'Comprehensive financial planning and wealth management services tailored to your goals.', 'fas fa-chart-line'),
('Investment Advisory', 'Expert investment advice and portfolio management for optimal returns.', 'fas fa-chart-pie'),
('Tax Consulting', 'Professional tax planning and consulting to maximize your savings.', 'fas fa-calculator'),
('Retirement Planning', 'Secure your future with our retirement planning and pension management services.', 'fas fa-piggy-bank'),
('Estate Planning', 'Protect your legacy with comprehensive estate and succession planning.', 'fas fa-home'),
('Insurance Solutions', 'Custom insurance solutions to protect what matters most to you.', 'fas fa-shield-alt');

-- Insert sample blog posts
INSERT INTO posts (title, content, image) VALUES
('5 Investment Strategies for 2024', 'Discover the top investment strategies that will help you build wealth in 2024. From index funds to real estate, learn how to diversify your portfolio and maximize returns while managing risk effectively.', 'blog-1.jpg'),
('Understanding Tax Deductions', 'Learn about the most important tax deductions that can save you thousands of dollars. Our comprehensive guide covers everything from business expenses to charitable contributions.', 'blog-2.jpg'),
('Retirement Planning: Start Early, Retire Rich', 'The earlier you start planning for retirement, the more comfortable your golden years will be. Find out how compound interest and smart planning can secure your financial future.', 'blog-3.jpg');

-- Insert sample testimonials
INSERT INTO testimonials (author, role_company, quote, avatar, rating) VALUES
('Sarah Johnson', 'CEO, TechStart Inc.', 'Finance Pro transformed our company\'s financial strategy. Their expertise helped us grow from a startup to a thriving business.', 'avatar-1.jpg', 5),
('Michael Chen', 'Retired Engineer', 'Thanks to their retirement planning services, I was able to retire 5 years early with confidence. Highly recommended!', 'avatar-2.jpg', 5),
('Emily Rodriguez', 'Small Business Owner', 'The tax consulting services saved us over $15,000 last year. Their team is professional, knowledgeable, and truly cares about their clients.', 'avatar-3.jpg', 5),
('David Thompson', 'Investment Manager', 'As a finance professional myself, I appreciate the quality of advice and service. They consistently deliver exceptional results.', 'avatar-4.jpg', 5);

-- Insert sample pricing plans
INSERT INTO pricing (plan, price, period, features, featured) VALUES
('Basic', 99.00, 'mo', 'Financial Planning Consultation\nMonthly Portfolio Review\nTax Preparation\nEmail Support', 0),
('Professional', 199.00, 'mo', 'Everything in Basic\nInvestment Advisory\nRetirement Planning\nPriority Support\nQuarterly Meetings', 1),
('Enterprise', 399.00, 'mo', 'Everything in Professional\nEstate Planning\nInsurance Solutions\nDedicated Advisor\nUnlimited Support', 0);

-- Insert yearly pricing (2 months free)
INSERT INTO pricing (plan, price, period, features, featured) VALUES
('Basic Yearly', 990.00, 'yr', 'Financial Planning Consultation\nMonthly Portfolio Review\nTax Preparation\nEmail Support\n2 Months Free', 0),
('Professional Yearly', 1990.00, 'yr', 'Everything in Basic\nInvestment Advisory\nRetirement Planning\nPriority Support\nQuarterly Meetings\n2 Months Free', 1),
('Enterprise Yearly', 3990.00, 'yr', 'Everything in Professional\nEstate Planning\nInsurance Solutions\nDedicated Advisor\nUnlimited Support\n2 Months Free', 0);
