<!DOCTYPE html>
<html>
    <head>
        <title>File Error</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background: #fff;
                padding: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                text-align: center;
            }

            h2 {
                color: #333;
            }

            .button {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php if(isset($message)) : ?>
                <h2><?= htmlspecialchars($message) ?></h2>
            <?php else: ?>
                <h2>An error has occurred.</h2>
            <?php endif; ?>
            <a href="/" class="button">Go back to Homepage</a>
        </div>
    </body>
</html>