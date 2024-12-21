<?php 
  include("connect.php"); 
  
  $query_personality = "SELECT * FROM islandsofpersonality";
  $result_personality = executeQuery($query_personality); 

  $query_content = "SELECT * FROM islandcontents";
  $result_content = executeQuery($query_content); 

?>

<!DOCTYPE html>
<html>

<head>
  <title>Inside Out: A Exploration of Personality</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      font-family: 'Aria', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    #home {
      position: relative;
      height: 100vh;
      background-image: url(img/ef24b7897d8ae68a54472883539c94816dcec467\ \(1\).jpg);
      background-size: cover;
      background-position: center;
      overflow: hidden;
    }

    #background-video {
      opacity: 0;
      visibility: hidden;
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
    }

    .home-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      z-index: 2;
    }

    .home-content h1 {
      font-size: 50px;
      font-weight: 600;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .home-content p {
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 30px;
    }

    .play-button {
      font-size: 20px;
      background: rgba(0, 0, 0, 0.6);
      padding: 20px;
      border-radius: 50%;
      display: inline-block;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .play-button:hover {
      transform: scale(1.2);
      background-color: #3a507b;
    }

    .play-button i {
      color: #fff;
    }

    #personalities {
      background-image: url('img/Group\ 1.png');
      background-size: cover;
      background-position: center;

    }

    .personality-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 20px;
    }

    .personality-card {
      flex: 0 0 calc(25% - 20px);
      max-width: calc(25% - 20px);
    }

    .w3-card-4 {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease-in-out;
      position: relative;
    }

    .w3-card-4:hover {
      transform: scale(1.05);
    }

    .floating-img {
      position: absolute;
      top: -10px;
      left: -10px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 3px solid white;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    #optimist {
      background-image: url(img/yel.png);
      background-size: cover;
      background-position: center;
      font-family: 'Helvetica Neue', sans-serif;
      color: white;
      padding: 64px 20px;
    }

    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: 95%;
      margin-left: auto;
      margin-right: auto;
    }

    .card-img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 8px 8px 0 0;
    }

    .card-body {
      padding: 20px;
    }

    .card-body h3 {
      font-size: 18px;
      color: #2C3E50;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .card-body p {
      font-size: 16px;
      color: #34495E;
      line-height: 1.6;
    }

    @media screen and (max-width: 768px) {
      .personality-card {
        flex: 0 0 calc(50% - 20px);
        max-width: calc(50% - 20px);
      }

      .w3-col {
        width: 100%;
        padding: 0 10px;
      }

      .card {
        margin-bottom: 15px;
        width: 100%;
      }
    }

    @media screen and (max-width: 480px) {
      .personality-row {
        justify-content: center;
      }

      .personality-card {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
  </style>

<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark"
    style="background-color: #3B4F76; color: #fff; position: sticky; top: 0; z-index: 10;">
    <div class="container">
      <a class="navbar-brand fs-4 fw-semibold p-3" href="#home" style="color: #fff;">Inside Out</a>

      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: #fff;"></span>
      </button>

      <div class="offcanvas offcanvas-end" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel"
        style="background-color: #3B4F76;">
        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body text-white">
          <ul class="navbar-nav pe-3 justify-content-end text-sm-center flex-grow-1">
            <li class="nav-item mx-2">
              <a class="nav-link fs-6" href="#home" style="color: #fff;">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link fs-6" href="#about" style="color: #fff;">About Me</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link fs-6" href="#personalities" style="color: #fff;">Personalities</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <header class="w3-display-container w3-wide" id="home">
    <video id="background-video" muted loop>
      <source src="De Leon, Loraine G.mov" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="home-content">
      <h1><span class="w3-padding w3-black w3-opacity-min"><b>Core</b></span> <span
          class="w3-text-light-grey">Memories</span></h1>
      <p>Exploring the Core Memories That Shape My Personality</p>
      <div class="play-button" onclick="toggleVideoPlay()">
        <i class="fas fa-play"></i>
      </div>
    </div>
  </header>

  <section id="about" class="w3-container w3-center w3-text-white" style="padding: 30px; background-color: #030c1d;">
    <div class="about-background" style="max-width: 1200px; margin: 0 auto;">
      <div class="w3-row-padding" style="margin-top: 40px; margin-left: 0; margin-right: 0;">
        <div class="w3-half" style="padding: 5px; position: relative;">
          <img src="img/me.jpg" alt="Loraine Image" class="w3-image w3-hover-opacity"
            style="width: 100%; height: 580px; object-fit: cover; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; transition: transform 0.3s ease;">

          <div class="w3-display-bottomleft"
            style="font-size: 18px; font-style: italic; background-color: rgba(0, 0, 0, 0.3); width: 100%; text-align: center; padding: 5px 0; border-radius: 10px;">
            "She brings joy to everyone" - Laura
          </div>
        </div>

        <div class="w3-half" style=" padding-top:10px; max-width: 600px;">
          <div class=" w3-round-large" style=" color: #f0f0f0; ">
            <h2 class="w3-large w3-text-shadow" style="margin-bottom: 10px; font-size: 20px;">Loraine: A Journey of Joy
              and Fear</h2>
            <p style="text-align: justify; line-height: 1.7; font-size: 14px;">
              Loraine is like Joy from the Inside Out—always bubbling with energy and ready to make others smile. Her
              infectious sense of humor and optimistic outlook light up any room she walks into. Whether it’s cracking
              jokes or sharing a funny story, Loraine has the unique ability to turn everyday moments into something
              special. Her laughter is a reminder that life is too short to take too seriously, and that joy can be
              found even in the smallest things.
            </p>
            <p style="text-align: justify; line-height: 1.7; font-size: 14px;">
              But beneath the laughter and lightheartedness, there's a side of Loraine that mirrors the emotion of Fear.
              It's not the kind of fear that’s obvious to everyone, but more of a quiet, internal one. She sometimes
              feels an apprehension—an anxiety over how she’s perceived and the judgment of others. It's a vulnerability
              that often holds her back from fully expressing herself. Despite her warm and welcoming exterior, Loraine
              can sometimes wonder if she’s saying the right things, if people are truly understanding her intentions,
              or if they’re judging her in ways she fears.
            </p>
            <p style="text-align: justify; line-height: 1.7; font-size: 14px;">
              Yet, it’s this balance between Joy and Fear that makes Loraine who she is. While she continues to spread
              laughter and positivity, she’s also on a personal journey of embracing her fears and insecurities. Slowly,
              she’s learning to let go of the worry and accept that being herself is enough, no matter what others might
              think. It’s this combination of humor, heart, and vulnerability that makes Loraine a truly unique
              individual—someone who brings light into the world while quietly finding her way toward personal growth.
            </p>
            <p
              style="text-align: left; font-size: 14px; font-style: italic; color: #f0f0f0; margin-top: 5px; padding-bottom:20px;">
              - Laura Beatriz Luna (Loraine’s Best Friend)
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="personalities" class="w3-container w3-padding-64" style="background-color: #f4f4f4;">
    <h1 class="w3-center w3-text-white" style="padding-bottom: 30px;">Four Islands of Personality</h1>
    <div class="w3-row personality-row">
      <?php
        $query = "SELECT * FROM islandsofpersonality";

        $result = executeQuery($query);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='personality-card'>
                        <div class='w3-card-4 w3-round-large'>
                            <img src='{$row['image']}' class='floating-img' alt='{$row['image']}'> <!-- Dynamically display image -->
                            <div class='w3-container w3-padding-16' style='background-color: {$row['color']}; text-align: center;'>
                                <h3 style='font-size: 20px; padding-bottom:10px'>" . htmlspecialchars($row['name']) . "</h3> 
                                <p style='margin-bottom: 20px;'>" . htmlspecialchars($row['longDescription']) . "</p>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No personalities found.</p>";
            }
        } else {
            echo "<p>Error executing query: " . $conn->error . "</p>";
        }
        ?>
    </div>
  </section>

  <section id="optimist" class="w3-container w3-padding-64">
    <div class="w3-center" style="margin-bottom: 40px; color: grey;">
        <h1 style="font-size: 30px; font-weight: 700; color: #2C3E50; letter-spacing: 2px;">
            Welcome to The Optimistic Island
        </h1>
        <p style="font-size: 18px; color: rgb(151, 146, 146); margin-top: 10px; line-height: 1.5;">Exploring life, one journey at a time.</p>


        <?php
        $result = executeQuery("SELECT * FROM islandcontents WHERE islandContentID IN (1, 2, 3, 13)");

        if ($result && $result->num_rows > 0) {
            $counter = 0;
            
            while ($row = $result->fetch_assoc()) {
                if ($counter % 2 == 0) {
                    echo "<div class='w3-row' style='margin-top: 40px;'>";
                }

                $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/default.jpg';
                $title = '';
                $description = '';

                switch ($row['islandContentID']) {
                    case 1:
                        $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/joy11.jpg';
                        $title = 'Radiating Positivity';
                        break;
                    case 2:
                        $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/joy12.jpg';
                        $title = 'The Power to Transform Challenges';
                        break;
                    case 3:
                        $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/joy13.jpg';
                        $title = 'Optimism in Action';
                        break;
                    case 13:
                        $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/op2.jpg';
                        $title = 'Embracing the Bright Side';
                        break;
                }

                echo "
                    <div class='w3-col l6 s12' style='padding: 0 10px; text-align: center;'>
                        <div class='card'>
                            <img src='" . htmlspecialchars($imagePath) . "' alt='Optimism' class='card-img'>
                            <div class='card-body'>
                                <h3 style='font-size: 22px; color: #2C3E50; font-weight: 600;'>$title</h3>
                                <p style='font-size: 16px; color: #34495E; line-height: 1.6;'>" . htmlspecialchars($row['content']) . "</p>
                            </div>
                        </div>
                    </div>";

                $counter++;

                if ($counter % 2 == 0) {
                    echo "</div>"; 
                }
            }

            if ($counter % 2 != 0) {
                echo "</div>"; 
            }
        } else {
            echo "<h1>No content found for Island Content IDs 1, 2, and 3.</h1>";
        }
        ?>
    </div>
