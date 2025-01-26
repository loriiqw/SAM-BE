<?php
include('connection.php');

$sql = "SELECT * FROM athletes";
$result = $conn->query($sql);

$sql = "SELECT title, content, image FROM stories";
$result = $conn->query($sql);

$sectionStyle = ($result->num_rows > 0) ? '' : 'style="display:none;"';
$storyListStyle = ($result->num_rows > 0) ? '' : 'style="display:none;"';


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
      /* Story Form Section */
  .story-form-section {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f9f9f9;
      padding: 50px 0;
  }

  .form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
  }

  h2 {
      font-size: 2em;
      text-align: center;
      margin-bottom: 20px;
      color: #333;
  }

  .story-form label {
      display: block;
      font-size: 1.1em;
      margin-bottom: 10px;
      color: #444;
  }

  .story-form input[type="text"],
  .story-form textarea,
  .story-form input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1em;
  }

  .story-form textarea {
      resize: vertical;
      min-height: 150px;
  }

  .story-form input[type="file"] {
      padding: 10px;
      background-color: #f0f0f0;
  }

  .submit-btn {
      background-color: #4CAF50;
      color: white;
      font-size: 1.1em;
      padding: 12px 25px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s ease;
  }

  .submit-btn:hover {
      background-color: #45a049;
  }

  .story-form input[type="text"]:focus,
  .story-form textarea:focus,
  .story-form input[type="file"]:focus {
      outline: none;
      border-color: #4CAF50;
  }
  .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
  }

  .footer .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
  }

  .footer p {
      margin: 0;
      font-size: 14px;
      color: #ccc;
  }

  .footer .footer-links {
      margin-top: 10px;
  }

  .footer .footer-links a {
      color: #ffe045;
      margin: 0 15px;
      text-decoration: none;
      font-size: 14px;
  }

  .footer .footer-links a:hover {
      text-decoration: underline;
  }

  @media (max-width: 768px) {
      .footer .footer-container {
          padding: 0 15px;
      }
      
      .footer p {
          font-size: 12px;
      }

      .footer .footer-links a {
          font-size: 12px;
          margin: 0 10px;
      }
  }
  #storySection {
          background-color: #f5f5f5;
          padding-top: 50px;
      }

      #storySection .container {
          max-width: 1200px; 
      }

      .story-list {
          display: grid;
          grid-template-columns: 1fr; 
          gap: 20px;
          margin-top: 20px;
      }
  .story-item {
          background-color: #fff;
          border-radius: 12px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          display: flex;
          flex-direction: row; 
          overflow: hidden;
          padding: 20px;
      }

        .story-image-container {
          flex: 0 0 400px;
          margin-right: 20px;
      }
  .story-item img {
      width: 100%;
      height: 250px; 
      object-fit: cover;
      border-radius: 10px;
  }

  .story-title {
      font-size: 1.4rem;
      font-weight: bold;
      color: #333;
      margin: 10px 15px;
  }

  .story-content {
      font-size: 1rem;
      color: #555;
      margin: 0 15px 15px;
  }

  .story-actions {
      display: flex;
      justify-content: space-between;
      padding: 0 15px 15px;
  }

  .action-button {
      background-color: transparent;
      border: none;
      color: #333;
      font-size: 1rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 2px;
      transition: color 0.3s ease;
  }

  .action-button:hover {
      color: #007bff;
  }

  .like-btn i, .comment-btn i, .share-btn i {
      font-size: 1.2rem;
      padding-right:5px;
  }

  .story-item:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
  }

  @media (max-width: 1024px) {
      .story-list {
          grid-template-columns: repeat(2, 1fr);
      }
  }

  @media (max-width: 768px) {
      .story-list {
          grid-template-columns: repeat(1, 1fr); 
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
  <?php
  // Database connection
  $conn = new mysqli("localhost", "root", "", "olympics");

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT title, content, image FROM stories";
  $result = $conn->query($sql);

  $sectionStyle = ($result->num_rows > 0) ? '' : 'style="display:none;"';
  $storyListStyle = ($result->num_rows > 0) ? '' : 'style="display:none;"';
  ?>

  <section id="storySection" class="py-6 pb-5" <?php echo $sectionStyle; ?>>
      <div class="container">
          <h2 class="text-center text-dark mb-4 pt-1 font-weight-bold" style="font-size: 2.1rem; letter-spacing: 1px;">
              Olympic Stories
          </h2>

          <div id="storyList" class="story-list" <?php echo $storyListStyle; ?>>
              <?php
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $title = htmlspecialchars($row["title"]);
                      $content = htmlspecialchars($row["content"]);
                      $imagePath = htmlspecialchars($row["image"]);

                      echo "<div class='story-item'>";
                      if ($imagePath) {
                          echo "<div class='story-image-container'><img src='/SAM-BE/F01/" . $imagePath . "' class='story-image' alt='Story Image'></div>";
                      }

                      echo "<div class='story-content-container'>";
                      echo "<h5 class='story-title'>" . $title . "</h5>";
                      echo "<p class='story-content'>" . $content . "</p>";

                      echo "<div class='story-actions'>";
                      echo "<button class='action-button like-btn'><i class='fas fa-heart'></i> Like</button>";
                      echo "<button class='action-button comment-btn'><i class='fas fa-comment'></i> Comment</button>";
                      echo "<button class='action-button share-btn'><i class='fas fa-share'></i> Share</button>";
                      echo "</div>";

                      echo "</div>";
                      echo "</div>"; 
                  }
              }
              ?>
          </div> 
      </div> 
  </section>

  <?php
  ?>

    
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
            
      <section class="story-form-section">
      <div class="form-container">
          <h2>Submit Your Olympic Journey</h2>
          <form action="submit_story.php" method="POST" enctype="multipart/form-data" class="story-form">
              <input type="hidden" name="user_id" value="USER_ID_HERE"> <!-- Replace with actual user ID -->

              <label for="title">Story Title:</label>
              <input type="text" name="title" id="title" placeholder="Enter story title" required>

              <label for="content">Story Content:</label>
              <textarea name="content" id="content" placeholder="Share your Olympic journey..." required></textarea>

              <label for="image">Upload Image:</label>
              <input type="file" name="image" id="image">

              <button type="submit" class="submit-btn">Submit Story</button>
          </form>
      </div>
  </section>

  <footer class="footer">
      <div class="footer-container">
          <p>&copy; 2025 Olympic Journey. All Rights Reserved.</p>
          <div class="footer-links">
              <a href="#">About</a>
              <a href="#">Contact</a>
              <a href="#">Privacy Policy</a>
          </div>
      </div>
  </footer>


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