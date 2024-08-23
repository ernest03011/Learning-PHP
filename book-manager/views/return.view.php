<?php require VIEWS_PATH . 'partials/head.php'; ?>

    <div class="confirmation-container">
        <h2>Return Confirmation</h2>
        <p>Are you sure you want to mark the following book as returned?</p>
        <div class="details">
            <p><strong>Book Title:</strong> <?= $title ?></p>
        </div>
        <div class="buttons">
            <form action="/return" method="post" style="width: 48%;">
                <input type="hidden" name="title" value="<?= $title ?>">
                <button type="submit">Confirm Return</button>
            </form>
            <a href="/index">Cancel</a>
        </div>
    </div>

    
<?php require VIEWS_PATH . 'partials/footer.php'; ?>
