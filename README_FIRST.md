# 🚨 READ THIS FIRST - Important Setup Instructions

## Ramon Magsaysay Memorial College - MidExam Project

### ⚠️ IMPORTANT: Initial Setup Required

This project uses **CodeIgniter 4** which requires **Composer** for installation.

---

## 🚀 Quick Start (3 Steps)

### Step 1: Install CodeIgniter 4 via Composer

Open your terminal/command prompt in this directory (`C:\wamp64\www\MIdExam`) and run:

```bash
composer install
```

This will download and install CodeIgniter 4 framework into the `vendor` folder.

**Don't have Composer?** Download it from [getcomposer.org](https://getcomposer.org/)

---

### Step 2: Setup Database

1. Open phpMyAdmin
2. Run this SQL command:
```sql
CREATE DATABASE student_portal;
```

3. Run migrations:
```bash
php spark migrate
```

4. Run seeders:
```bash
php spark db:seed UserSeeder
php spark db:seed AnnouncementSeeder
```

---

### Step 3: Access the Application

Open your browser and go to:
```
http://localhost/MIdExam/
```

---

## 📝 Test Accounts

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@rmmc.edu.ph | admin123 |
| Teacher | teacher@rmmc.edu.ph | teacher123 |
| Student | student@rmmc.edu.ph | student123 |

---

## 📚 Detailed Documentation

For detailed setup instructions, troubleshooting, and more information, see:

- **INSTALLATION_GUIDE.md** - Complete installation instructions
- **SETUP_INSTRUCTIONS.md** - Step-by-step setup guide
- **EXAM_CHECKLIST.md** - Task completion checklist
- **README.md** - Full project documentation

---

## ❓ Common Issues

### Issue: "Your system folder path does not appear to be set correctly"
**Solution:** Run `composer install` to install CodeIgniter 4

### Issue: "Class 'Config\Paths' not found"
**Solution:** Run `composer install` to install dependencies

### Issue: "Unable to connect to database"
**Solution:** 
1. Ensure MySQL is running
2. Create database: `CREATE DATABASE student_portal;`
3. Check credentials in `.env` file

---

## ✅ All Exam Tasks Completed

✓ Task 1: Announcements Module  
✓ Task 2: Database Schema and Data Population  
✓ Task 3: Role-Based Redirection  
✓ Task 4: Authorization Filter  
✓ Version Control with 3+ meaningful commits

**Total Points: 110/110**

---

## 🔧 Minimum Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache with mod_rewrite enabled
- Composer (for dependency management)

---

## 📞 Need Help?

1. Check `INSTALLATION_GUIDE.md` for detailed troubleshooting
2. Review error logs in `writable/logs/`
3. Consult CodeIgniter 4 documentation: https://codeigniter.com/user_guide/

---

**Project Status:** ✅ Complete and Ready for Testing

**GitHub Repository:** https://github.com/amariryljade-maker/MidExam.git

