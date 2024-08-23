<?php require VIEWS_PATH . 'partials/head.php'; ?>

    <div class="form-container">
        <h2>Borrow Book</h2>

        <?php if(isset($_GET['error']) ) : ?>
            <p>Try again! <span style="color:red;"><?=$_GET['error'] ?></span></p>
        <?php endif; ?>

        <form action="/borrow" method="POST">
            <label for="borrower_name">Borrower Name:</label>
            <input type="text" id="borrower_name" name="borrower_name" required>

            <label for="borrow_date">Borrow Date:<span style="color:red;"> (readonly)</span></label>
            <input type="date" id="borrow_date" name="borrow_date" style="color:gray;" value="<?php echo date('Y-m-d'); ?>" readonly>

            
            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>
            
            <input type="hidden" id="book_name" name="book_name" value="<?= $title ?? "" ?>" >
            
            <div class="buttons">
                <button type="submit">Submit</button>
                <a href="/index">Cancel</a>
            </div>
        </form>
    </div>


<?php require VIEWS_PATH . 'partials/footer.php'; ?>
