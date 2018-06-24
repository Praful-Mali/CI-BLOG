<form method="post">
<div class="w3-bar w3-margin-top w3-margin-bottom">
    <a href="<?php echo site_url('user/adduser') ?>" class="w3-bar-item w3-button w3-light-blue"><span class="oi" data-glyph="plus"></span> New</a>
    <!--<div class="w3-dropdown-hover">
        <button class="w3-button"><span class="oi" data-glyph="paperclip"></span> Change role to..</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <button type="submit" formaction="" class="w3-bar-item w3-button">Administrator</button>
            <button type="submit" formaction="" class="w3-bar-item w3-button">Editor</button>
            <button type="submit" formaction="" class="w3-bar-item w3-button">Author</button>
            <button type="submit" formaction="" class="w3-bar-item w3-button">Contributor</button>
            <button type="submit" formaction="" class="w3-bar-item w3-button">Subscriber</button>
        </div>
    </div>-->
    <div class="w3-dropdown-hover">
        <button class="w3-button"><span class="oi" data-glyph="trash"></span> Bulk Actions</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <button type="submit" formaction="<?php echo site_url('user/todelete/'); ?>" class="w3-bar-item w3-button">Delete Permanently</button>
        </div>
    </div>
</div>

<div class="w3-container w3-white w3-padding-top">
    <!--<p>
        <a href="<?php echo site_url('user') ?>" style="text-decoration:none;">All (<?php echo $status1; ?>)</a> | 
        <a href="<?php echo site_url('user/status/0') ?>" style="text-decoration:none;">Administrator (<?php echo $status2; ?>)</a> | 
        <a href="<?php echo site_url('user/status/1') ?>" style="text-decoration:none;">Editor (<?php echo $status3; ?>)</a> | 
        <a href="<?php echo site_url('user/status/2') ?>" style="text-decoration:none;">Author (<?php echo $status4; ?>)</a> | 
        <a href="<?php echo site_url('user/status/3') ?>" style="text-decoration:none;">Contributor (<?php echo $status5 ?>)</a> | 
        <a href="<?php echo site_url('user/status/4') ?>" style="text-decoration:none;">Subscriber (<?php echo $status6 ?>)</a> 
    </p>-->
    <table id="datatable" class="w3-table w3-border w3-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"></th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th width="120">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($query == true){
                    foreach($query as $row){
            ?>
            <tr>
                <td><input type="checkbox" name="checkid[]" value="<?php echo $row->ID ?>" class="selectbox" id="select_<?php echo $row->ID ?>"/></td>
                <td><b><?php echo $row->user_login ?></b></td>
                <td><?php echo $row->user_nicename ?></td>
                <td><?php echo $row->user_email ?></td>
                <td>
                    <a href="<?php echo site_url('user/edit/'.$row->ID); ?>" class="w3-button w3-orange"><span class="oi" data-glyph="pencil"></span></a>
                    <a href="<?php echo site_url('user/delete/'.$row->ID); ?>" class="w3-button w3-red"><span class="oi" data-glyph="trash"></span></a>
                </td>
            </tr>
            <?php
                    }
                } else{

                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th><input type="checkbox" class="selectall2"></th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
</form>
<script>
$('.selectall').click(function() {
    $(".selectbox").prop('checked', $(this).prop("checked"));
    $(".selectall2").prop("checked", $(this).prop("checked"));
});
$('.selectall2').click(function() {
    $(".selectbox").prop('checked', $(this).prop("checked"));
    $(".selectall").prop("checked", $(this).prop("checked"));
});
$('.selectbox').change(function() {
    var totalCheckboxes = $('.selectbox').length;
    var numberOfChecked = $('.selectbox:checked').length;
    if(totalCheckboxes == numberOfChecked){
        $(".selectall").prop('checked', true);
        $(".selectall2").prop("checked", true);
    } else{
        $(".selectall").prop('checked', false);
        $(".selectall2").prop("checked", false);
    }
});
</script>