<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Journal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Journal Entries</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Currency Pair</th>
                <th>Amount</th>
                <th>Action</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Fetch entries from the database
                include 'process.php';
                $entries = fetchEntries();
                foreach ($entries as $entry) {
                    echo "<tr>
                            <td>{$entry['date']}</td>
                            <td>{$entry['currency_pair']}</td>
                            <td>{$entry['amount']}</td>
                            <td>{$entry['action']}</td>
                            <td>{$entry['comment']}</td>
                          </tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="index.html">back</a>

</body>
</html>