<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('transactions/create'); ?>
    <div class="field">
    <label class="label">Transactions Detail</label>
    <div class="control">
        <input class="input" type="text" placeholder="Details" name="transaction_detail">
    </div>
    </div>


    <div class="field">
    <label class="label">Cash Flow</label>
    <div class="control">
        <div class="select">
        <select name="flow">
            <option>Expense</option>
            <option>Income</option>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Category</label>
    <div class="control">
        <div class="select">
        <select name="category">
            <option>Food</option>
            <option>Transport</option>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
        <label class="label">Amount</label>
    <div class="field-label"></div>
    <div class="field-body">
        <div class="field is-expanded">
        <div class="field has-addons">
            <p class="control">
            <a class="button is-static">
                RM
            </a>
            </p>
            <p class="control is-expanded">
            <input class="input" type="number" name="amount">
            </p>
        </div>
        </div>
    </div>
    </div>


    <div class="field is-grouped">
    <div class="control">
        <button class="button is-primary">Submit</button>
    </div>
    <div class="control">
        <button class="button is-link">Cancel</button>
    </div>
    </div>
</form>