<?php
    include 'admin/dbcon.php';
    include('header.php');

    // Check if the job ID is provided in the URL
    if (isset($_GET['id'])) {
        $job_id = intval($_GET['id']); // Sanitize the input

        // Fetch job details from the database
        $query = "SELECT * FROM jobs WHERE id = $job_id";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $job = mysqli_fetch_assoc($result);
        } else {
            echo "<p class='text-center'>Job not found.</p>";
            exit;
        }
    } else {
        echo "<p class='text-center'>Invalid job ID.</p>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include './links.php'; ?>
    <style>
        .job-details img {
            max-width: 60%; /* Scales down the image to 60% of its container width */
            height: auto; /* Maintains the aspect ratio */
            display: block; /* Centers the image */
            margin: 0 auto 15px; /* Centers the image and adds bottom margin */
            border-radius: 5px; /* Optional: Adds rounded corners */
        }

        .job-details {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f8f9fa;
        }

        .job-details h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center; /* Centers the job title */
        }

        .job-details p {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: center; /* Centers the buttons horizontally */
            align-items: center; /* Ensures vertical alignment */
            gap: 10px; /* Adds spacing between buttons */
        }

        .btnBack, .btnApply {
            display: inline-block;
            padding: 0; /* Removes extra padding */
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            width: 150px; /* Ensures both buttons have the same width */
            height: 40px; /* Ensures both buttons have the same height */
            line-height: 40px; /* Centers the text vertically */
        }

        .btnBack:hover, .btnApply:hover {
            background: #0056b3;
        }

        .job-content {
            margin-top: 20px;
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .job-content h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="job-details">
            <img src="<?php echo $job['image']; ?>" alt="Job Image"> <!-- Dynamic image -->
            <h2><?php echo $job['title']; ?></h2>
            <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
            <p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>
            <p><strong>Description:</strong> <?php echo $job['description']; ?></p>

            <!-- Additional Job Content -->
            <div class="job-content">
                <h3>About the Job</h3>
                <p>
                    This is an exciting opportunity to join our team as a <strong><?php echo $job['title']; ?></strong>. 
                    We are looking for a motivated individual who is passionate about their work and eager to contribute to our company's success.
                </p>
                <p>
                    As a <strong><?php echo $job['title']; ?></strong>, you will be responsible for delivering high-quality results, 
                    collaborating with a dynamic team, and ensuring the success of our projects. 
                    If you are ready to take on new challenges and grow your career, this is the perfect role for you.
                </p>
            </div>

            <div class="btn-container">
                <a href="index.php" class="btnBack">Back to Jobs</a>
                <a href="application.php?job_id=<?php echo $job['id']; ?>" class="btnApply">Apply Now</a>
            </div>
        </div>
    </div>
</body>
</html>