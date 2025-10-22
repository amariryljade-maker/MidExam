# CodeIgniter 4 Installation Guide for MidExam Project

## Important: CodeIgniter 4 Setup Required

This project is built on CodeIgniter 4, which requires Composer for installation. Follow these steps carefully.

## Option 1: Install via Composer (Recommended)

### Step 1: Install Composer
If you don't have Composer installed, download it from [getcomposer.org](https://getcomposer.org/)

### Step 2: Install CodeIgniter 4 Framework

Open your terminal/command prompt in the project directory and run:

```bash
composer install
```

This will download and install CodeIgniter 4 and all dependencies into the `vendor` folder.

### Step 3: Set Permissions (Windows with WAMP)

Ensure the `writable` folder has write permissions:
- Right-click on `writable` folder
- Properties → Security
- Give full control to your user account

### Step 4: Configure Environment

The `.env` file is already configured, but verify these settings:

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/MIdExam/public/'
database.default.database = student_portal
database.default.username = root
database.default.password = 
```

### Step 5: Create Database

1. Open phpMyAdmin
2. Create a new database named `student_portal`
3. Or use the SQL command:
```sql
CREATE DATABASE student_portal;
```

### Step 6: Run Migrations

```bash
php spark migrate
```

### Step 7: Run Seeders

```bash
php spark db:seed UserSeeder
php spark db:seed AnnouncementSeeder
```

### Step 8: Access the Application

Open your browser and navigate to:
```
http://localhost/MIdExam/public/
```

Or simply:
```
http://localhost/MIdExam/
```

The `.htaccess` will automatically redirect to the public folder.

---

## Option 2: Manual CodeIgniter 4 Installation

If Composer is not available, you can download CodeIgniter 4 manually:

### Step 1: Download CodeIgniter 4

1. Go to [CodeIgniter 4 Releases](https://github.com/codeigniter4/CodeIgniter4/releases)
2. Download the latest version (framework-only package)
3. Extract the contents

### Step 2: Merge Files

1. Copy the `system` folder from the extracted CodeIgniter to your project root
2. The structure should look like:
```
MIdExam/
├── app/
├── public/
├── system/           <- CodeIgniter 4 system folder
├── vendor/
└── writable/
```

### Step 3: Update Paths.php

Edit `app/Config/Paths.php` and change the system directory path:

```php
public string $systemDirectory = __DIR__ . '/../../system';
```

### Step 4: Continue with Database Setup

Follow steps 4-8 from Option 1 above.

---

## Option 3: Quick Setup with Pre-built Database

If you want to skip migrations and seeders:

### Step 1: Install CodeIgniter (Choose Option 1 or 2 above)

### Step 2: Import SQL File

1. Open phpMyAdmin
2. Create database `student_portal`
3. Select the database
4. Click Import
5. Choose the file `database_setup.sql`
6. Click Go

### Step 3: Access Application

Navigate to `http://localhost/MIdExam/`

---

## Troubleshooting

### Error: "Your system folder path does not appear to be set correctly"

**Solution 1:** Install via Composer (recommended)
```bash
composer install
```

**Solution 2:** If you installed manually, ensure the `system` folder exists in your project root and update `app/Config/Paths.php`

### Error: "Class 'Config\Paths' not found"

**Cause:** CodeIgniter 4 is not properly installed.

**Solution:** Run `composer install` to install the framework.

### Error: "Unable to connect to database"

**Solutions:**
1. Verify MySQL is running in WAMP
2. Check database name is `student_portal`
3. Verify credentials in `.env` file
4. Ensure database exists (create it via phpMyAdmin)

### Error: "404 Page Not Found" for all routes

**Solutions:**
1. Enable `mod_rewrite` in Apache
2. Check if `.htaccess` files exist in root and `public` folders
3. Restart Apache server
4. Update `app.baseURL` in `.env` to match your URL

### Blank Page or PHP Errors

**Solutions:**
1. Check PHP version (minimum 7.4 required)
2. Enable error reporting in PHP
3. Check `writable` folder has write permissions
4. Check `writable/logs/` for error logs

### Session Issues

**Solutions:**
1. Ensure `writable/session/` has write permissions
2. Clear browser cookies
3. Check session configuration in `app/Config/App.php`

---

## File Structure

After proper installation, your project should look like:

```
MIdExam/
├── app/
│   ├── Config/
│   ├── Controllers/
│   ├── Database/
│   ├── Filters/
│   ├── Models/
│   └── Views/
├── public/
│   ├── .htaccess
│   └── index.php       <- Main entry point
├── system/              <- CodeIgniter 4 system (via Composer or manual)
├── vendor/              <- Composer dependencies
├── writable/
│   ├── cache/
│   ├── logs/
│   ├── session/
│   └── uploads/
├── .htaccess            <- Redirects to public/
├── .env                 <- Environment configuration
├── composer.json
└── spark                <- CLI tool
```

---

## Test Credentials

### Administrator
- Email: `admin@rmmc.edu.ph`
- Password: `admin123`

### Teacher
- Email: `teacher@rmmc.edu.ph`
- Password: `teacher123`

### Student
- Email: `student@rmmc.edu.ph`
- Password: `student123`

---

## Verifying Installation

### Check CodeIgniter Installation

```bash
php spark --version
```

Should display: CodeIgniter v4.x.x

### Check Database Connection

```bash
php spark db:table users
```

Should show the users table structure.

### Check Routes

```bash
php spark routes
```

Should display all configured routes.

---

## Important Notes

1. **Composer is Required**: CodeIgniter 4 is designed to work with Composer. While manual installation is possible, using Composer is highly recommended.

2. **PHP Version**: Minimum PHP 7.4 required. Check your version:
   ```bash
   php -v
   ```

3. **Apache Configuration**: Ensure `mod_rewrite` is enabled in your Apache configuration.

4. **Database**: The project expects a MySQL database named `student_portal`.

5. **Writable Permissions**: The `writable` directory must have write permissions for sessions, logs, and cache.

---

## Quick Start Commands

After installation:

```bash
# Run migrations
php spark migrate

# Run seeders
php spark db:seed UserSeeder
php spark db:seed AnnouncementSeeder

# Clear cache
php spark cache:clear

# View routes
php spark routes

# Check environment
php spark env
```

---

## Need Help?

1. Check the [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)
2. Review the `README.md` file
3. Check `SETUP_INSTRUCTIONS.md` for detailed setup steps
4. Review error logs in `writable/logs/`

---

**Project:** Online Student Portal  
**Institution:** Ramon Magsaysay Memorial College  
**Framework:** CodeIgniter 4  
**PHP Version:** 7.4+

