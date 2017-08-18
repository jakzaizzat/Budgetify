
<div class="columns balance">
    <div class="column is-half
    is-offset-one-quarter">
        <div class="balance_amount">
            RM<span id="balance"><?= $balance; ?></span>
            <span class="real-calc"></span>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column is-8">

        <div class="box">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th width="30%">Category</th>
                        <th width="30%">Dates</th>
                        <th width="30%">Amount</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody id="table_body">
                    
                    <!-- <?php foreach($transactions as $tran) : ?>
                    <tr class="budget-data">
                        <td>
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
                        </td>
                        <td>
                            <div class="data-dates has-text-centered">
                                <span><?php echo date('jS  F Y', strtotime($tran['created_at'])); ?></span>
                                <p><?php echo date('l', strtotime($tran['created_at'])); ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="data-transaction has-text-centered">
                                <?php if( $tran['transaction_flow'] == 'Expense') { ?>
                                    <span class="transaction-expenses">- <?php echo $tran['transaction_price']; ?> MYR</span>
                                    <p>Expense</p>
                                <?php } else { ?>
                                    <span class="transaction-income">+ <?php echo $tran['transaction_price']; ?> MYR</span>
                                    <p>Income</p>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?> -->

                
                </tbody>
            </table>
        </div>

    </div>

    <div class="column is-4">
        <div class="box">
            <form class="form" id="form" action="">
                <h3 class="has-text-centered">Add New Transactions</h3>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Transaction Name" name="transaction_detail">
                    </div>
                </div>
                    
                <div class="field">
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
                    <div class="control">
                        <input class="input" type="number" placeholder="Amount" name="amount">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select name="category_id">
                                <option value="1">Food</option>
                                <option value="2">Transportation</option>
                                <option value="3">Utilities</option>   
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button" onClick="save()" id="submit-btn">Submit</button>
                    </div>
                </div>

            </form>
            <!--<a href="#" class="button btn-transaction">Add Transaction</a>-->
        </div>
    </div>
</div>