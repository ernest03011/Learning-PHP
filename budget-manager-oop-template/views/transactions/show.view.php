<?php

use App\Utilities;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
      
      <h1>Show all Transactions!</h1>
        
        <p><a href="/">Go back to the Homepage!</a></p>
        
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td>
                            <?= 
                                htmlspecialchars(
                                    Utilities::formatDateOrdinary($transaction['transaction_date'])
                                );
                            ?>
                        </td>
                        <td>
                            <?= 
                                htmlspecialchars(
                                    empty($transaction['check_number']) ? "---"  : $transaction['check_number']
                                ); 
                            ?>
                        </td>
                        <td><?= htmlspecialchars($transaction['description']); ?></td>
                        <td>
                            <span style="color:<?= Utilities::getColorForTransactionType($transaction['transaction_type']) ?>">
                                <?= 

                                    htmlspecialchars(
                                        Utilities::formatDollarAmount( 
                                            (float) $transaction['amount'],
                                            $transaction['transaction_type']
                                        )
                                    ); 
                                ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= $totals['totalIncome'] ?? 0; ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= $totals['totalExpense'] ?? 0; ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= $totals['netTotal'] ?? 0; ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
