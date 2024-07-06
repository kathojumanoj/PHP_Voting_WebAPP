<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

nav {
    background-color: #007BFF;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
}

nav a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 0 10px;
    background-color: #0056b3;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: #004ca1;
}

.nav-right {
    text-align: right;
}

.container {
    background-color: #fff;
    margin: 20px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top:20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
    /* text-align: left; */
    text-align: center;

}

th {
    background-color: #007BFF;
    color: white;
    text-align: center;

}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    max-width: 150px;
    border-radius: 5px;
    margin-top: 10px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

h3 {
    font-weight: bold;
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    nav a {
        display: block;
        margin: 5px 0;
    }

    .nav-right {
        text-align: left;
    }
}

    </style>
<nav><b><span style="font-size: larger;"> Digital Voting System </span></b>
    
    <a href="./main.php">Details</a>
    <a href="./elections.php">Elections</a>
    <a href="./aboutus.php">About us</a>
    <a href="./voterValid.html">Set Vote Pin</a>
    <a href="./logout.php">Logout</a>
    <span style="float: right; font-size: larger;">Welcome, <?=$_SESSION["name"] ?></span>
  </nav>