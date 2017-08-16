<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>
    <div class="field">
        <label class="label">Username</label>
        <div class="control">
            <input class="input" type="text" placeholder="Your Username" name="username">
        </div>
    </div>
    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input" type="password" placeholder="Your Password" name="password">
        </div>
    </div>
    <div class="control">
        <button class="button is-primary">Submit</button>
    </div>
<?php echo form_close(); ?>