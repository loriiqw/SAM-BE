<?php 
  include("connect.php");  // Connect to the database
  // Query to fetch personality data
  $query = "SELECT * FROM islandsofpersonality";
  $result = executeQuery($query); // Execute the query
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

  
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #3B4F76; color: #fff; position: sticky; top: 0; z-index: 10;">
    <div class="container">
      <a class="navbar-brand fs-4 fw-semibold p-3" href="#home" style="color: #fff;">Inside Out</a>

      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: #fff;"></span>
      </button>

      <div class="offcanvas offcanvas-end" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel" style="background-color: #3B4F76;">
        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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

        <div class="w3-half" style="padding-left: 40px; max-width: 600px;">
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
        // Assuming you have a query already executed to get $result
        // Example: $result = executeQuery("SELECT * FROM islandsofpersonality");

        // Check if there are results
        if ($result->num_rows > 0) {
            // Loop through each personality and display it
            while ($row = $result->fetch_assoc()) {
                // Dynamically echo personality name, description, and image based on data
                echo "
                <div class='personality-card'>
                    <div class='w3-card-4 w3-round-large'>
                        <img src='img/{$row['image']}.jpg'class='floating-img'> <!-- Dynamically display image -->
                        <div class='w3-container w3-padding-16' style='background-color: {$row['color']}; text-align: center;'>
                            <h3>" . htmlspecialchars($row['name']) . "</h3> <!-- Display personality name -->
                            <p style='margin-bottom: 20px;'>" . htmlspecialchars($row['longDescription']) . "</p> <!-- Display long description -->
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No personalities found.</p>";
        }
        ?>
    </div> <!-- Close personality-row div -->
</section> <!-- Close the section -->



<!---
      <div class="personality-card">
        <div class="w3-card-4 w3-round-large">
          <img src="img/d1.jpg" alt="Thoughtful Explorer" class="floating-img">
          <div class="w3-container w3-padding-16" style="background-color: #FFCDD2; text-align: center;">
            <h3>Thoughtful Explorer</h3>
            <p style="margin-bottom: 20px;">The Explorer within her loves trying new things, whether it’s traveling to
              new places, meeting new people, or diving into different hobbies.</p>
          </div>
        </div>
      </div>

      <div class="personality-card">
        <div class="w3-card-4 w3-round-large">
          <img src="img/joy.png" alt="Competitor" class="floating-img">
          <div class="w3-container w3-padding-16" style="background-color: #B2DFDB;text-align: center;">
            <h3>The Competitor</h3>
            <p style="margin-bottom: 20px;">Loraine have a strong desire to win and would be highly driven to achieve
              her goals, both individually and as part of a team. </p>
          </div>
        </div>
      </div>

      <div class="personality-card">
        <div class="w3-card-4 w3-round-large">
          <img src="img/saddd.jpg" alt="Loving Sou" class="floating-img">
          <div class="w3-container w3-padding-16" style="background-color: #e9a2e6; text-align: center;">
            <h3>Loving Soul</h3>
            <p style="margin-bottom: 20px;">Loraine is loving, offering kindness and warmth to everyone around her,
              always ready to listen and provide support.</p>
          </div>
        </div>
      </div>

    </div>
  </section>
   -->

  <section id="optimist" class="w3-container w3-padding-64">
    <div class="w3-center" style="margin-bottom: 40px;">
      <h1 style="font-size: 30px; font-weight: 700; color: #2C3E50; letter-spacing: 2px;">Welcome to The Optimistic
        Island
      </h1>
      <p style="font-size: 18px; color: #7F8C8D; margin-top: 10px;">Description
      </p>
    </div>

    <div class="w3-row">
      <div class="w3-col l6 s12" style="padding: 0 10px;">
        <div class="card">
          <img src="img/joy11.jpg" alt="Optimism" class="card-img">
          <div class="card-body">
            <h3 style="font-size: 22px; color: #2C3E50; font-weight: 600;">Optimism: A Superpower</h3>
            <p style="font-size: 16px; color: #34495E; line-height: 1.6;">Loraine’s optimism is contagious. Like Joy
              from *Inside Out*, she radiates positivity, always finding a way to uplift those around her with every
              challenge.</p>
          </div>
        </div>
      </div>

      <div class="w3-col l6 s12" style="padding: 0 10px;">
        <div class="card">
          <img src="img/op2.jpg" alt="Optimism" class="card-img">
          <div class="card-body">
            <h3 style="font-size: 22px; color: #2C3E50; font-weight: 600;">Optimism: A Superpower</h3>
            <p style="font-size: 16px; color: #34495E; line-height: 1.6;">Her ability to see the bright side in any
              situation brings joy to others. She teaches us that with the right mindset, every setback can turn into an
              opportunity.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="w3-container" style="padding: 20px; margin-top: 20px;">
      <div
        style="max-width: 800px; margin: 0 auto; background-color: #FFFFFF; border-radius: 12px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); padding: 20px;">
        <p style="font-size: 18px; color: #2C3E50; line-height: 1.8; text-align: center;">
          “Loraine’s optimism is truly inspiring. She has this rare ability to see the good in every challenge, turning
          obstacles into opportunities. Her positivity is contagious and uplifts everyone around her, making her a
          source of light in any situation.”
        </p>
        <p style="font-size: 16px; color: #7F8C8D; text-align: center; margin-top: 10px;">
          - Reina Cabrera (Loraine's Friend)
        </p>
      </div>
    </div>
  </section>
  

  <section id="traveler" class="w3-container"
    style="background-image: url('img/travelbg.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: #FFFFFF;">
    <div class="w3-center" style="margin-bottom: 30px; padding-top: 30px;">
      <h1 style="font-size: 32px; font-weight: 700; color: #fff; letter-spacing: 2px; ">
        Welcome to The Explorer Island
      </h1>
      <p style="font-size: 18px; color: #d1d1d1; margin-top: 10px; line-height: 1.5;">
        A journey through wanderlust, adventure, and discovery.
      </p>
    </div>

    <div class="w3-row row" style="padding: 20px; display: flex; flex-wrap: wrap; justify-content: center;">
      <div class="w3-col l6 s12 col-lg-6 col-md-12 order-1 order-md-1" style="padding: 10px;">
        <div class="card"
          style="background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden; padding: 20px;">
          <h3 style="font-size: 24px; color: #2874A6; font-weight: 600; margin-bottom: 15px;">Embracing Adventure</h3>
          <p style="font-size: 16px; color: #34495E; line-height: 1.8; text-align: justify;">
            Every journey is a new story waiting to be written. From scaling the peaks of majestic mountains to
            wandering through vibrant city streets, I find joy in embracing the unknown. Each adventure offers a chance
            to discover new cultures, meet fascinating people, and experience the thrill of exploring unfamiliar
            landscapes. Whether it's trekking through the wilderness, sailing across vast oceans, or simply strolling
            through a hidden gem of a town, the journey is as important as the destination. Traveling teaches me more
            than just geography – it broadens my perspective on life, connects me to the diversity of the world, and
            reminds me of the beauty that surrounds us.
          </p>
          <p style="font-size: 16px; color: #34495E; line-height: 1.8; text-align: justify">
            The experiences, the memories, and the stories that unfold along the way are what make life truly
            extraordinary. With each trip, I grow both personally and spiritually. The world is full of wonders that I
            have yet to explore, and that excitement drives me to continue pushing my boundaries. There's a unique magic
            in immersing oneself in new environments, letting go of the familiar, and discovering the unexpected. Every
            journey brings something new—whether it’s a lesson, an epiphany, or simply the joy of living in the moment.
            Adventure is not just about reaching the destination; it’s about the endless learning and growth that
            happens along the way.
          </p>
        </div>
      </div>

      <div class="w3-col l4 s12 col-lg-4 col-md-12 order-2 order-md-2" style="padding: 10px;">
        <div style="margin-bottom: 20px;">
          <img src="img/travel1.jpg" alt="Adventure" class="card-img img-fluid"
            style="width: 100%; height: 300px; border-bottom: 3px solid #2874A6; object-fit: cover;">
        </div>
        <div>
          <img src="img/travl2.jpg" alt="Discovering New Horizons" class="card-img img-fluid"
            style="width: 100%; height: 300px; border-bottom: 3px solid #1ABC9C; object-fit: cover;">
        </div>
      </div>
    </div>
  </section>

  <section id="competitors" class="w3-container w3-padding-64"
    style="background-image: url('img/bg5.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w3-center" style="margin-bottom: 40px;">
      <h1 style="font-size: 32px; font-weight: 700; color: #fff; letter-spacing: 2px; ">Competitor Island</h1>
      <p style="font-size: 18px; color: #d1d1d1; margin-top: 10px; line-height: 1.5;">A journey through our competitors'
        eras that have shaped their character and skills.</p>
    </div>

    <div class="w3-row" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">

      <div class="w3-card-4 w3-margin w3-round"
        style="max-width: 300px;background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden; ">
        <img src="img/comp1.jpg" alt="Competitor 1"
          style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
        <div class="w3-padding">
          <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px;">Pageant Era</h3>
          <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify">The Pageant Era was a
            defining moment of confidence, grace, and discipline. This phase nurtured my ability to present myself with
            poise and embrace challenges in the spotlight.</p>
        </div>
      </div>

      <div class="w3-card-4 w3-margin w3-round"
        style="background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden;  max-width: 300px;">
        <img src="img/sporty 1.jpg" alt="Competitor 2"
          style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
        <div class="w3-padding">
          <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px;">Sporty Era</h3>
          <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify">My Sporty Era taught me the
            importance of resilience, teamwork, and perseverance. It was during this time that I learned to push my
            limits and thrive under pressure, both physically and mentally.</p>
        </div>
      </div>

      <div class="w3-card-4 w3-margin w3-round"
        style=" background-color: rgba(255, 255, 255, 0.85); border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); overflow: hidden; max-width: 300px;">
        <img src="img/op1.jpg" alt="Competitor 3"
          style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
        <div class="w3-padding">
          <h3 style="font-size: 20px; color: #2C3E50; font-weight: 600; margin-bottom: 15px;">Dancer Era</h3>
          <p style="font-size: 15px; color: #34495E; line-height: 1.8; text-align: justify">The Dancer Era was a journey
            of emotional release and creative expression. It refined my ability to convey emotions through movement and
            connect with others in a more profound, graceful manner.</p>
        </div>
      </div>

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