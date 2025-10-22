-- ============================================
-- Ramon Magsaysay Memorial College
-- Online Student Portal - Database Setup
-- Midterm Examination Project
-- ============================================

-- Create Database
CREATE DATABASE IF NOT EXISTS student_portal;
USE student_portal;

-- ============================================
-- Table: users
-- Description: Stores user accounts for authentication
-- ============================================
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('student', 'teacher', 'admin') DEFAULT 'student',
    `created_at` DATETIME DEFAULT NULL,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- Table: announcements
-- Description: Stores portal announcements
-- Task 2 Requirement
-- ============================================
CREATE TABLE IF NOT EXISTS `announcements` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- Seed Data: Users
-- Test accounts for different roles
-- ============================================
INSERT INTO `users` (`name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('Admin User', 'admin@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW()),
('Teacher User', 'teacher@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NOW(), NOW()),
('Student User', 'student@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', NOW(), NOW()),
('John Doe', 'john.doe@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', NOW(), NOW());

-- Note: All test accounts use password: password123

-- ============================================
-- Seed Data: Announcements
-- Sample announcements for testing
-- Task 2 Requirement
-- ============================================
INSERT INTO `announcements` (`title`, `content`, `created_at`) VALUES
('Welcome to Online Student Portal', 
'We are excited to announce the launch of our new Online Student Portal! This platform provides a comprehensive digital experience for students, teachers, and administrators. Students can view announcements, check grades, and access course materials. Teachers can manage their classes and communicate with students. Administrators have full control over the system. Please explore the features and let us know if you have any questions or feedback.',
DATE_SUB(NOW(), INTERVAL 2 DAY)),

('Midterm Examination Schedule',
'The Midterm Examinations for First Semester AY 2025-2026 will be held from October 25 to October 29, 2025. Students are required to check their examination schedules through the portal. Please ensure you are prepared for your exams. Good luck to all students! For any concerns regarding the examination schedule, please contact the registrar\'s office.',
DATE_SUB(NOW(), INTERVAL 1 DAY)),

('System Maintenance Notice',
'The Online Student Portal will undergo scheduled maintenance on October 30, 2025, from 12:00 AM to 4:00 AM. During this time, the system will be temporarily unavailable. We apologize for any inconvenience this may cause. The maintenance is necessary to improve system performance and add new features. Thank you for your patience and understanding.',
NOW()),

('New Library Resources Available',
'The university library is pleased to announce that we have added over 500 new digital resources including e-books, journals, and research papers. These resources cover various disciplines and are accessible to all students and faculty members through the library portal. Access credentials are the same as your student portal login. Happy reading and researching!',
DATE_SUB(NOW(), INTERVAL 3 DAY));

-- ============================================
-- Verification Queries
-- ============================================

-- View all users
-- SELECT * FROM users;

-- View all announcements (ordered by newest first - Task 2 requirement)
-- SELECT * FROM announcements ORDER BY created_at DESC;

-- Count records
-- SELECT 
--     (SELECT COUNT(*) FROM users) as total_users,
--     (SELECT COUNT(*) FROM announcements) as total_announcements;

-- ============================================
-- End of Database Setup
-- ============================================

