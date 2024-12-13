<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: #121212; /* Dark black background */
    color: #E0E0E0; /* Light text color for contrast */
    background: linear-gradient(to right, #0f2027, #203a43, #2c5364); /* Dark teal gradient */
}

.container {
    background: #1e1e1e; /* Dark container background */
    width: 450px;
    padding: 2rem;
    margin: 50px auto;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6); /* Stronger shadow for dark theme */
    transition: 0.3s ease all;
}

.container:hover {
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
}

form {
    margin: 0 2rem;
}

.form-title {
    font-size: 1.7rem;
    font-weight: bold;
    text-align: center;
    padding: 1.5rem;
    margin-bottom: 0.8rem;
    color: #00BFA5; /* Teal for title */
}

input {
    color: #E0E0E0; /* Light text for inputs */
    width: 100%;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #4CAF50; /* Teal underline */
    padding-left: 1.5rem;
    font-size: 16px;
    transition: 0.3s ease all;
}

.input-group {
    padding: 1% 0;
    position: relative;
}

.input-group i {
    position: absolute;
    color: #00BFA5; /* Teal for icons */
}

input:focus {
    background-color: transparent;
    outline: none;
    border-bottom: 2px solid #00BFA5; /* Teal underline on focus */
}

input::placeholder {
    color: #9E9E9E; /* Lighter gray for placeholders */
}

label {
    color: #9E9E9E; /* Light gray for labels */
    position: relative;
    left: 1.2em;
    top: -1.3em;
    cursor: auto;
    transition: 0.3s ease all;
}

input:focus~label, 
input:not(:placeholder-shown)~label {
    top: -3em;
    color: #00BFA5;
    font-size: 14px;
}

.recover {
    text-align: right;
    font-size: 1rem;
    margin-bottom: 1.2rem;
}

.recover a {
    text-decoration: none;
    color: #00BFA5; /* Teal links */
    transition: 0.3s;
}

.recover a:hover {
    color: #1DE9B6; /* Brighter teal on hover */
    text-decoration: underline;
}

.btn {
    font-size: 1.2rem;
    padding: 10px 0;
    border-radius: 10px;
    outline: none;
    border: none;
    width: 100%;
    background: #00BFA5; /* Teal button */
    color: #121212; /* Black text on button */
    cursor: pointer;
    transition: 0.4s;
}

.btn:hover {
    background: #1DE9B6; /* Brighter teal on hover */
    box-shadow: 0 10px 30px rgba(0, 191, 165, 0.6); /* Teal glow */
    transform: scale(1.05); /* Slight zoom effect */
}

.or {
    font-size: 1.2rem;
    margin-top: 0.7rem;
    text-align: center;
    color: #9E9E9E; /* Gray text */
}

.icons {
    text-align: center;
}

.icons i {
    color: #00BFA5;
    padding: 0.8rem 1.2rem;
    border-radius: 50%;
    font-size: 1.6rem;
    cursor: pointer;
    border: 2px solid #2C5364; /* Border matching background */
    margin: 0 10px;
    transition: 0.3s ease all;
}

.icons i:hover {
    background: #00BFA5;
    color: #121212; /* Black icon on hover */
    border: 2px solid #1DE9B6; /* Brighter teal border */
    transform: scale(1.1);
}

.links {
    display: flex;
    justify-content: space-around;
    padding: 0 4rem;
    margin-top: 1.2rem;
    font-weight: bold;
}

button {
    color: #00BFA5;
    border: none;
    background-color: transparent;
    font-size: 1rem;
    font-weight: bold;
    transition: 0.3s ease;
}

button:hover {
    text-decoration: underline;
    color: #1DE9B6; /* Brighter teal on hover */
}

  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName"  required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName"  required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password"  required>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password"  required>
              <label for="password">Password</label>
          </div>
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="script.js"></script>
</body>
</html>