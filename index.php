<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index_style.css">
    <title>Document</title>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const welcomeTitle = document.querySelector('.container h1');
        const welcomeText = document.querySelector('.container p');

        form.addEventListener('submit', function(e) {
            // Prevent immediate form submission
            e.preventDefault();

            // Change the welcome message
            welcomeTitle.textContent = "Thank You!";
            welcomeText.textContent = "Thanks for the recommendation";

            // Add a fade effect
            welcomeTitle.style.animation = 'fadeChange 0.5s ease-in-out';
            welcomeText.style.animation = 'fadeChange 0.5s ease-in-out';

            // Submit the form after a brief delay
            setTimeout(() => {
                form.submit();
            }, 800);
        });
    });
    </script>
</head>
<body>
    <div class="page-wrapper">
        <div class="container">
            <h1>Hello</h1>
            <p>Welcome who do you recommend</p>
        </div>
        

        <form action="./includes/handle_form.php" method="post" class="fill">
            <label for="name">
                Name
                <input type="text" name="name" id="name" required>
            </label>
            <br>
            <label for="skill">
                Creative Skills
                <input type="text" name="skill" id="skill" required>
            </label>
            <br>
            <label for="email">
                Email
                <input type="email" name="email" id="email" required>
            </label>
            <br>
            <label for="phone">
                Phone
                <input type="phone" name="phone" id="phone" required>
            </label>
            
            <input type="submit" name="submit" id="submit">
        </form>
    </div>

    <!-- Admin Dashboard -->
    <a href="admin\login.php" class="adminLink">Admin Dashboard</a>
</body>
</html>