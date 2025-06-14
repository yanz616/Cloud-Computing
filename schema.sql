CREATE DATABASE IF NOT EXISTS consult_db;

USE consult_db;

DROP TABLE IF EXISTS appointment;

CREATE TABLE appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    doctor_name VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
