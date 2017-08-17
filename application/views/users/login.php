

<?php echo validation_errors(); ?>

<div class="columns">
    <div class="column is-half is-offset-one-quarter">
            <?php 
                $att = array('class' => 'form');
                echo form_open('users/login', $att); 
            ?>
                <h3 class="has-text-centered">Log In</h3>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Username" name="username"> 
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="input" type="password" placeholder="Password" name="password">
                    </div>
                </div>
                    
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button">Submit</button>
                    </div>
                </div>

            <?php echo form_close(); ?>
    </div>
</div>