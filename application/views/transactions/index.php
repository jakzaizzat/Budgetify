
<div class="columns balance">
    <div class="column is-half
    is-offset-one-quarter">
        <div class="balance_amount">
            <span>RM</span><?= $balance; ?>
            <span class="real-calc"> + 10.00</span>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column is-8">
            <div class="box">
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
                                        <img src="<?php echo base_url(); ?>/assets/img/pizza.svg"/>
                                    </span>
                                    <div class="details-name">
                                        <span><?php echo $category_names[$tran['transaction_id']]['category_name']; ?></span>
                                        <p>
                                        <a href="<?php echo base_url(); ?>transactions/<?php echo $tran['transaction_id']; ?>">
                    <?php echo  $tran['transaction_name']; ?>
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
                            <?php if( $tran['transaction_flow'] == 'Expense') { ?>
                                <span class="transaction-expenses">- <?php echo $tran['transaction_price']; ?> MYR</span>
                                <p>Expense</p>
                            <?php } else { ?>
                                <span class="transaction-income">+ <?php echo $tran['transaction_price']; ?> MYR</span>
                                <p>Income</p>
                            <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

    </div>

    <div class="column is-4">
        <div class="box">
            <form class="form">
                <h3 class="has-text-centered">Add New Transactions</h3>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Transaction Name">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="input" type="number" placeholder="Amount">
                    </div>
                </div>
                    
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Expense</option>
                                <option>Income</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Food</option>
                                <option>Transportation</option>
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button">Submit</button>
                    </div>
                </div>

            </form>
            <!--<a href="#" class="button btn-transaction">Add Transaction</a>-->
        </div>
    </div>
</div>