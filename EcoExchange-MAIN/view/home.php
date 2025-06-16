<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EcoExchange</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/home.css" />
</head>
<body>

  <div class="header">
    <!-- Header Top -->
    <div class="header-top">
      <div class="logo">🌱 EcoExchange</div>

      <div class="search-container">
        <input type="text" placeholder="Search" />
        <button type="button">Search</button>
      </div>

      <div class="header-right">
        <i class="icon-heart">🤍</i>
        <a href="seller_profile.php" class="sign">Profile</a>
        <a href="#" class="logout">Log Out</a>
      </div>
    </div>

    <!-- Navigation Bar -->
    <div class="navbar">
      <div class="navbar-left">
        <a href="#" class="active">Home</a>
        <a href="#">Explore</a>
        <a href="#">Pages ▼</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </div>
      <div class="navbar-right">
        <i class="icon-phone">📞</i>
        <span>(219) 555-0114</span>
      </div>
    </div>
  </div>
  <!-- Main Content Container -->
  <main class="container">

    <!-- Hero Banner -->
    <section class="hero">
      <div class="hero-text">
        <div class="hero-text-inner">
          <div>
            <h1>Share Food, Spread Kindness, Build Community</h1>
          </div>
          <div>
            <button>Explore -></button>
          </div>
        </div>
      </div>
      <div>
        <img src="../assets/Untitled__1_-removebg-preview(1).png" alt="Hero banner">
      </div>
    </section>

    <!-- <section class="features">
      <div class="feature">
        <img src="https://picsum.photos/100?random=11" alt="Donate">
        <h3>Donate</h3>
      </div>
      <div class="feature">
        <img src="https://picsum.photos/100?random=12" alt="Exchange">
        <h3>Exchange</h3>
      </div>
    </section> -->

    <section class="features">
      <div class="feature">
        <img src="../assets/features-icons/Verified Account.jpg" height="80" alt="Donate">
        <h3>Easy to use</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Noodle.jpg" height="80" alt="Exchange">
        <h3>Sustain Food</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Hand Holding Heart.jpg" height="80" alt="Donate">
        <h3>Donate and Share</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Sync.jpg" height="80" alt="Exchange">
        <h3>Exchange food</h3>
      </div>
    </section>

    <!-- Categories -->
    <section class="features">
      <div class="feature">
        <img src="../assets/features-icons/Verified Account.jpg" height="80" alt="Donate">
        <h3>Easy to use</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Noodle.jpg" height="80" alt="Exchange">
        <h3>Sustain Food</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Hand Holding Heart.jpg" height="80" alt="Donate">
        <h3>Donate and Share</h3>
      </div>
      <div class="feature">
        <img src="../assets/features-icons/Sync.jpg" height="80" alt="Exchange">
        <h3>Exchange food</h3>
      </div>
      
    </section>


    <!-- Categories Section -->
    <section class="categories">
      <!-- <h2>Categories</h2> -->
      <div class="category-grid">
        <img src="https://picsum.photos/80?random=21" alt="Fruits">
        <img src="https://picsum.photos/80?random=22" alt="Vegetables">
        <img src="https://picsum.photos/80?random=23" alt="Snacks">
        <img src="https://picsum.photos/80?random=24" alt="Grains">
        <img src="https://picsum.photos/80?random=25" alt="Drinks">
      </div>
    </section>

    <!-- Popular Products -->
    <section class="products">
      <h2>Popular Products</h2>
      <div class="product-grid">
        <div><img src="https://picsum.photos/100?random=31" alt=""><p>Orange</p></div>
        <div><img src="https://picsum.photos/100?random=32" alt=""><p>Spinach</p></div>
        <div><img src="https://picsum.photos/100?random=33" alt=""><p>Eggplant</p></div>
        <div><img src="https://picsum.photos/100?random=34" alt=""><p>Banana</p></div>
        <div><img src="https://picsum.photos/100?random=35" alt=""><p>Cauliflower</p></div>
      </div>
    </section>

    <!-- Offer Banner -->
    <section class="offer-banner">
      <img src="https://picsum.photos/1320/600?random=40" alt="Big offer banner">
      <div class="offer-text">37% OFF</div>
    </section>

    <!-- Post an Item -->
    <section class="post-item">
      <h2>Post an Item</h2>
      <form>
        <input type="text" placeholder="Item Name" required>
        <input type="text" placeholder="Description" required>
        <button type="submit">Submit</button>
      </form>
    </section>

  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-columns">
      <div>
        <h4>Company</h4>
        <p>About</p>
        <p>Contact</p>
      </div>
      <div>
        <h4>Legal</h4>
        <p>Privacy</p>
        <p>Terms</p>
      </div>
      <div>
        <h4>Follow</h4>
        <p>Facebook</p>
        <p>Instagram</p>
      </div>
    </div>
    <p class="copyright">© 2025 EcoExchange</p>
  </footer>

</body>
</html>
