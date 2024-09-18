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
                        <td><?= htmlspecialchars($transaction['transaction_date']) ?></td>
                        <td><?= htmlspecialchars($transaction['check_number'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($transaction['description']) ?></td>
                        <td><?= htmlspecialchars($transaction['amount']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><!-- TODO: Calculate total income --></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><!-- TODO: Calculate total expense --></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><!-- TODO: Calculate net total --></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
