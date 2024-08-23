<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library Page</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }

            h1, h2 {
                text-align: center;
                color: #333;
            }

            /* Index Page (index.php) Styles */
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

            button:hover, a.button-link:hover, a.button-link-return:hover {
                background-color: #0056b3;
            }

            button, a.button-link-return {
                padding: 5px 10px;
                background-color: #fff;
                color: #007bff;
                text-decoration: none;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .hidden {
                display: none;
            }

            /* Borrow Page (borrow.php) Styles */
            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
                margin: auto;
                margin-top: 50px;
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

            /* Return Confirmation Page (return.php) Styles */
            .confirmation-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
                text-align: center;
                margin: auto;
                margin-top: 50px;
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

            input:disabled {
                background-color: #e9ecef;
                color: #6c757d;
                cursor: not-allowed;
            }
        </style>

  </head>
  <body>