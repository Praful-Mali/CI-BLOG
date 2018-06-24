<form method="post">
    <input type="hidden" name="userid" value="<?php echo $userid ?>"/>
    <div class="w3-white w3-padding-top">
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Full Name</label>
            </div>
            <div class="w3-col m5">
                <input type="text" name="fullname" class="w3-input w3-border" value="<?php echo isset($usernicename)? $usernicename : ''; ?>" required/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Email</label>
            </div>
            <div class="w3-col m5">
                <input type="email" name="email" class="w3-input w3-border" value="<?php echo isset($useremail)? $useremail : ''; ?>" required/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Website</label>
            </div>
            <div class="w3-col m5">
                <input type="url" name="website" class="w3-input w3-border" value="<?php echo isset($userurl)? $userurl : ''; ?>"/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Display Name</label>
            </div>
            <div class="w3-col m5">
                <input type="text" name="displayname" class="w3-input w3-border" value="<?php echo isset($displayname)? $displayname : ''; ?>" required/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Username</label>
            </div>
            <div class="w3-col m5">
                <input type="text" name="username" class="w3-input w3-border" value="<?php echo isset($userlogin)? $userlogin : ''; ?>" required/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <div class="w3-row-padding w3-padding-top">
            <div class="w3-col m2">
                <label>Password</label>
            </div>
            <div class="w3-col m5">
                <input type="password" name="password" class="w3-input w3-border" value=""/>
            </div>
            <div class="w3-col m5">
                &nbsp;
            </div>
        </div>
        <p class="w3-padding">
            <a href="<?php echo site_url('user') ?>" class="w3-bar-item w3-button w3-light-grey"><span class="oi" data-glyph="chevron-left"></span> Back</a>
            <?php
            if($edit == 'edit'){
            ?>
            <button type="submit" name="update" formaction="<?php echo site_url('user/update') ?>" class="w3-bar-item w3-button w3-yellow"><span class="oi" data-glyph="save"></span> Update</button>
            <?php
            } else{
            ?>
            <button type="submit" name="publish" formaction="<?php echo site_url('user/save') ?>" class="w3-bar-item w3-button w3-light-blue"><span class="oi" data-glyph="save"></span> Save</button>
            <?php
            }
            ?>
        </p>
    </div>
</form>
<script>
    $('.w3te').w3te();
    $('[name=tags]').tagify().on('add', function(e, tagName){
        console.log('added', tagName)
    });
</script>