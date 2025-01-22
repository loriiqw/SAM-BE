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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
      color: #0078D0;
    }

    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Olympic Serif', Georgia, serif;
      font-weight: normal;
    }

    .container {
      max-width: 1450px;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-family: Arial, sans-serif;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-family: Arial, sans-serif;
    }

    .logo {
      width: 80px;
      height: auto;
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      line-height: 1.2;
    }

    .logo-text span {
      font-size: 16px;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .logo {
        width: 40px;
      }

      .logo-text span {
        font-size: 14px;
      }
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      line-height: 1.2;
    }

    .logo-text span {
      font-size: 16px;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .logo {
        width: 30px;
      }

      .logo-text span {
        font-size: 14px;
      }
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

    #athleteSection {
      padding: 60px 0;
      background-color: #343a40;
    }

    #athleteSection .container {
      max-width: 1300px;
    }

    .card {
      border: none;
      border-radius: 12px;
      background-color: #fff;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.5s ease;
    }

    .card:hover {
      transform: translateY(-12px);
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }

    .card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .card img:hover {
      transform: scale(1.05);
    }

    .card-body {
      padding: 20px;
      text-align: center;
    }

    .card-title {
      font-size: 1.15rem;
      font-weight: 600;
      margin-bottom: 10px;
      color: #0078D0;
    }

    .card-text {
      font-size: 14px;
      color: rgb(96, 102, 107);
      line-height: 1.6;
      text-align: justify;
    }

    .card-text.text-muted {
      color: #888;
    }

    .btn-primary {
      padding: 10px 20px;
      font-size: 0.8rem;
      border-radius: 5px;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #005fa3;
      transform: scale(1.05);
    }

    @media (max-width: 767px) {
      .card-body {
        padding: 15px;
      }

      .card-title {
        font-size: 1.2rem;
      }

      .card-text {
        font-size: 0.95rem;
      }

      .btn-primary {
        padding: 10px 20px;
        font-size: 0.8rem;
      }
    }

    #medalSection {
      padding: 40px 0;
      background-color: rgb(240, 236, 236);
    }


    .table-container {
      max-width: 90%;
      margin: 0 auto;
      overflow-x: auto;
    }

    .medal-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 15px;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .medal-table th {
      padding: 14px 20px;
      text-align: center;
      font-size: 1.1rem;
      background-color: #ffce00;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      border-bottom: 2px solid #f0f0f0;
    }

    .medal-table td {
      padding: 14px 20px;
      text-align: center;
      font-size: 1rem;
      border-bottom: 1px solid #f0f0f0;
      font-family: 'Poppins', sans-serif;
      transition: background-color 0.3s ease;
      background-color: #fff;
    }

    .medal-table tr:hover {
      background-color: #f1f1f1;
    }

    .medal-table .flag-icon {
      width: 30px;
      height: auto;
      margin-right: 10px;
      border-radius: 50%;
    }

    .medal-table .fas {
      margin-right: 8px;
      font-size: 1.1rem;
    }

    .medal-table .gold {
      color: gold;
    }

    .medal-table .silver {
      color: silver;
    }

    .medal-table .bronze {
      color: #cd7f32;
    }

    .medal-table td,
    .medal-table th {
      font-family: 'Poppins', sans-serif;
      line-height: 1.6;
      font-size: 16px;
    }

    .medal-table td {
      font-weight: 400;
    }

    .medal-table th {
      font-weight: 600;
      text-align: center;
    }


    @media (max-width: 768px) {

      .medal-table td,
      .medal-table th {
        font-size: 14px;
      }

      .medal-table .flag-icon {
        width: 24px;
      }
    }
  </style>
</head>

