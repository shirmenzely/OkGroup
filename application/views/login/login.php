            <label> 
                <p id="error"><?php
                    if (isset($error)) {
                        echo $error['message'];
                    }
                    ?>
                </p>
                <?php echo form_open('Login/auth'); ?>
                שם משתמש:<br><input type="email" id="user" name="user" placeholder="הכנס אימייל" autocomplete="on" size="20%" required > <br>
                סיסמא:<br><input type="password" id="password" name="password" placeholder="הכנס סיסמא" required > 
                <div >
                    <input class="button" id="submit" type="submit" value="התחבר" name="submit">
                    <input class="button" id="register" type="button" value="הירשם" name="register" onclick="window.location = '<?php echo site_url(); ?>/Login/register'"
                </div>
                </form>
            </label>