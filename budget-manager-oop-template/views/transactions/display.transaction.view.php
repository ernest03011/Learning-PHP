<?php

use App\Utilities;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transaction Details</title>
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
            }

            h2 {
                text-align: center;
                color: #333;
            }

            .transaction-detail {
                margin-bottom: 20px;
            }

            .transaction-detail th {
                text-align: left;
                padding-right: 20px;
                font-weight: normal;
            }

            .buttons {
                text-align: center;
                margin-top: 20px;
            }

            .buttons button {
                padding: 10px 20px;
                margin: 5px;
                font-size: 16px;
                cursor: not-allowed; /* for disabled buttons */
                background-color: #ccc;
                border: none;
                color: white;
            }

            .buttons button.active {
                cursor: pointer;
                background-color: #4CAF50;
            }

            .buttons a {
                text-decoration: none;
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Transaction Details</h2>

            <!-- Display transaction details in a table -->
            <table class="transaction-detail">
                <tr>
                    <th>Date:</th>
                    <td>
                        <?= htmlspecialchars(Utilities::formatDateOrdinary($transaction['transaction_date'])); ?>
                    </td>
                </tr>
                <tr>
                    <th>Check #:</th>
                    <td>
                        <?= htmlspecialchars(empty($transaction['check_number']) ? '---' : $transaction['check_number']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td><?= htmlspecialchars($transaction['description']); ?></td>
                </tr>
                <tr>
                    <th>Amount:</th>
                    <td style="color:<?= Utilities::getColorForTransactionType($transaction['transaction_type']) ?>">
                        <?= htmlspecialchars(Utilities::formatDollarAmount((float) $transaction['amount'], $transaction['transaction_type'])); ?>
                    </td>
                </tr>
            </table>

            <!-- Action buttons -->
            <div class="buttons">
                <button class="disabled" disabled>Edit</button>
                <button class="disabled" disabled>Delete</button>
                <a href="/">Go back to Homepage</a>
            </div>
        </div>
    </body>
</html>
