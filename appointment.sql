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

use consult_db;

INSERT INTO
    appointment (
        patient_name,
        doctor_name,
        appointment_date,
        notes
    )
VALUES
    (
        'Andi Wijaya',
        'dr. Rina Kartika',
        '2025-06-05',
        'Keluhan sakit kepala sejak 3 hari lalu'
    ),
    (
        'Siti Rahmawati',
        'dr. Budi Santoso',
        '2025-06-07',
        'Kontrol pasca operasi kecil'
    );

