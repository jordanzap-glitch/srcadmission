<?php
ob_start();
include '../includes/db.php';

// Initialize variables
$student_enroll_count = 0;
$students = [];

// Get student count from tbl_admission
$count_sql = "SELECT COUNT(id) FROM tbl_admission"; // Count by ID
if ($count_stmt = $conn->prepare($count_sql)) {
    $count_stmt->execute();
    $count_stmt->bind_result($student_enroll_count);
    $count_stmt->fetch();
    $count_stmt->close();
}

// Get student details
$details_sql = "SELECT id, firstname, mname, surname, address1, address2, address3, mobile, email FROM tbl_admission";
if ($details_stmt = $conn->prepare($details_sql)) {
    $details_stmt->execute();
    $result = $details_stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    $details_stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .dashboard-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added shadow */
        }
    </style>
</head>
<body>
<?php include 'includes/header.php';?>
<div class="container mt-5">
    <h1 class="text-center">Dashboard</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-box text-center">
                <h2>Student Enrollments</h2>
                <h1><?php echo $student_enroll_count; ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Enrolled Students</h2>
            <table class="table table-bordered" id="studentsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo $student['id']; ?></td>
                            <td><?php echo trim($student['firstname'] . ' ' . $student['mname'] . ' ' . $student['surname']); ?></td>
                            <td><?php echo trim($student['address1'] . ', ' . $student['address2'] . ', ' . $student['address3']); ?></td>
                            <td><?php echo $student['mobile']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#studentsTable').DataTable(); // Initialize DataTables
    });
</script>
<br><br><br><br><br><br><br><br><br>
<?php include 'includes/footer.php';?>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</body>
</html>
<?php ob_end_flush();?>
