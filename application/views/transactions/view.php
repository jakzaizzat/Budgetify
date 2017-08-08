<h2><?php echo $transaction['transaction_id']; ?></h2>

<div>
    <p>
        <?php echo $transaction['transaction_name']; ?>
    </p>
    <p>RM
        <?php echo $transaction['transaction_price']; ?>
    </p>

    <?php echo form_open('/transactions/delete/'.$transaction['transaction_id']); ?>
        <button type="submit" class="button is-danger">
            <i class="em em-wave"></i> Delete
        </button>
    </form>
</div>