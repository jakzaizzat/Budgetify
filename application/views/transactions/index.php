
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
                        <div class="select">
                            <select name="category_id">
                                <?php foreach($categories as $cat) { ?>
                                    <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="input" type="number" placeholder="Amount" name="amount">
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