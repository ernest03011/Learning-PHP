<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .buttons button, .buttons a {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            width: 48%;
        }
        .buttons button {
            background-color: #007bff;
            color: #fff;
        }
        .buttons button:hover {
            background-color: #0056b3;
        }
        .buttons a {
            background-color: #ccc;
            color: #333;
        }
        .buttons a:hover {
            background-color: #999;
        }
    </style>
</head>
<body>

    <div class="confirmation-container">
        <h2>Return Confirmation</h2>
        <p>Are you sure you want to mark the following book as returned?</p>
        <div class="details">
            <p><strong>Book Title:</strong> The Great Gatsby</p>
            <p><strong>Borrower Name:</strong> John Doe</p>
            <p><strong>Due Date:</strong> 2024-08-01</p>
        </div>
        <div class="buttons">
            <form action="process_return.php" method="post" style="width: 48%;">
                <input type="hidden" name="book_id" value="1">
                <button type="submit">Confirm Return</button>
            </form>
            <a href="index.php">Cancel</a>
        </div>
    </div>

</body>
</html>
