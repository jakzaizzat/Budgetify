<h2><?= $title ?></h2>

<div class="columns is-mobile budget-title">
    <div class="column is-one-third">
        <h2>Category</h2>
    </div>
    <div class="column is-one-third">
        <h2>Dates</h2>
    </div>
    <div class="column is-one-third">
        <h2>Amounts</h2>
    </div>
</div>

<?php foreach($transactions as $tran) : ?>
<div class="columns is-mobile budget-data">
    <div class="column is-one-third">
        <div class="data-details">
            <span class="icon is-small text-right">
                <i class="em em-computer"></i>
            </span>
            <div class="details-name">
                <span><?php echo $tran['transaction_category']; ?></span>
                <p><a href="<?php echo base_url(); ?>transactions/<?php echo $tran['transaction_id']; ?>">
                    <?php echo $tran['transaction_name']; ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
    
    <div class="column is-one-third">
        <div class="data-dates has-text-centered">
            <span><?php echo date('jS  F Y', strtotime($tran['created_at'])); ?></span>
            <p><?php echo date('l', strtotime($tran['created_at'])); ?></p>
        </div>
    </div>
    <div class="column is-one-third">
        <div class="data-transaction has-text-centered">
            <span class="transaction-expenses">- <?php echo $tran['transaction_price']; ?> MYR</span>
            <p>Expenses</p>
        </div>
    </div>
</div>
<?php endforeach; ?>

<div class="has-text-centered">
    <a href="#" class="button btn-transaction">Add Transaction</a>
</div>