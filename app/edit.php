<?php
include "config.php";
$id = $_GET["id"];
$result = $connection->query("SELECT * FROM appointment WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST["patient_name"];
    $doctor_name = $_POST["doctor_name"];
    $appointment_date = $_POST["appointment_date"];
    $notes = $_POST["notes"];

    $stmt = $connection->prepare(
        "UPDATE appointment SET patient_name=?, doctor_name=?, appointment_date=?, notes=? WHERE id=?"
    );
    $stmt->bind_param(
        "ssssi",
        $patient_name,
        $doctor_name,
        $appointment_date,
        $notes,
        $id
    );
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Edit Jadwal Konsultasi</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" name="patient_name" class="form-control" value="<?= $data[
                "patient_name"
            ] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="doctor_name" class="form-control" value="<?= $data[
                "doctor_name"
            ] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Konsultasi</label>
            <input type="date" name="appointment_date" class="form-control" value="<?= $data[
                "appointment_date"
            ] ?>" required>
        </div>
        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control"><?= $data[
                "notes"
            ] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
