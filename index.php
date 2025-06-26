<?php 
    include 'admin/dbcon.php';
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include './links.php' ?>
    <style>
        p {
            font-size: 1.2rem; 
        }        
        .btnApply {
            float: right;
            width: 40%;
            text-decoration: none;
            padding: 2%;
            margin: 5% 0;
            border: none;
            border-radius: 2.5rem;
            background: #f8f9fa;
            color: #383d41;
            font-size: 1.1rem;
            font-weight: 600;            
            cursor: pointer;
        }

        .applicationBtn .btnApply:hover:not(.active) {   
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.6);
        }

        .job-listing {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f8f9fa;
        }

        .job-listing h4 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .job-listing p {
            margin: 5px 0;
        }

        .job-listing .btnApply {
            float: none;
            width: auto;
            margin-top: 10px;
        }

        .job-listing img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="jumbotron-small text-center text-white">
        <h1 class="mt-3" style="color: #fff; font-size: 3rem; font-weight: bolder; letter-spacing: 0.05rem;">Job Application Portal</h1>
    </div>
    <div class="container application">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="./images/image.webp" alt="svg">
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center text-white" style="justify-content:center; align-items:center; margin-top:10%">
                <h3 style="font-size: 2rem; font-weight:bolder;">Welcome </h3>
                <p>We want to make the right decision quickly-That's why we only offer online applications. Applying online offers many benefits and speeds up the whole process considerably.</p>
                <p>Please fill all the details carefully. This application can change your life.</p>
            </div>
        </div>
    </div>

    <!-- Job Listings Section -->
    <div class="container">
        <h2 class="text-center mt-5">Available Jobs</h2>
        <div class="row">
            <?php
                $query = "SELECT * FROM jobs LIMIT 5"; // Fetch jobs from the database
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($job = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-listing">
                                <img src="<?php echo $job['image']; ?>" alt="Job Image"> <!-- Dynamic image -->
                                <h4><?php echo $job['title']; ?></h4>
                                <a href="job-details.php?id=<?php echo $job['id']; ?>" class="btnApply">View Details</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No jobs available at the moment.</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>