# Online Student Portal - Setup Instructions

## Step-by-Step Installation Guide

### 1. Database Setup

#### Create Database
1. Open phpMyAdmin or MySQL command line
2. Create a new database:
```sql
CREATE DATABASE student_portal;
```

#### Update Configuration
1. Open the `.env` file in the root directory
2. Update the database credentials:
```
database.default.database = student_portal
database.default.username = root
database.default.password = 
```

### 2. Run Database Migrations

Run the migrations to create the required tables:

```bash
php spark migrate
```

This will create:
- `users` table - For storing user accounts
- `announcements` table - For storing portal announcements

### 3. Seed Database with Sample Data

Run the seeders to populate the database with sample data:

```bash
php spark db:seed UserSeeder
php spark db:seed AnnouncementSeeder
```

This will create:
- 4 test user accounts (admin, teacher, student, john.doe)
- 4 sample announcements

### 4. Configure Web Server

#### For WAMP/XAMPP:
1. Ensure your project is in the `www` or `htdocs` directory
2. Make sure `mod_rewrite` is enabled in Apache
3. Restart Apache server

#### Update Base URL:
If your project is in a subdirectory, update the base URL in `.env`:
```
app.baseURL = 'http://localhost/MIdExam/'
```

### 5. File Permissions

Ensure the `writable` directory and its subdirectories have write permissions:

**Windows:**
- Right-click on `writable` folder → Properties → Security
- Give full control to IIS_IUSRS or IUSR

**Linux/Mac:**
```bash
chmod -R 777 writable/
```

### 6. Access the Application

Open your browser and navigate to:
```
http://localhost/MIdExam/
```

### 7. Test Login Credentials

Use these test accounts to login:

#### Administrator
- Email: `admin@rmmc.edu.ph`
- Password: `admin123`
- Redirects to: Admin Dashboard

#### Teacher
- Email: `teacher@rmmc.edu.ph`
- Password: `teacher123`
- Redirects to: Teacher Dashboard

#### Student
- Email: `student@rmmc.edu.ph`
- Password: `student123`
- Redirects to: Announcements Page

## Troubleshooting

### Error: "Unable to connect to database"
- Check if MySQL is running
- Verify database credentials in `.env`
- Ensure database `student_portal` exists

### Error: "404 Page Not Found"
- Check if `mod_rewrite` is enabled in Apache
- Verify `.htaccess` file exists in root directory
- Check if base URL is correctly set in `.env`

### Session Issues
- Clear browser cache and cookies
- Check if `writable/session/` directory has write permissions
- Verify session configuration in `app/Config/App.php`

### Migration Failed
- Check if database connection is working
- Ensure you're running migrations from the project root
- Verify migration files exist in `app/Database/Migrations/`

## Features to Test

### 1. Authentication
- ✓ Register new user
- ✓ Login with different roles
- ✓ Logout functionality

### 2. Role-Based Redirection (Task 3)
- ✓ Admin redirects to `/admin/dashboard`
- ✓ Teacher redirects to `/teacher/dashboard`
- ✓ Student redirects to `/announcements`

### 3. Announcements Module (Task 1 & 2)
- ✓ View announcements at `/announcements`
- ✓ Announcements ordered by newest first
- ✓ Display title, content, and date posted

### 4. Authorization Filter (Task 4)
- ✓ Try accessing `/admin/dashboard` as student → Access Denied
- ✓ Try accessing `/teacher/dashboard` as student → Access Denied
- ✓ Admin can access all routes
- ✓ Students can access `/announcements` and `/student/*`

## Important Notes

1. **Security**: Change default passwords before deployment
2. **Database Backups**: Regular backups recommended
3. **Updates**: Keep CodeIgniter framework updated
4. **Logs**: Check `writable/logs/` for error logs

## Development Commands

### Run Migrations
```bash
php spark migrate
```

### Rollback Migrations
```bash
php spark migrate:rollback
```

### Run Specific Seeder
```bash
php spark db:seed UserSeeder
php spark db:seed AnnouncementSeeder
```

### Clear Cache
```bash
php spark cache:clear
```

### View Routes
```bash
php spark routes
```

## Support

For issues or questions regarding this project:
- Check the README.md file
- Review CodeIgniter 4 documentation: https://codeigniter.com/user_guide/
- Contact your instructor

---

**Project:** Online Student Portal  
**Institution:** Ramon Magsaysay Memorial College  
**Academic Year:** 2025-2026 (First Semester)  
**Course:** Web Development - Midterm Examination

