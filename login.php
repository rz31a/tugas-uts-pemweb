<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="ceklogin.php">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="ai-ferrarry"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="ceklogin.php">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="ai-ferrarry"></i></a>
                </div>
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Sport Car</h1>
                    <p>Pilih dan kendarai mobil impian mu!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
    <footer>
        <p>Created with <i class="fa fa-heart"></i> by <a target="_blank" href="https://florin-pop.com">Florin Pop</a> - Read how I created this and how you can join the challenge <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.</p>
    </footer>
</body>
</html>