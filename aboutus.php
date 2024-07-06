<?php
 session_start();
 include("nav.php");
 ?>
 <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

header {
    background-color: #007BFF;
    color: white;
    padding: 10px 0;
}

nav {
    text-align: center;
}

nav a {
    text-decoration: none;
    color: white;
    margin: 0 20px;
    font-weight: bold;
}

.about-section {
    max-width: 800px;
    margin: 20px auto;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.team-section {
    max-width: 800px;
    margin: 20px auto;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h2 {
    font-size: 20px;
    margin-bottom: 20px;
}

.team-member {
    text-align: center;
    margin: 20px;
}

.team-member img {
    max-width: 100%;
    border-radius: 50%;
}

h3 {
    font-size: 18px;
    margin: 10px 0;
}

p {
    font-size: 14px;
}

     </style>
<body>
    <section class="about-section">
        <h1>About Digital Voting Application</h1>
        <p>
            Welcome to our online voting platform! We are dedicated to providing a secure and convenient way for citizens to exercise their right to vote.
        </p>
        <p>
            Our mission is to promote transparency, accessibility, and trust in the democratic process. With our user-friendly interface, you can easily cast your vote from the comfort of your own home.
        </p>
        <p>
            Our team of experts is committed to ensuring the integrity of the voting system and protecting your data. We employ the latest security measures to safeguard your information.
        </p>
    </section>
    
    <!-- <section class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-member">
            <img src="team_member1.jpg" alt="John Doe">
            <h3>John Doe</h3>
            <p>Founder & CEO</p>
        </div>
        <div class="team-member">
            <img src="team_member2.jpg" alt="Jane Smith">
            <h3>Jane Smith</h3>
            <p>Lead Developer</p>
        </div> -->
    </section>
</body>