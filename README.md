# Laravel HRM System (Human Resource Management)

A complete Human Resource Management (HRM) system built with **Laravel 11**, designed for Admin, HR, Manager, and Employee roles. The system helps organizations manage employees, attendance, payroll, recruitment, and more.

---

## 🔐 Login Credentials (Demo)

| Role     | Email                     | Password    |
|----------|---------------------------|-------------|
| Admin    | tahmid.tf1@gmail.com      | 123456789   |
| HR       | tahmid.tf2@gmail.com      | 123456789   |
| Manager  | tahmid.tf3@gmail.com      | 123456789   |
| Employee | tahmid.tf4@gmail.com      | 123456789   |

---

## 🧩 Features

### 👥 1. Employee Management
- Add, edit, and delete employee profiles
- Employee personal details (name, email, phone, address, emergency contact)
- Employee documents (ID, contracts, certificates)
- Job positions, departments, and designations
- Employment status (active, resigned, terminated, etc.)

### ⏱️ 2. Attendance & Leave Management
- Daily attendance tracking (manual entry or biometric integration)
- Leave request and approval system (sick leave, casual leave, paid leave)

[//]: # (- Holiday and work shift management)
[//]: # (- Late arrivals and early departures tracking)

### 💰 3. Payroll & Salary Management
- Employee salary structure and increments
- Payroll processing with tax and deductions
- Payslip generation and download
- Loan and advance salary management

### 📥 4. Recruitment Management
- Job posting and applicant tracking
- Resume upload and screening
- Interview scheduling and status updates

### 📊 5. Performance Management
- Employee KPI (Key Performance Indicator) tracking
- Performance reviews and feedback
- Promotion and appraisal management

### 🎓 6. Training & Development
- Employee training programs and tracking
- Training completion certificates

### 💼 7. Expense & Reimbursement Management
- Employee expense submissions
- Managerial approval system
- Payment processing

### 📢 8. Notice Board & Announcements
- Internal announcements
- Department-specific notices

### 🔐 9. Role & Permission Management
- Admin, HR, Manager, Employee roles
- Access control for different modules

### 📈 10. Reports & Analytics
- Attendance reports
- Payroll reports
- Leave summary reports
- Employee performance analytics

### ⚙️ 11. System Settings & Configuration
- Company profile and settings
- Multi-language support (optional)
- Email and notification settings

---

## 🚧 Currently Working On

### ⏱️ Feature 2: Attendance & Leave Management
- Daily attendance tracking
- Leave request and approval system
- Shift and holiday configuration
- Late/early entry tracking

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Blade Template Engine
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Roles & Permissions**: [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)

---

## 📦 Installation

```bash
git clone https://github.com/yourusername/laravel-hrm.git
cd laravel-hrm
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan queue:work
php artisan serve