</section>

<section id="traveler" class="w3-container" style="background-image: url('img/travelbg.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: #FFFFFF;">
    <div class="w3-center" style="margin-bottom: 30px; padding-top: 30px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #fff; letter-spacing: 2px; padding-top:30px">Welcome to The Explorer Island</h1>
        <p style="font-size: 18px; color: #d1d1d1; margin-top: 10px; line-height: 1.5;">A journey through wanderlust, adventure, and discovery.</p>
    </div>

    <div class="w3-row row" style="padding: 10px; display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $result = executeQuery("SELECT * FROM islandcontents WHERE islandContentID = 4");

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();  
            $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/default.jpg';
            $title = 'Embracing Adventure';  
            $content = htmlspecialchars($row['content']); 
        ?>

        <div class="w3-col l6 s12 col-lg-6 col-md-12 order-1 order-md-1" style="padding: 10px;">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden; padding: 20px;">
                <h3 style="font-size: 24px; color: #2874A6; font-weight: 600; margin-bottom: 15px;"><?php echo $title; ?></h3>
                <p style="font-size: 16px; color: #34495E; line-height: 1.8; text-align: justify;">
                    <?php echo $content . 'familiar landscapes. Whether it is trekking through the wilderness, sailing across vast oceans, or simply strolling through a hidden gem of a town, the journey is as important as the destination. Traveling teaches me more than just geography – it broadens my perspective on life, connects me to the diversity of the world, and reminds me of the beauty that surrounds us.'; ?>
                </p>
                <p style="font-size: 16px; color: #34495E; line-height: 1.8; text-align: justify">
                    The experiences, the memories, and the stories that unfold along the way are what make life truly extraordinary. With each trip, I grow both personally and spiritually. The world is full of wonders that I have yet to explore, and that excitement drives me to continue pushing my boundaries. There's a unique magic in immersing oneself in new environments, letting go of the familiar, and discovering the unexpected. Every journey brings something new—whether it’s a lesson, an epiphany, or simply the joy of living in the moment. Adventure is not just about reaching the destination; it’s about the endless learning and growth that happens along the way.
                </p>
            </div>
        </div>

        <div class="w3-col l4 s12 col-lg-4 col-md-12 order-2 order-md-2" style="padding: 10px;">
            <div style="margin-bottom: 20px;">
                <?php
                $imagePath1 = 'img/travel1.jpg';
                echo "<img src='" . htmlspecialchars($imagePath1) . "' alt='Adventure' class='card-img img-fluid' style='width: 100%; height: 300px; border-bottom: 3px solid #2874A6; object-fit: cover;'>";
                ?>
            </div>
            <div>
                <?php
                $imagePath2 = 'img/travl2.jpg';
                echo "<img src='" . htmlspecialchars($imagePath2) . "' alt='Discovering New Horizons' class='card-img img-fluid' style='width: 100%; height: 300px; border-bottom: 3px solid #1ABC9C; object-fit: cover;'>";
                ?>
            </div>
        </div>

        <?php
        } else {
            echo "<p>No content available for this section.</p>";
        }
        ?>
    </div>
