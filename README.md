# Ramon Magsaysay Memorial College - Online Student Portal

## Midterm Examination Project
**Course:** Web Development  
**Academic Year:** 2025-2026 (First Semester)

## Project Description

This is a comprehensive Online Student Portal developed using CodeIgniter 4 framework. The system provides role-based access for three user types: Students, Teachers, and Administrators.

## Features Implemented

### Task 1: Announcements Module ✓
- Created `Announcement.php` controller with `index()` method
- Developed `announcements.php` view to display announcements
- Configured route `/announcements` for accessing announcements
- Displays announcement title, content, and date posted

### Task 2: Database Schema and Data Population ✓
- Created migration file `CreateAnnouncementsTable` with required fields:
  - id (Primary Key, Auto Increment)
  - title (VARCHAR)
  - content (TEXT)
  - created_at (DATETIME)
- Developed `AnnouncementModel.php` for database interaction
- Implemented data fetching with DESC order by `created_at`
- Created seeder with 4 sample announcements

### Task 3: Enhanced Authentication and Role-Based Redirection ✓
- Modified login system to redirect users based on their role:
  - **Students** → `/announcements`
  - **Teachers** → `/teacher/dashboard`
  - **Admins** → `/admin/dashboard`
- Created `Teacher.php` controller with dashboard method
- Created `Admin.php` controller with dashboard method
- Configured routes for all role-specific dashboards

### Task 4: Implementing Filter for Authorization ✓
- Generated `RoleAuth` filter for role-based access control
- Implemented security logic:
  - Admins can access `/admin/*` routes
  - Teachers can access `/teacher/*` routes
  - Students can access `/student/*` and `/announcements` routes
- Displays "Access Denied: Insufficient Permissions" message for unauthorized access
- Registered filter in `Filters.php` and applied to route groups

## System Architecture

### Controllers
- **Auth.php** - Handles user authentication (login, register, logout)
- **Announcement.php** - Manages announcements display
- **Admin.php** - Admin dashboard and features
- **Teacher.php** - Teacher dashboard and features
- **Student.php** - Student dashboard and features

### Models
- **UserModel.php** - User authentication and management
- **AnnouncementModel.php** - Announcement data management

### Filters
- **Auth.php** - Basic authentication filter
- **RoleAuth.php** - Role-based authorization filter

### Database Tables
- **users** - Stores user accounts (students, teachers, admins)
- **announcements** - Stores portal announcements

## Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx with mod_rewrite enabled
- Composer (for dependencies)

### Installation Steps

1. **Clone/Download the project**
   ```bash
   cd C:\wamp64\www\MIdExam
   ```

2. **Configure Database**
   - Create a MySQL database named `student_portal`
   - Update database credentials in `.env` file

3. **Run Migrations**
   ```bash
   php spark migrate
   ```

4. **Run Seeders**
   ```bash
   php spark db:seed UserSeeder
   php spark db:seed AnnouncementSeeder
   ```

5. **Access the Application**
   - Open browser and navigate to: `http://localhost/MIdExam/`

## Test Accounts

### Admin Account
- **Email:** admin@rmmc.edu.ph
- **Password:** admin123

### Teacher Account
- **Email:** teacher@rmmc.edu.ph
- **Password:** teacher123

### Student Account
- **Email:** student@rmmc.edu.ph
- **Password:** student123

## Routes

### Public Routes
- `/` or `/login` - Login page
- `/register` - Registration page

### Protected Routes
- `/announcements` - View announcements (all logged-in users)
- `/admin/dashboard` - Admin dashboard (admin only)
- `/teacher/dashboard` - Teacher dashboard (teacher only)
- `/student/dashboard` - Student dashboard (student only)

## Security Features

1. **Password Hashing** - All passwords are hashed using PHP's `password_hash()`
2. **Session Management** - Secure session handling for user authentication
3. **Role-Based Access Control** - RoleAuth filter prevents unauthorized access
4. **CSRF Protection** - Built-in CodeIgniter CSRF protection
5. **Input Validation** - Server-side validation for all form inputs

## Technologies Used

- **Backend Framework:** CodeIgniter 4
- **Frontend:** HTML5, CSS3, Bootstrap 5
- **Database:** MySQL
- **Icons:** Bootstrap Icons
- **Server:** WAMP (Windows Apache MySQL PHP)

## Project Structure

```
MIdExam/
├── app/
│   ├── Config/          # Configuration files
│   ├── Controllers/     # Application controllers
│   ├── Models/          # Database models
│   ├── Filters/         # Authentication & authorization filters
│   ├── Views/           # View templates
│   └── Database/
│       ├── Migrations/  # Database migrations
│       └── Seeds/       # Database seeders
├── public/              # Public assets
├── .env                 # Environment configuration
├── .htaccess           # Apache rewrite rules
└── README.md           # This file
```

## Version Control

This project uses Git for version control. The development includes meaningful commits tracking:
1. Initial project setup and authentication system
2. Announcements module and database implementation
3. Role-based redirection and authorization filter

## Developer Notes

- Clean, readable, and well-structured code
- Comments added for clarity
- Bootstrap used for responsive design
- Follows CodeIgniter 4 best practices
- Implements MVC architecture pattern

## License

This project is developed for educational purposes as part of the Midterm Examination for Web Development course at Ramon Magsaysay Memorial College.

---

**Developed By:** [Student Name]  
**Date:** October 22, 2025  
**Course:** Web Development - Midterm Examination

