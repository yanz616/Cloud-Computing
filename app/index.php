<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="mb-4">Daftar Konsultasi</h1>
    <a href="create.php" class="btn btn-success mb-3">Tambah Konsultasi</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Appoinment Date</th>
                <th>Notes</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $connection->query(
            "SELECT * FROM appointment ORDER BY appointment_date ASC"
        );
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["patient_name"]}</td>
                    <td>{$row["doctor_name"]}</td>
                    <td>{$row["appointment_date"]}</td>
                    <td>{$row["notes"]}</td>
                    <td>{$row["created_at"]}</td>
                    <td>
                        <a href='edit.php?id={$row["id"]}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete.php?id={$row["id"]}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
