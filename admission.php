<?php
ob_start();
include 'includes/db.php';

function insertAdmissionData($data) {
    global $conn; // Use the global database connection

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_admission (lrn, ESCNO, firstname, mname, surname, ExtName, sex, birthday, birthplace, address1, address2, address3, ZIPCODE, telephone, mobile, email, religion, citizenship, f_firstname, f_mname, f_surname, m_firstname, m_mname, m_surname, guardian, guardcontact, cmbrelation) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("sssssssssssssssssssssssssss", 
        $data['lrn'], 
        $data['ESCNO'], 
        $data['firstname'], 
        $data['mname'], 
        $data['surname'], 
        $data['ExtName'], 
        $data['sex'], 
        $data['birthday'], 
        $data['birthplace'], 
        $data['address1'], 
        $data['address2'], 
        $data['address3'], 
        $data['ZIPCODE'], 
        $data['telephone'], 
        $data['mobile'], 
        $data['email'], 
        $data['religion'], 
        $data['citizenship'], 
        $data['f_firstname'], 
        $data['f_mname'], 
        $data['f_surname'], 
        $data['m_firstname'], 
        $data['m_mname'], 
        $data['m_surname'], 
        $data['guardian'], 
        $data['guardcontact'], 
        $data['cmbrelation']
    );

    // Execute the statement
    if ($stmt->execute()) {
        return true; // Success
    } else {
        return false; // Failure
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $formData = [
        'lrn' => $_POST['lrn'],
        'ESCNO' => $_POST['ESCNO'],
        'firstname' => $_POST['firstname'],
        'mname' => $_POST['mname'],
        'surname' => $_POST['surname'],
        'ExtName' => $_POST['ExtName'],
        'sex' => $_POST['sex'],
        'birthday' => $_POST['birthday'],
        'birthplace' => $_POST['birthplace'],
        'address1' => $_POST['address1'],
        'address2' => $_POST['address2'],
        'address3' => $_POST['address3'],
        'ZIPCODE' => $_POST['ZIPCODE'],
        'telephone' => $_POST['telephone'],
        'mobile' => $_POST['mobile'],
        'email' => $_POST['email'],
        'religion' => $_POST['religion'],
        'citizenship' => $_POST['citizenship'],
        'f_firstname' => $_POST['f_firstname'],
        'f_mname' => $_POST['f_mname'],
        'f_surname' => $_POST['f_surname'],
        'm_firstname' => $_POST['m_firstname'],
        'm_mname' => $_POST['m_mname'],
        'm_surname' => $_POST['m_surname'],
        'guardian' => $_POST['guardian'],
        'guardcontact' => $_POST['guardcontact'],
        'cmbrelation' => $_POST['cmbrelation']
    ];

    // Insert data into the database
    if (insertAdmissionData($formData)) {
        header("Location: admissionrep.php");
    } else {
        echo "<script>alert('Error submitting admission data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admission Form - Santa Rita College of Pampanga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
   <?php include 'includes/header.php'?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Admission Form</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Form</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
  <div class="container my-5 wow fadeIn shadow rounded-4">
    <h2 class="text-center mb-4">Admission Form</h2>
    <div class="row justify-content-center">
        <form class="col-md-8" method="POST" action="">
            <div class="mb-3">
                <label for="lrn" class="form-label">LRN</label>
                <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN (optional)">
            </div>
            <div class="mb-3">
                <label for="escno" class="form-label">ESC No.</label>
                <input type="text" class="form-control" id="ESCNO" name="ESCNO" placeholder="Enter ESC No. (optional)">
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name (required)" required>
                </div>
                <div class="col-md-3">
                    <label for="mname" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name (optional)">
                </div>
                <div class="col-md-4">
                    <label for="surname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Last Name (required)" required>
                </div>
                <div class="col-md-2">
                    <label for="ExtName" class="form-label">Extension</label>
                    <input type="text" class="form-control form-control-sm" id="ExtName" name="ExtName" placeholder="Jr, Sr, III (optional)">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="sex" class="form-label">Gender</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="" disabled selected>Select sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="birthplace" class="form-label">Birth Place</label>
                <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Enter Birth Place (required)" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="address1" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Barangay (required)" required>
                </div>
                <div class="col-md-6">
                    <label for="address2" class="form-label">Municipality</label>
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Municipality (required)" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="address3" class="form-label">City/Province</label>
                    <input type="text" class="form-control" id="address3" name="address3" placeholder="Enter City/Province (required)" required>
                </div>
                <div class="col-md-6">
                    <label for="ZIPCODE" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="ZIPCODE" name="ZIPCODE" placeholder="Enter Zip Code (required)" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter Telephone Number (optional)">
                </div>
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number (required)" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address (required)" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="religion" class="form-label">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter Religion (required)" required>
                </div>
                <div class="col-md-6">
                    <label for="citizenship" class="form-label">Citizenship</label>
                    <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Enter Citizenship (required)" required>
                </div>
            </div>
            <h5 class="mt-4">Guardian Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="guardian" class="form-label">Guardian Name</label>
                    <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Enter Guardian's Name (required)" required>
                </div>
                <div class="col-md-6">
                    <label for="guardcontact" class="form-label">Guardian Contact</label>
                    <input type="text" class="form-control" id="guardcontact" name="guardcontact" placeholder="Enter Guardian's Contact Number (required)" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cmbrelation" class="form-label">Guardian Relationship</label>
                    <select class="form-select" id="cmbrelation" name="cmbrelation" required>
                        <option value="" disabled selected>Select Relationship</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Relative">Relative</option>
                        <option value="Guardian">Guardian</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <h5 class="mt-4">Optional</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="f_firstname" class="form-label">Father's First Name</label>
                    <input type="text" class="form-control" id="f_firstname" name="f_firstname" placeholder="Enter Father's First Name (optional)">
                </div>
                <div class="col-md-4">
                    <label for="f_mname" class="form-label">Father's Middle Name</label>
                    <input type="text" class="form-control" id="f_mname" name="f_mname" placeholder="Enter Father's Middle Name (optional)">
                </div>
                <div class="col-md-4">
                    <label for="f_surname" class="form-label">Father's Last Name</label>
                    <input type="text" class="form-control" id="f_surname" name="f_surname" placeholder="Enter Father's Last Name (optional)">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="m_firstname" class="form-label">Mother's First Name</label>
                    <input type="text" class="form-control" id="m_firstname" name="m_firstname" placeholder="Enter Mother's First Name (optional)">
                </div>
                <div class="col-md-4">
                    <label for="m_mname" class="form-label">Mother's Middle Name</label>
                    <input type="text" class="form-control" id="m_mname" name="m_mname" placeholder="Enter Mother's Middle Name (optional)">
                </div>
                <div class="col-md-4">
                    <label for="m_surname" class="form-label">Mother's Last Name</label>
                    <input type="text" class="form-control" id="m_surname" name="m_surname" placeholder="Enter Mother's Last Name (optional)">
                </div>
            </div>
            <!-- Submit Button -->
            <br>
            <div class="mb-3" style="text-align: right;">
                <button type="submit" class="btn" style="background-color: #2A3E5E; color: white;">Submit</button>
            </div>
        </form>
    </div>
</div>


    <!-- Service End -->

    <!-- Footer Start -->
   <?php include 'includes/footer.php' ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php ob_end_flush();?>