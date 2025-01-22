<?php
include('connection.php');

$sql = "SELECT * FROM athletes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Royal Court 2024</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Olympic Sans', Arial, sans-serif;
      color: #333;
    }

    h1 {
      font-family: 'Olympic Headline', Impact, sans-serif;
      font-weight: bold;
      letter-spacing: -0.015em;
      line-height: 1.1;
      color: #0045ad;
    }

    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Olympic Serif', Georgia, serif;
      font-weight: normal;
    }

    .navbar-dark .nav-link {
      color: #fff;
      font-family: 'Olympic Sans', Arial, sans-serif;
      font-weight: bold;
    }

    .navbar-scrolled {
      background-color: #333 !important;
      transition: background-color 0.3s ease-in-out;
    }
  </style>
</head>

<body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#homeSection">
        <img src="img/logo.png" alt="Logo" height="70">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end text-center flex-grow-1">
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#homeSection">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#athleteSection">Athlete</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#legacySection">Olympic Legacy</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#medalsSection">Medals</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#storySection">Olympic Story</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <section id="homeSection" class="d-flex align-items-center justify-content-center text-center text-white"
    style="background: url('img/Group\ 5.png') no-repeat center center; background-size: cover; height: 100vh;">
    <div>
      <h1 class="display-3" style="color: #f9e155;">Celebrate Excellence. Inspire Generations.</h1>
      <p class="lead">The Spirit of the Games Lives On!</p>
    </div>
  </section>

  <section id="athleteSection" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center text-primary mb-4">Featured Athletes</h2>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php
            $conn = new mysqli("localhost", "root", "", "olympics");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, description, image FROM athletes"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $imagePath = htmlspecialchars($row["image"]);  
                    
                    echo "<div class='col'>";
                    echo "<div class='card h-100'>";
                    echo "<img src='/SAM-BE/F01/" . $imagePath . "' class='card-img-top' alt='Athlete Image'>";
                    echo "<div class='card-body text-center'>";
                    echo "<h5 class='card-title text-primary'>" . htmlspecialchars($row["name"]) . "</h5>"; 
                    echo "<p class='card-text text-muted'>" . htmlspecialchars($row["description"]) . "</p>"; 
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No athletes found</p>"; 
            }

            $conn->close();
            ?>
      </div>
      <div class="text-center mt-4">
        <a href="#fullAthleteShowcase" class="btn btn-primary">See All Athletes</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    window.addEventListener('scroll', function () {
      const navbar = document.getElementById('navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
      } else {
        navbar.classList.remove('navbar-scrolled');
      }
    });
  </script>
</body>

</html>