<body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#homeSection">
        <img src="img/logo.png" alt="International Olympic Committee Logo" class="logo" height="70">
        <div class="logo-text ms-2">
          <span>International</span>
          <span>Olympic Committee</span>
        </div>
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
              <a class="nav-link text-white" href="#homeSection" aria-label="Go to Home Section">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#athleteSection" aria-label="Go to Athlete Section">Athlete</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#medalsSection" aria-label="Go to Medals Section">Medals</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-white" href="#storySection" aria-label="Go to Olympic Story Section">Olympic
                Story</a>
            </li>
            <li class="nav-item mx-2 dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="login.php">Logout</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>


  <section id="homeSection" class="d-flex align-items-center justify-content-center text-center text-white"
    style="background: url('img/Group 5 (1).png') no-repeat center center; background-size: cover; height: 100vh;">
    <div>
      <h1 class="display-3" style="color: #FFE045;">Olympics 2024: A Legacy of Excellence</h1>
      <p class="lead">Celebrating the Spirit of the Games and Inspiring Generations</p>
    </div>
  </section>

  <section id="athleteSection" class="py-6 bg-dark">
    <div class="container">
      <h2 class="text-white mb-4 pt-1 font-weight-bold" style="font-size: 2.5rem; letter-spacing: 1px;">
        Featured Athletes
      </h2>
      <div id="athleteList" class="mt-4 row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php
      $conn = new mysqli("localhost", "root", "", "olympics");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT name, description, image FROM athletes LIMIT 4"; 
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $imagePath = htmlspecialchars($row["image"]);  
          echo "<div class='col'>";
          echo "<div class='card h-100'>";
          echo "<img src='/SAM-BE/F01/" . $imagePath . "' class='card-img-top' alt='Athlete Image'>";
          echo "<div class='card-body text-center'>";
          echo "<h5 class='card-title'>" . htmlspecialchars($row["name"]) . "</h5>"; 
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

      <div class="text-center mt-5">
        <a href="#" id="loadMoreBtn" class="btn btn-primary">View Other Athletes</a>
      </div>
    </div>
  </section>

  <script>
    let offset = 4;

    document.getElementById('loadMoreBtn').addEventListener('click', function (event) {
      event.preventDefault();

      fetch('loadmore.php?offset=' + offset)
        .then(response => response.json())
        .then(data => {
          if (data.athletes.length > 0) {
            data.athletes.forEach(athlete => {
              let athleteHtml = `
              <div class='col'>
                <div class='card h-100'>
                  <img src='/SAM-BE/F01/${athlete.image}' class='card-img-top' alt='Athlete Image'>
                  <div class='card-body text-center'>
                    <h5 class='card-title text-primary'>${athlete.name}</h5>
                    <p class='card-text text-muted'>${athlete.description}</p>
                  </div>
                </div>
              </div>
            `;
              document.getElementById('athleteList').innerHTML += athleteHtml;
            });
            offset += data.athletes.length;
          }

          if (!data.moreAthletes) {
            const loadMoreButton = document.getElementById('loadMoreBtn');
            loadMoreButton.textContent = 'No more athletes';
            loadMoreButton.disabled = true;
          }
        })
        .catch(error => console.error('Error loading more athletes:', error));
    });
  </script>
  <section id="medalSection" class="py-6">
    <div class="container">
      <h2 class="text-center text-dark mb-4 pt-1 font-weight-bold" style="font-size: 2.1rem; letter-spacing: 1px;">
        Top 10 Countries by Medal Count
      </h2>

      <div class="table-container">
        <table class="medal-table">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Country</th>
              <th>Gold</th>
              <th>Silver</th>
              <th>Bronze</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "olympics");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT country_name, gold_medals, silver_medals, bronze_medals, country_flag
                    FROM countrymedals
                    ORDER BY (gold_medals + silver_medals + bronze_medals) DESC 
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $rank = 1; 
              while ($row = $result->fetch_assoc()) {
                $countryName = htmlspecialchars($row["country_name"]);
                $goldMedals = $row["gold_medals"];
                $silverMedals = $row["silver_medals"];
                $bronzeMedals = $row["bronze_medals"];
                $totalMedals = $goldMedals + $silverMedals + $bronzeMedals;
                $countryFlag = htmlspecialchars($row["country_flag"]);

                echo "<tr>";
                echo "<td>" . $rank++ . "</td>"; 
                echo "<td><img src='/SAM-BE/F01/" . $countryFlag . "' alt='" . $countryName . " Flag' class='flag-icon'>" . $countryName . "</td>";
                
                echo "<td><i class='fas fa-medal gold'></i> " . $goldMedals . "</td>";
                echo "<td><i class='fas fa-medal silver'></i> " . $silverMedals . "</td>";
                echo "<td><i class='fas fa-medal bronze'></i> " . $bronzeMedals . "</td>";
                
                echo "<td>" . $totalMedals . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6' class='text-center'>No medal data found</td></tr>";
            }

            $conn->close();
          ?>
          </tbody>
        </table>
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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const loadMoreBtn = document.getElementById("loadMoreBtn");
      const athleteCards = document.querySelectorAll('.athlete-card');
      const allAthletes = <? php echo json_encode($athletes); ?>;
      const athleteList = document.getElementById("athleteList");

      const displayLimit = 4;
      for (let i = displayLimit; i < athleteCards.length; i++) {
        athleteCards[i].style.display = "none";
      }

      loadMoreBtn.addEventListener("click", function () {
        athleteCards.forEach(function (card, index) {
          if (index >= displayLimit) {
            card.style.display = "block";
            setTimeout(() => {
              card.classList.add('show');
            }, 100);
          }
        });
        loadMoreBtn.style.display = "none";
      });
    });
  </script>

</body>

</html>