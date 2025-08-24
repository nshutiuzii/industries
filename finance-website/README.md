# Finance Pro - Financial Dashboard

A comprehensive financial management dashboard built with PHP, MySQL, Bootstrap 5, and vanilla JavaScript. This project provides a complete solution for financial management, budgeting, expense tracking, and financial reporting.

## 🚀 Features

- **Financial Dashboard**: Comprehensive overview with quick stats and financial metrics
- **Budget Management**: Create, track, and manage budgets across different categories
- **Income & Expense Tracking**: Monitor cash flow and financial transactions
- **Payroll Management**: Handle employee salaries and compensation
- **Transaction Management**: Track all financial transactions with detailed records
- **Recurring Transactions**: Set up and manage recurring payments and income
- **Account Management**: Multiple account support with balance tracking
- **Purchase Orders**: Create and manage purchase orders and approvals
- **Petty Cash Management**: Track small cash transactions and reimbursements
- **Calendar Integration**: Financial calendar with important dates and deadlines
- **Invoice Management**: Generate and manage invoices for clients
- **Asset Management**: Track company assets and depreciation
- **Cost Centers**: Organize expenses by department or project
- **Approval Workflows**: Multi-level approval system for financial decisions
- **Alert System**: Notifications for budget overruns and important events
- **Document Management**: Secure storage for financial documents
- **Digital Signatures**: Electronic signature support for approvals
- **Reporting & Analytics**: Comprehensive financial reports and insights
- **Audit Logging**: Complete audit trail for compliance

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript (ES6+)
- **Backend**: PHP 8+
- **Database**: MySQL 5.7+
- **Icons**: Font Awesome 6
- **Fonts**: Google Fonts (Inter)
- **Security**: PDO prepared statements, password hashing, role-based access

## 📁 Project Structure

```
finance-website/
│
├── index.php              # Main Dashboard
├── budgets.php            # Budget Management
├── income.php             # Income Tracking
├── expenses.php           # Expense Management
├── payroll.php            # Payroll System
├── transactions.php       # Transaction History
├── recurring.php          # Recurring Transactions
├── accounts.php           # Account Management
├── purchase-orders.php    # Purchase Order System
├── petty-cash.php         # Petty Cash Management
├── calendar.php           # Financial Calendar
├── invoices.php           # Invoice Management
├── assets.php             # Asset Tracking
├── cost-centers.php       # Cost Center Management
├── approvals.php          # Approval Workflows
├── alerts.php             # Alert System
├── documents.php          # Document Management
├── signatures.php         # Digital Signatures
├── reports.php            # Financial Reports
├── audit-log.php          # Audit Trail
├── admin.php              # Admin Dashboard
├── login.php              # User Authentication
├── register.php           # User Registration
├── logout.php             # Logout Functionality
├── db.php                 # Database Connection
├── functions.php          # Helper Functions
├── config.php             # Configuration
│
├── assets/
│   ├── css/
│   │   └── style.css      # Dashboard Styles
│   ├── js/
│   │   └── script.js      # Dashboard JavaScript
│   └── img/               # Images and Icons
│
├── includes/
│   ├── header.php         # Common Header
│   ├── footer.php         # Common Footer
│   └── navbar.php         # Navigation Menu
│
└── database/
    ├── schema.sql         # Database Structure
    └── seed.sql           # Sample Data
```

## 🚀 Quick Start

### Prerequisites

- XAMPP, WAMP, or similar local development environment
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Web browser

### Installation Steps

1. **Clone/Download the Project**
   ```bash
   # If using git
   git clone <repository-url>
   
   # Or download and extract the ZIP file
   ```

2. **Set Up Database**
   - Open phpMyAdmin or your MySQL client
   - Create a new database named `finance`
   - Import the database schema:
     ```sql
     -- Run database/schema.sql first
     -- Then run database/seed.sql for sample data
     ```

