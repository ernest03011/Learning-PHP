<?php 

declare(strict_types=1);

$filePath = FILES_PATH . 'borrowed_books.csv';

returnABook($title, $filePath);

header("Location: /");
exit;

