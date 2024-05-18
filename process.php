<?php
$dsn = 'sqlite:table.db';

// function initializeDatabase() {
//     global $dsn;
//     $db = new PDO($dsn);
//     $db->exec("CREATE TABLE IF NOT EXISTS journal (
//         id INTEGER PRIMARY KEY AUTOINCREMENT,
//         date TEXT,
//         currency_pair TEXT,
//         amount REAL,
//         action TEXT,
//         comment TEXT
//     )");
// }
// initializeDatabase();

function addEntry($date, $currency_pair, $amount, $action, $comment) {
    global $dsn;
    $db = new PDO($dsn);
    $stmt = $db->prepare("INSERT INTO journal (date, currency_pair, amount, action, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$date, $currency_pair, $amount, $action, $comment]);
}

function fetchEntries() {
    global $dsn;
    $db = new PDO($dsn);
    $result = $db->query("SELECT * FROM journal ORDER BY date DESC");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $currency_pair = $_POST['currency_pair'];
    $amount = $_POST['amount'];
    $action = $_POST['action'];
    $comment = $_POST['comment'];

    addEntry($date, $currency_pair, $amount, $action, $comment);

    // Redirect to the same page to display the new entry
    header('Location: table.php');
    exit;
}
?>
