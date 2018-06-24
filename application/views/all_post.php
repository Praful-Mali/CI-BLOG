<form method="post">
<div class="w3-bar w3-margin-top w3-margin-bottom">
    <a href="<?php echo site_url('post/add') ?>" class="w3-bar-item w3-button w3-light-blue"><span class="oi" data-glyph="plus"></span> New</a>
    <div class="w3-dropdown-hover">
        <button class="w3-button"><span class="oi" data-glyph="paperclip"></span> Filter Categories</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <?php
        $categories = $this->posting->postCategories();
        if($categories == true){
            foreach($categories as $cat){
        ?>
        <a href="<?php echo site_url('post/filter/category/'.$cat->term_id); ?>" class="w3-bar-item w3-button"><?php echo $cat->name ?></a>
        <?php
            }
        }
        ?>
        </div>
    </div>
    <!--<div class="w3-dropdown-hover">
        <button class="w3-button"><span class="oi" data-glyph="tags"></span> Filter Tags</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <?php
        /* $tags = $this->posting->postTags();
        if($tags == true){
            foreach($tags as $tag){ */
        ?>
        <a href="<?php // echo site_url('post/filter/tag/'.$tag->term_id); ?>" class="w3-bar-item w3-button"><?php // echo $tag->name ?></a>
        <?php
        /*    }
        } */
        ?>
        </div>
    </div>-->
    <div class="w3-dropdown-hover">
        <button class="w3-button"><span class="oi" data-glyph="calendar"></span> Filter Dates</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <?php
        $dates = $this->posting->postDates();
        if($dates == true){
            foreach($dates as $date){
        ?>
        <a href="<?php echo site_url('post/filter/date/'.$date->mno.'/'.$date->yr); ?>" class="w3-bar-item w3-button"><?php echo $date->mon ?> <?php echo $date->yr ?></a>
        <?php
            }
        }
        ?>
        </div>
    </div>
    <?php
    $trashpage = $this->uri->segment(3, 0);
    if($trashpage == "trash" && $trashpage != false){
    ?>
    <button type="submit" formaction="<?php echo site_url('post/todelete/'); ?>" id="deleteall" class="w3-bar-item w3-button w3-light-grey w3-right"><span class="oi" data-glyph="trash"></span> Delete Permanently</button>
    <button type="submit" formaction="<?php echo site_url('post/torestore/'); ?>" id="deleteall" class="w3-bar-item w3-button w3-light-grey w3-right"><span class="oi" data-glyph="loop-circular"></span> Restore</button>
    <?php
    } else{
    ?>
    <button type="submit" formaction="<?php echo site_url('post/totrash/'); ?>" id="deleteall" class="w3-bar-item w3-button w3-light-grey w3-right"><span class="oi" data-glyph="trash"></span> Move to Trash</button>
    <?php
    }
    ?>
</div>

<div class="w3-container w3-white w3-padding-top">
    <p>
        <a href="<?php echo site_url('post') ?>" style="text-decoration:none;">All (<?php echo $status1; ?>)</a> | 
        <a href="<?php echo site_url('post/status/publish') ?>" style="text-decoration:none;">Published (<?php echo $status2; ?>)</a> | 
        <a href="<?php echo site_url('post/status/draft') ?>" style="text-decoration:none;">Draft (<?php echo $status3; ?>)</a> | 
        <a href="<?php echo site_url('post/status/pending') ?>" style="text-decoration:none;">Pending (<?php echo $status4; ?>)</a> | 
        <a href="<?php echo site_url('post/status/trash') ?>" style="text-decoration:none;">Trash (<?php echo $status5 ?>)</a> 
    </p>
    <table id="datatable" class="w3-table w3-border w3-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"></th>
                <th>Title</th>
                <th width="120">Author</th>
                <th>Categories</th>
                <th>Tags</th>
                <th>Status &amp; Date</th>
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
                <td><b><?php echo $row->post_title ?></b></td>
                <td><?php echo isset($row->post_author)==1?"Tedir Ghazali":$row->post_author; ?></td>
                <td>
                <?php 
                    $category = $this->posting->postCategory($row->ID);
                    if($category){
                        foreach($category as $row2){
                            echo $row2->name. ' ';
                        } 
                    }
                ?>
                </td>
                <td>
                <?php 
                    $tag = $this->posting->postTag($row->ID);
                    if($tag){
                        foreach($tag as $row3){
                            echo $row3->name. ', ';
                        } 
                    }
                ?>
                </td>
                <td><b style="text-transform: capitalize;"><?php echo $row->post_status ?></b><br/><?php echo $row->post_date ?></td>
                <td>
                    <?php
                    if($trashpage == "trash" && $trashpage != false){
                    ?>
                    <a href="<?php echo site_url('post/recycle/restore/'.$row->ID); ?>" class="w3-button w3-green"><span class="oi" data-glyph="loop-circular"></span></a>
                    <a href="<?php echo site_url('post/delete/'.$row->ID); ?>" class="w3-button w3-pink"><span class="oi" data-glyph="trash"></span></a>
                    <?php
                    } else{
                    ?>
                    <a href="<?php echo site_url('post/edit/'.$row->ID); ?>" class="w3-button w3-orange"><span class="oi" data-glyph="pencil"></span></a>
                    <a href="<?php echo site_url('post/recycle/trash/'.$row->ID); ?>" class="w3-button w3-red"><span class="oi" data-glyph="trash"></span></a>
                    <?php
                    }
                    ?>
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
                <th>Title</th>
                <th>Author</th>
                <th>Categories</th>
                <th>Tags</th>
                <th>Status &amp; Date</th>
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