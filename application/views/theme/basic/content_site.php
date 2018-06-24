 
  <!-- First Photo Grid-->
  <div class="w3-container w3-margin-bottom">
      <img src="https://unsplash.it/1000/300?image=<?php echo $pid ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <h3><b><?php echo $ptitle ?></b></h3>
        <p>
          <i class="fa fa-calendar"></i> <?php echo date('l, j F Y', strtotime($pdate)) ?> &nbsp; <i class="fa fa-user"></i> 
          <?php
            $author = $this->sites->postauthor($pauthor);
            if($author){
              echo $author->user_nicename;
            } else{
              echo "Tedir Ghazali";
            }
          ?>
        </p>
        <p><?php echo $pcontent ?></p>
        <p>
          <i class="fa fa-book"></i>
          <?php
          $postcat = $this->sites->postcategory($pid);
          if($postcat == true){
            foreach($postcat as $cat){
              echo $cat->name;
            }
          }
          ?> 
          &nbsp;
          <i class="fa fa-tags"></i>
          <?php
          $posttag = $this->sites->posttag($pid);
          if($posttag == true){
            foreach($posttag as $tag){
              echo $tag->name.', ';
            }
          }
          ?> 
        </p>
      </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <?php
    $postrel = $this->sites->postrelated();
    if($postrel == true){
        foreach($postrel as $row){
    ?>
    <a href="<?php echo base_url('blog/post/'.$row->post_name.'.html') ?>">
    <div class="w3-third w3-container w3-margin-bottom" style="height:450px;">
      <img src="https://unsplash.it/600/400?image=<?php echo $row->ID ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b><?php echo $row->post_title ?></b></p>
        <p><?php echo strip_tags(substr($row->post_content, 0, 350)) ?>...</p>
      </div>
    </div>
    </a>
    <?php
        }
    } else{

    }
    ?>
  </div>
