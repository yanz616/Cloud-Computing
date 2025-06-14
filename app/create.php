<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST["patient_name"];
    $doctor_name = $_POST["doctor_name"];
    $appointment_date = $_POST["appointment_date"];
    $notes = $_POST["notes"];

    $stmt = $connection->prepare(
        "INSERT INTO appointment (patient_name, doctor_name, appointment_date, notes) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "ssss",
        $patient_name,
        $doctor_name,
        $appointment_date,
        $notes
    );
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Tambah Jadwal Konsultasi</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" name="patient_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="doctor_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Konsultasi</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
