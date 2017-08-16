<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
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
    <div class="field">
        <label class="label">Retype Password</label>
        <div class="control">
            <input class="input" type="password" placeholder="re-enter your password" name="password2">
        </div>
    </div>

    <div class="control">
        <button class="button is-primary">Submit</button>
    </div>
<?php echo form_close(); ?>