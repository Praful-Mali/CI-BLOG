<form method="post">
    <div class="w3-bar w3-margin-top w3-margin-bottom">
        <a href="<?php echo site_url() ?>" class="w3-bar-item w3-button w3-light-grey"><span class="oi" data-glyph="chevron-left"></span> Back</a>
        <!--<button type="submit" formaction="" class="w3-bar-item w3-button w3-grey"><span class="oi" data-glyph="save"></span> Save Draft</button>-->
        <?php
        if($edit == 'edit'){
        ?>
        <button type="submit" name="update" formaction="<?php echo site_url('post/update') ?>" class="w3-bar-item w3-button w3-yellow"><span class="oi" data-glyph="save"></span> Update</button>
        <?php
        } else{
        ?>
        <button type="submit" name="publish" formaction="<?php echo site_url('post/publish') ?>" class="w3-bar-item w3-button w3-light-blue"><span class="oi" data-glyph="save"></span> Publish</button>
        <?php
        }
        ?>
    </div>

    <input type="hidden" name="postid" value="<?php echo $postid ?>"/>
    <input type="hidden" name="termid" value="<?php echo $termid ?>"/>
    <input type="hidden" name="taxid" value="<?php echo $taxid ?>"/>
    <input type="hidden" name="relid" value="<?php echo $relid ?>"/>
    <input type="hidden" name="terms" value="<?php 
                        $tag = $this->posting->postTag($postid);
                        if($tag){
                            foreach($tag as $row3){
                                echo $row3->term_id. ',';
                            } 
                        }
                    ?>"/>
    <input type="hidden" name="termtax" value="<?php 
                        $tag = $this->posting->postTag($postid);
                        if($tag){
                            foreach($tag as $row3){
                                echo $row3->term_taxonomy_id. ',';
                            } 
                        }
                    ?>"/>
    <input type="hidden" name="termcat" value="<?php 
                        $cat2 = $this->posting->postCategories($postid);
                        if($cat2){
                            foreach($cat2 as $row3){
                                echo $row3->term_id. ',';
                            } 
                        }
                    ?>"/>

    <div class="w3-white w3-padding-top">
        <div class="w3-row-padding">
            <div class="w3-col m8">
                <p>
                    <label>Title</label>
                    <input type="text" name="title" class="w3-input w3-border" value="<?php echo isset($posttitle)? $posttitle : ''; ?>"/>
                </p>
                <p>
                    <textarea name="content" class="w3-input w3-border w3te" rows="20"><?php echo isset($postcontent)? $postcontent : ''; ?></textarea>
                </p>
            </div>
            <div class="w3-col m4">
                <p>
                    <label>Status</label>
                    <select name="status" class="w3-select w3-border">
                        <option value="<?php echo isset($poststatus)? $poststatus : 'publish'; ?>"><?php echo isset($poststatus)? $poststatus : '- Select Status -'; ?></option>
                        <option value="publish">Publish</option>
                        <option value="pending">Pending</option>
                        <option value="draft">Draft</option>
                    </select>
                </p>
                <p>
                    <label>Category</label>
                    <select name="category" class="w3-select w3-border">
                        <?php 
                        $category = $this->posting->postCategory($postid);
                        if($category){
                            foreach($category as $row2){
                                ?>
                                <option value="<?php echo $row2->term_id; ?>"><?php echo $row2->name; ?></option>
                                <?php
                            } 
                        } else{
                            ?>
                            <option value="1">- Select Category -</option>
                            <?php
                        }
                        ?>
                        <?php
                        $categories = $this->posting->postCategories();
                        if($categories == true){
                            foreach($categories as $cat){
                        ?>
                        <option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
                        <?php
                            }
                        }
                        ?>
                        </div>
                    </select>
                </p>
                <p>
                    <label>Tags</label>
                    <textarea name="tags">
                    <?php 
                        $tag = $this->posting->postTag($postid);
                        if($tag){
                            foreach($tag as $row3){
                                echo $row3->name. ',';
                            } 
                        }
                    ?>
                    </textarea>
                </p>
            </div>
        </div>
    </div>
</form>
<script>
    $('.w3te').w3te();
    $('[name=tags]').tagify().on('add', function(e, tagName){
        console.log('added', tagName)
    });
</script>