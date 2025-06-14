<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📋 Daftar Konsultasi</h2>
        <a href="create.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Konsultasi
        </a>
    </div>

    <div class="row g-4">
        <?php
        $result = $connection->query("SELECT * FROM appointment ORDER BY appointment_date ASC");
        while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <i class="bi bi-person-fill"></i> <?= htmlspecialchars($row["patient_name"]) ?>
                    </h5>
                    <p class="mb-1"><i class="bi bi-person-badge"></i> Dokter: <strong><?= htmlspecialchars($row["doctor_name"]) ?></strong></p>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i> Tanggal: <span class="badge bg-info text-dark"><?= $row["appointment_date"] ?></span></p>
                    <p class="mb-1"><i class="bi bi-chat-left-dots"></i> Catatan: <?= htmlspecialchars($row["notes"]) ?></p>
                    <p class="text-muted small mt-2"><i class="bi bi-clock-history"></i> Dibuat: <?= $row["created_at"] ?></p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between">
                    <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="bi bi-trash3"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
