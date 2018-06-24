<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function index(){
        $post = $this->uri->segment(3);
        $datas = $this->comments->viewData($post);
        if($datas){
            foreach($datas as $row){
                $datareply = $this->comments->viewDataReply($row->comment_ID);
            ?>
            <li class="w3-bar">
                <?php
                if($datareply == false){
                ?>
                <a onclick="deleteData(<?php echo $row->comment_ID; ?>)" class="w3-bar-item w3-button w3-red w3-large w3-right"><i class="fa fa-trash"></i></a>
                <?php
                }
                ?>
                <a onclick="editData(<?php echo $row->comment_ID; ?>)" class="w3-bar-item w3-button w3-orange w3-large w3-right"><i class="fa fa-edit"></i></a>
                <a onclick="viewReply(<?php echo $row->comment_ID; ?>)" class="w3-bar-item w3-button w3-teal w3-large w3-right"><i class="fa fa-reply"></i></a>
                <img src="https://unsplash.it/150/150?image=<?php echo $row->comment_ID ?>" class="w3-bar-item w3-circle" style="width:85px">
                <div class="w3-bar-item">
                    <span class="w3-large"><?php echo $row->comment_author ?></span><br>
                    <span id="comment-<?php echo $row->comment_ID; ?>"><?php echo $row->comment_content ?></span>
                </div>
                <br/>
                <?php
                if($datareply){
                ?>
                <ul class="w3-ul">
                    <?php
                    foreach($datareply as $rowreply){
                    ?>
                    <li class="w3-bar" style="padding:0 0 0 80px;margin:0;border:none;">
                        <a onclick="deleteData(<?php echo $rowreply->comment_ID; ?>)" class="w3-bar-item w3-button w3-deep-orange w3-right"><i class="fa fa-trash"></i></a>
                        <img src="https://www.w3schools.com/w3css/img_avatar2.png" class="w3-bar-item w3-circle" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large"><?php echo $rowreply->comment_author ?></span><br>
                            <span><?php echo $rowreply->comment_content ?></span>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                }
                ?>
                <br/>
                <div id="viewreply-<?php echo $row->comment_ID; ?>" style="margin-top:0;"></div>
            </li>
            <?php
            }
        }
    }
    
    public function save(){
        $this->comments->saveData();
    }
     
    public function reply(){
        $this->comments->saveReplay();
    }
     
    public function update(){
        $this->comments->updateData();
    }
     
    public function trash(){
        $this->comments->deleteData();
    }
}