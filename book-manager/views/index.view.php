<?php require VIEWS_PATH . 'partials/head.php'; ?>

    <h1>Library Books</h1>

    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Status</th>
                <th>Borrower Name</th>
                <th>Request Date</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 

            <?php if(! empty($books_to_display)) : ?>
                <?php foreach($books_to_display as $book) : ?>
                    <tr>
                        <td><?= $book['title'] ?></td>
                        <td style="color:<?= $book['is_borrowed'] ? 'red' : 'green' ?>;"><?= $book['is_borrowed'] ? 'Not Available' : 'Available' ?></td>
                        <td class=""><?= $book['is_borrowed'] ? $book['borrower_name'] : 'N/A' ?></td>
                        <td class=""><?= $book['is_borrowed'] ? $book['request_date'] : 'N/A' ?></td>
                        <td class=""><?= $book['is_borrowed'] ? $book['due_date'] : 'N/A' ?></td>
                        <?php if(! $book['is_borrowed']) : ?>
                        <td><a href="borrow?title=<?= trim($book['title']) ?>" class="button-link">Borrow</a></td>
                        <?php else : ?>
                        <td><a href="return?title=<?= trim($book['title']) ?>" class="button-link-return">Return</a></td>
                        <?php endif ?>
                    
                    </tr>
                <?php endforeach ?>

            <?php endif ?>

        </tbody>
    </table>


<?php require VIEWS_PATH . 'partials/footer.php'; ?>