3. **Configure Database Connection**
   - Edit `config.php` with your database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'finance');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     ```

4. **Set Up Web Server**
   - Place the project in your web server's document root
   - For XAMPP: `htdocs/finance-website/`
   - For WAMP: `www/finance-website/`

5. **Access the Dashboard**
   - Open your browser and navigate to:
     ```
     http://localhost/finance-website/
     ```

### Default Admin Account

- **Email**: admin@financepro.com
- **Password**: admin123

## 🔧 Configuration

### Customizing the Dashboard

1. **Company Information**
   - Edit `config.php` to change site name and URL
   - Update company details and branding
   - Modify default currency (currently RWF)

2. **Dashboard Layout**
   - Customize colors in `assets/css/style.css` (CSS variables)
   - Modify sidebar navigation items
   - Update dashboard widgets and charts

3. **Financial Settings**
   - Configure default budget categories
   - Set up approval workflows
   - Define cost center structure

### Database Configuration

The dashboard uses the following database tables:

- **users**: User accounts and authentication
- **services**: Company services offered
- **posts**: Blog posts and articles
- **testimonials**: Customer reviews and ratings
- **pricing**: Service pricing plans
- **leads**: Contact form submissions

## 🎨 Dashboard Features

### Main Dashboard
- **Quick Stats**: Total balance, pending approvals, monthly income
- **Financial Charts**: Visual representation of financial data
- **Recent Transactions**: Latest financial activities
- **Quick Actions**: Common financial tasks
- **Pending Approvals**: Items requiring approval

### Budget Management
- **Budget Overview**: Total, used, and remaining budget
- **Category Breakdown**: Budget allocation by department
- **Progress Tracking**: Visual progress bars for budget categories
- **Status Indicators**: On track, warning, and over-budget alerts

### Navigation System
- **Left Sidebar**: Comprehensive navigation menu
- **Active States**: Current page highlighting
- **Icon System**: Intuitive icons for each section
- **Responsive Design**: Mobile-friendly navigation

## 🔒 Security Features

- **SQL Injection Protection**: PDO prepared statements
- **XSS Prevention**: Input sanitization and output escaping
- **Password Security**: Bcrypt hashing with salt
- **Session Management**: Secure session handling
- **Access Control**: Role-based authentication
- **Audit Logging**: Complete audit trail

## 📱 Responsive Design

The dashboard is fully responsive and includes:

- Mobile-first design approach
- Bootstrap 5 grid system
- Custom breakpoints for different screen sizes
- Touch-friendly navigation
- Optimized layouts for all devices

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🚀 Deployment

### Production Deployment

1. **Update Configuration**
   - Change database credentials for production
   - Update site URL in `config.php`
   - Set appropriate error reporting levels

2. **Security Measures**
   - Use HTTPS in production
   - Set secure session cookies
   - Implement rate limiting for forms
   - Regular security updates

3. **Performance Optimization**
   - Enable PHP OPcache
   - Use CDN for external resources
   - Optimize images and assets
   - Implement caching strategies

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify database credentials in `config.php`
   - Ensure MySQL service is running
   - Check database name exists

2. **Page Not Found (404)**
   - Verify file permissions
   - Check web server configuration
   - Ensure .htaccess is properly configured

3. **Styling Issues**
   - Clear browser cache
   - Check CSS file paths
   - Verify Bootstrap CSS is loading

4. **Admin Access Issues**
   - Verify user role is set to 'admin'
   - Check session configuration
   - Clear browser cookies

## 📝 License

This project is created for educational purposes. Feel free to use, modify, and distribute as needed.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs and feature requests.

## 📞 Support

For support or questions:

1. Check the troubleshooting section above
2. Review the code comments for guidance
3. Open an issue in the project repository

## 🔄 Updates

### Version 2.0.0 - Finance Dashboard
- Complete dashboard transformation
- Financial management features
- Budget tracking and management
- Comprehensive navigation system
- Professional financial interface

### Version 1.0.0 - Original Website
- Initial website functionality
- Admin dashboard
- Responsive design
- Security features

---

**Note**: This is a demonstration project. For production use, ensure all security measures are properly implemented and tested.
