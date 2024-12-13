<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="s.css">
  <title>Holiday Planner</title>
  <style>
    /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #121212;
      color: #ffffff;
      overflow: auto;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 5px;
      background-color: #1f1f1f;
      border-bottom: 2px solid #2d2d2d;
    }

    .logo {
      align-items: right;
      padding-left: 50px;
      color: #00af87;
      font-size: 1.8rem;
      font-weight: bold;
    }
    .nav-links {
      display: flex;
      gap: 25px;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: #ffffff;
      font-weight: bold;
      transition: color 0.3s;
    }

    .nav-links a:hover {
      color: #00af87;
    }

    .currency-profile {
      display: flex;
      align-items: left;
      gap: 15px;
    }

    .currency-selector {
      padding: 8px;
      background: #2d2d2d;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
    }

    .profile-pic img {
      height: 35px;
      width: 35px;
      border-radius: 50%;
    }

    /* Drawer Menu */
    .drawer {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #1f1f1f;
      padding: 30px;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }

    .drawer.open {
      transform: translateX(0);
    }

    .drawer .drawer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .drawer .drawer-links a {
      display: block;
      padding: 15px 0;
      text-decoration: none;
      color: #ffffff;
      font-weight: bold;
      transition: color 0.3s;
    }

    .drawer .drawer-links a:hover {
      color: #00af87;
    }

    .drawer-toggle {
      position: absolute;
      top: 20px;
      left: 20px;
      background: none;
      border: none;
      color: #ffffff;
      font-size: 1.8rem;
      cursor: pointer;
    }

    .drawer-close {
      position: absolute;
      top: 20px;
      right: 20px;
      background: none;
      border: none;
      color: #ffffff;
      font-size: 1.8rem;
      cursor: pointer;
    }

    /* Hero Section */
    .hero-section {
      text-align: center;
      padding: 100px 10px;
      background-image: url('https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/d3830a09-d49e-4688-9982-1af3c9a83bc3/width=632/d3830a09-d49e-4688-9982-1af3c9a83bc3.jpeg');
      background-size: cover;
      background-position: center;
      color: #ffffff;
    }

    .hero-section h1 {
        color: black;
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .hero-section .btn {
      padding: 12px 30px;
      background-color: #00af87;
      color: #ffffff;
      text-decoration: none;
      font-size: 1.2rem;
      border-radius: 30px;
      transition: background-color 0.3s;
    }

    .hero-section .btn:hover {
      background-color: #008f6b;
    }

    /* Search Section */
    .search-section {
      display: flex;
      justify-content: center;
      padding: 30px;
      background-color: #1f1f1f;
    }

    .search-bar {
      display: flex;
      gap: 10px;
      width: 60%;
    }

    .search-bar input {
      flex-grow: 1;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
    }

    .search-bar button {
      padding: 12px 20px;
      background-color: #00af87;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }

    /* Features Section */
    .features {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      padding: 50px 20px;
      background-color: #121212;
    }

    .feature {
      background: #1f1f1f;
      border-radius: 10px;
      padding: 25px;
      text-align: center;
      width: 280px;
      box-sizing: border-box;
      transition: transform 0.3s ease;
    }

    .feature:hover {
      transform: translateY(-10px);
    }

    .feature img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .feature h3 {
      font-size: 1.8rem;
      margin-bottom: 15px;
    }

    .feature p {
      font-size: 1.1rem;
      margin-bottom: 20px;
    }

    .feature .btn {
      padding: 10px 20px;
      background-color: #00af87;
      color: #ffffff;
      text-decoration: none;
      font-size: 1rem;
      border-radius: 20px;
      transition: background-color 0.3s;
    }

    .feature .btn:hover {
      background-color: #008f6b;
    }

  </style>
</head>
<body>
  <!-- Drawer Menu -->
  <button class="drawer-toggle" onclick="toggleDrawer()">☰</button>
  <div class="drawer" id="drawer">
    <button class="drawer-close" onclick="toggleDrawer()">✖</button>
    <ul class="drawer-links">
      <li><a href="#">Home</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>

  <!-- Navbar -->
  <header>
    <nav class="navbar">
      <div class="logo">
        
        Holiday Bliss
      </div>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="currency-profile">
        <select class="currency-selector">
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
        </select>
        <div class="profile-pic">
          <img src="https://www.disneyplusinformer.com/wp-content/uploads/2021/06/Luca-Profile-Avatars-3.png" alt="Profile">
        </div>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <h1>Plan Your Perfect Holiday</h1>
    <a href="#features" class="btn">Explore Now</a>
  </section>

  <!-- Search Section -->
  <section class="search-section">
    <div class="search-bar">
      <input type="text" placeholder="Search for destinations, trips, or gifts...">
      <button>Search</button>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="features">
    <div class="feature">
      <img src="https://i.pinimg.com/originals/88/0e/08/880e08e651e84c68d85de074008eb6c3.jpg" alt="Trip Generation">
      <h3>AI Trip Generation</h3>
      <p>Let our AI design your dream trip based on your preferences.</p>
      <a href="ai_trips.php" class="btn">Try Now</a>
    </div>
    <div class="feature">
      <img src="https://th.bing.com/th/id/OIP.WZtNbcJjSsFpt1538djtNwHaE8?rs=1&pid=ImgDetMain" alt="Gifts">
      <h3>Gift Suggestions</h3>
      <p>Find the perfect holiday gifts for your loved ones.</p>
      <a href="gift_suggest.php" class="btn">Get Ideas</a>
    </div>
    <div class="feature">
      <img src="https://ihg.scene7.com/is/image/ihg/holiday-inn-washington-4082888243-4x3" alt="Hotel Search">
      <h3>Hotel Search</h3>
      <p>Browse and book the best hotels for your trip.</p>
      <a href="#" class="btn">Search Hotels</a>
    </div>
    <div class="feature">
      <img src="https://www.travelrepublic.co.uk/blog/wp-content/uploads/2017/07/iStock-497707354.jpg" alt="Top Destinations">
      <h3>Top Holiday Destinations</h3>
      <p>Explore the most popular destinations worldwide.</p>
      <a href="#" class="btn">View Destinations</a>
    </div>
  </section>

  <script>
    function toggleDrawer() {
      const drawer = document.getElementById('drawer');
      drawer.classList.toggle('open');
    }
  </script>
</body>
</html>