</section>

<section id="competitors" class="w3-container w3-padding-64" 
    style="background-image: url('img/bg5.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w3-center" style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #fff; letter-spacing: 2px;">Competitor Island</h1>
        <p style="font-size: 18px; color: #d1d1d1; margin-top: 10px; line-height: 1.5;">A journey through our competitors' eras that have shaped my character and skills.</p>
    </div>

    <div class="w3-row" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">

       
        <?php
        $result = executeQuery("SELECT * FROM islandcontents WHERE islandContentID = 7");

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();  
            $imagePath1 = isset($row['image_path']) ? $row[ 'image_path'] : 'img/comp1.jpg';
            $title1 = 'The Pageant Era';  
            $content = htmlspecialchars($row['content']); 
        }
      ?>
      
        <div class="w3-card-4 w3-margin w3-round" style="max-width: 300px;background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden;">
            <img src="<?php echo $imagePath1; ?>" alt="Competitor 1" style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
            <div class="w3-padding">
                <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px; padding-top:10px;"><?php echo $title1; ?></h3>
                <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify"><?php echo $content; ?></p>
            </div>
        </div>
        <?php
        $result = executeQuery("SELECT * FROM islandcontents WHERE islandContentID = 8");

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();  
            $imagePath2 = isset($row['image_path']) ? $row['image_path'] : 'img/sporty.jpg';
            $title = 'The Sporty Era';  
            $content = htmlspecialchars($row['content']); 
        }
        ?>
        <div class="w3-card-4 w3-margin w3-round" style="max-width: 300px;background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden;">
            <img src="<?php echo $imagePath2; ?>" alt="Competitor 1" style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
            <div class="w3-padding">
                <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px; padding-top:10px;"><?php echo $title; ?></h3>
                <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify"><?php echo $content; ?></p>
            </div>
        </div>
        <?php
        $result = executeQuery("SELECT * FROM islandcontents WHERE islandContentID = 9");

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();  
            $imagePath = isset($row['image_path']) ? $row['image_path'] : 'img/op1.jpg';
            $title = 'The Dancer Era';  
            $content = htmlspecialchars($row['content']); 
        ?>
        <div class="w3-card-4 w3-margin w3-round" style="max-width: 300px;background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden;">
            <img src="<?php echo $imagePath; ?>" alt="Competitor 1" style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
            <div class="w3-padding">
                <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px; padding-top:10px;"><?php echo $title; ?></h3>
                <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify"><?php echo $content; ?></p>
            </div>
        </div>

        <?php
        } else {
            echo "<p>No content found for competitors.</p>";
        }
        ?>

    </div>
