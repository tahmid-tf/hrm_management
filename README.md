# Laravel HRM System (Human Resource Management)

A complete Human Resource Management (HRM) system built with **Laravel 11**, designed for Admin, HR, Manager, and
Employee roles. The system helps organizations manage employees, attendance, payroll, recruitment, and more.

<img src="/public/hrm_scr.png" alt="Laravel HRM Screenshot">

---

## 🔐 Login Credentials (Demo)

Demo URL: http://13.126.82.125/hrm_management/public/

| Role     | Email                | Password  |
|----------|----------------------|-----------|
| Admin    | tahmid.tf1@gmail.com | 123456789 |
| HR       | tahmid.tf2@gmail.com | 123456789 |
| Manager  | tahmid.tf3@gmail.com | 123456789 |
| Employee | tahmid.tf4@gmail.com | 123456789 |

---

## 🧩 Features

### 👥 1. Employee Management

- Add, edit, and delete employee profiles
- Employee personal details (name, email, phone, address, emergency contact)
- Employee documents (ID, contracts, certificates)
- Job positions, departments, and designations
- Employment status (active, resigned, terminated, etc.)
- Employee account freeze if needed

### ⏱️ 2. Attendance & Leave Management

- Daily attendance tracking (biometric integration)
- Leave request and approval system (sick leave, casual leave, paid leave)
- Attendance report export functionality
- Individual Attendance report export functionality
- Auto marked a late and present report on Excel sheets

### 💰 3. Payroll & Salary Management

- Employee salary structure and increments
- Payroll processing deduction
- Payslip generation and download

### 📥 4. Recruitment Management

- Job posting and applicant tracking
- Resume upload
- Job postings, individual jobs showing and resume uploading API

### 💼 5. Expense & Reimbursement Management

- Employee expense submissions
- Managerial approval system
- Payment processing

### 📢 6. Notice Board & Announcements

- Internal announcements
- Automatic role to specific roles

### 📈 7. Reports & Analytics

- Attendance reports
- Payroll reports
- Leave summary reports
- Payroll breakdown charts
- Expense breakdown charts

---

## 🚧 Currently Working On

### 📈 7. Reports & Analytics

- Attendance reports
- Payroll reports
- Payroll breakdown charts
- Expense breakdown charts

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Blade Template Engine
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Roles & Permissions**: [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- **Deployment**: AWS Lightsail

---

## 📦 Installation

```bash
git clone https://github.com/tahmid-tf/hrm_management.git
cd laravel-hrm

composer install
cp .env.example .env
nano .env  # Update database credentials

php artisan key:generate
php artisan config:clear
php artisan cache:clear

php artisan migrate --seed
php artisan storage:link
npm install

php artisan queue:work --daemon
php artisan serve  # For local development
