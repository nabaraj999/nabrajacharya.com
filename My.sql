-- Creating database for the personal portfolio
CREATE DATABASE portfolio_db;
USE portfolio_db;

-- Table for personal details (brand, contact info, etc.)
CREATE TABLE personal_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(100) NOT NULL,
    logo_url VARCHAR(255),
    facebook_url VARCHAR(255),
    instagram_url VARCHAR(255),
    github_url VARCHAR(255),
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20),
    location VARCHAR(100)
    description TEXT,
    about_me TEXT,
    profile_photo VARCHAR(255),
    about_description TEXT,
    years_experience INT,
    completed_projects INT,
    happy_clients INT
);

-- Table for services offered
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    photo VARCHAR(255),
    description TEXT
);

-- Table for portfolio projects
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    project_url VARCHAR(255),
    project_start_date DATE,
    project_end_date DATE,
    project_image VARCHAR(255)
    completion_date DATE
);

-- Table for education
CREATE TABLE education (
    id INT AUTO_INCREMENT PRIMARY KEY,
    degree VARCHAR(100) NOT NULL,
    institution VARCHAR(100) NOT NULL,
    photo VARCHAR(255),
    start_year INT,
    end_year INT,
    description TEXT
);

-- Table for skills
CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(50) NOT NULL,
    proficiency INT CHECK (proficiency BETWEEN 0 AND 100)

);

-- Table for contact form submissions
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
