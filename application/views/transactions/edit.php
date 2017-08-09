<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('transactions/update'); ?>

    <input type="hidden" name="id" value="<?php echo $transaction['transaction_id']; ?>"/>

    <div class="field">
    <label class="label">Transactions Detail</label>
    <div class="control">
        <input class="input" type="text" placeholder="Details" name="transaction_detail" value="<?php echo $transaction['transaction_name']; ?>">
    </div>
    </div>


    <div class="field">
    <label class="label">Cash Flow</label>
    <div class="control">
        <div class="select">
        <select name="flow">
            <option <?php if($transaction['transaction_flow'] == 'Expenses') echo "selected" ?>>Expense</option>
            <option <?php if($transaction['transaction_flow'] == 'Income') echo "selected" ?>>Income</option>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Category</label>
    <div class="control">
        <div class="select">
        <select name="category">
            <option <?php if($transaction['transaction_category'] == 'Food') echo "selected" ?>>Food</option>
            <option <?php if($transaction['transaction_category'] == 'Transport') echo "selected" ?>>Transport</option>
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
              <input class="input" type="number" name="amount" value="<?php echo $transaction['transaction_price']; ?>">
            </p>
        </div>
        </div>
    </div>
    </div>


    <div class="field is-grouped">
    <div class="control">
        <button class="button is-primary">Update</button>
    </div>
    <div class="control">
        <button class="button is-link">Cancel</button>
    </div>
    </div>
</form>