</section>


  <section id="loving" class="w3-container w3-padding-64"
    style="background-image: url('img/lovbg.png '); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w3-center" style="margin-bottom: 40px;">
      <h1 style="font-size: 36px; font-weight: 700; color: #fff;">My Loved Ones</h1>
      <p style="font-size: 18px; color: #fff; margin-top: 10px; line-height: 1.5;">A tribute to those who fill my heart
        with love and warmth.</p>
    </div>


    <div class="w3-row w3-padding-32" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
      <div class="w3-card-4 w3-margin w3-round" style="max-width: 320px;">
        <img src="img/loving3.jpg" alt="Loved One 1"
          style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px 12px 0 0;">
      </div>

      <div class="w3-card-4 w3-margin w3-round" style="max-width: 320px;">
        <img src="img/opti1.jpg" alt="Loved One 2"
          style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px 12px 0 0;">
      </div>

      <div class="w3-card-4 w3-margin w3-round" style="max-width: 320px;">
        <img src="img/loving2.jpg" alt="Loved One 3"
          style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px 12px 0 0;">
      </div>
    </div>

    <div class="w3-center w3-padding-32">
      <div class="w3-card-4 w3-padding-32"
        style="max-width: 800px; background-color: rgba(255, 255, 255, 0.8); border-radius: 12px; margin: auto;">
        <h2 style="font-size: 24px; color: #2C3E50; font-weight: 600;">A Special Letter to my Family</h2>
        <p style="font-size: 16px; color: #34495E; line-height: 1.6; text-align: justify; padding: 20px;">
          To my family, words can never fully express how grateful I am for your constant love, support, and
          understanding. You are my strength, my joy, and the reason for all the smiles I carry every day. I cherish
          every moment we share and look forward to many more. Thank you for always being there, no matter the time or
          the place. I love you with all my heart.
        </p>
      </div>
  </section>

  <footer class="w3-center w3-padding-16" style="background-color: #3B4F76;">
    <p style="color: white;"> Inside Out Personality Website <a href="https://www.w3schools.com/w3css/default.asp"
        title="W3.CSS" target="_blank"></a> </p>
    <p style="color: white;">© 2024 Loraine D. All right Reserved</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    function toggleNav() {
      var x = document.getElementById("navbar-links");
      if (x.className === "w3-right w3-hide-small") {
        x.className = "w3-right w3-hide-small w3-show";
      } else {
        x.className = "w3-right w3-hide-small";
      }
    }

    function toggleVideoPlay() {
      var video = document.getElementById("background-video");
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    }

    const video = document.getElementById("background-video");

    function toggleVideoPlay() {
      if (video.paused) {
        video.play();
        document.querySelector(".play-button i").classList.remove("fa-play");
        document.querySelector(".play-button i").classList.add("fa-pause");

        video.style.opacity = "1";
        video.style.visibility = "visible";
      } else {
        video.pause();
        document.querySelector(".play-button i").classList.remove("fa-pause");
        document.querySelector(".play-button i").classList.add("fa-play");

        video.style.opacity = "0";
        video.style.visibility = "hidden";
      }
    }
  
  </script>

</body>

</html>