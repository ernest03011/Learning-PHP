<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button, a.button-link {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover, a.button-link:hover {
            background-color: #0056b3;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <h1>Library Books</h1>

    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Status</th>
                <th>Borrower Name</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example of an available book -->
            <tr>
                <td>The Great Gatsby</td>
                <td>Available</td>
                <td class="hidden">N/A</td>
                <td class="hidden">N/A</td>
                <td><a href="borrow.php?book_id=1" class="button-link">Borrow</a></td>
            </tr>
            <!-- Example of a borrowed book -->
             <tr>
                <td>To Kill a Mockingbird</td>
                <td>Borrowed</td>
                <td>John Doe</td>
                <td>2024-08-01</td>
                <td>
                    <!-- Show Return button if due date has passed -->
                    <a href="return.php?book_id=2" class="button-link">Return</a>
                </td>
            </tr>
            <!-- Example of a borrowed book that is not due yet -->
            <tr>
                <td>1984</td>
                <td>Borrowed</td>
                <td>Jane Smith</td>
                <td>2024-08-15</td>
                <td>
                    <!-- Return button hidden as the due date hasn't passed -->
                    <button class="hidden">Return</button>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>