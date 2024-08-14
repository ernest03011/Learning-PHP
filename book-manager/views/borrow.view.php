<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

    <div class="form-container">
        <h2>Borrow Book</h2>
        <form action="process_borrow.php" method="post">
            <label for="borrower_name">Borrower Name:</label>
            <input type="text" id="borrower_name" name="borrower_name" required>

            <label for="borrow_date">Borrow Date:</label>
            <input type="date" id="borrow_date" name="borrow_date" value="<?php echo date('Y-m-d'); ?>" readonly>

            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>

            <div class="buttons">
                <button type="submit">Submit</button>
                <a href="index.php">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
