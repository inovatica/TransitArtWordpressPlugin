<div class="container-transit">
    <div class="page-header">
        <a class="logo" href="http://transitart.io" target="_blank"></a>
    </div>
    <div class="title"><h1><?php echo _e("Transitart plugin information", "transitart"); ?></h1>
        <h3><?php echo _e("How to use", "transitart"); ?> ?</h3>
        <p>
            <?php echo _e("Choise options from the generator.", "transitart"); ?><br>
            <?php echo _e("Copy and paste to the template or post generated shortcode.", "transitart"); ?>
        </p>
    </div>
    <div class="generator">
        <div class="container-box">
            <label for="demo"><?php echo _e("Demo city", "transitart"); ?>:</label>
            <select id="demo" name="demo" class="element">
                <option value="auckland">Auckland</option>
                <option value="budapeszt">Budapest</option>
                <option value="chicago">Chicago</option>
                <option value="lodz">Lodz</option>
                <option value="sanfrancisco">San Francisco</option>
                <option value="toronto">Toronto</option>
                <option value="vancouver">Vancouver</option>
                <option value="warszawa">Warsaw</option>
            </select>
        </div>
        <div class="container-box">
            <label for="type"><?php echo _e("Type", "transitart"); ?>:</label>
            <select id="type" name="type" class="element">
                <option value="r"><?php echo _e("Timetables", "transitart"); ?></option>
                <option value="t"><?php echo _e("Journey planner with timetables", "transitart"); ?></option>
            </select>
        </div>


        <div class="container-box">
            <input type="button" id="generate" name="generate" value="<?php echo _e("Generate", "transitart"); ?>"/>
        </div>



        <div class="container-box">
            <div class="generate-result">
                <style scoped>
                #result { visibility: hidden; }
                </style>
                <div class="result"><input type="text" id="result" size="50"></div>
            </div>
        </div>


        <div class="container-box">
        <?php
         if( isset($_POST['update-options'])){
            if($_POST['poweredby'] == 'on'){
                update_option('ta_show_credits', '1');
            } else {
                update_option('ta_show_credits', '0');
            }
         }

        ?>
            <?php $ta_show_credits = get_option( 'ta_show_credits', '0' );?>
            <form  method="POST">
            <label for="poweredby">
                <input name="poweredby" id="poweredby" type="checkbox" <?php if($ta_show_credits != 0) { echo 'checked'; } ?>>Show <strong>"Powered by transitart.io"</strong> below timetables
            </label>
            <input type="hidden" name="update-options" value="true">
            <button type="submit" >Save</button>
            </form>
        </div>
        <br><br>



    </div>
     <div class="page-footer">
         <a href="http://transitart.io" target="_blank"><strong><?php echo _e("Contact us to publish own timetables data", "transitart"); ?>.</strong></a>
    </div>
</div>