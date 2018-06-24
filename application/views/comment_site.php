<div class="w3-container w3-margin-bottom">
    <div class="w3-container w3-white w3-padding-16">
        <form>
            <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>"/>
            <input type="hidden" name="uid" id="uid" value=""/>
            <input type="hidden" name="ip" id="ip"/>
            <p>
                <input type="text" id="name" class="w3-input w3-border" placeholder="Your Name"/>
            </p>
            <p>
                <input type="email" id="email" class="w3-input w3-border" placeholder="Your Email"/>
            </p>
            <p>
                <input type="url" id="website" class="w3-input w3-border" placeholder="Your URL Website"/>
            </p>
            <p>
                <textarea id="content" class="w3-input w3-border" rows="10" placeholder="Your Comment Message"></textarea>
            </p>
            <p>
                <button type="button" onclick="addData()" class="w3-button w3-blue">Post Comment</button>
            </p>
        </form>
        <ul class="w3-ul w3-border" id="allcomment"></ul>
        <script src="<?php echo base_url('asset/js/jquery.min.js') ?>"></script>
        <script>
            function viewData(){
                $.get("<?php echo base_url('comment/index/'.$pid) ?>", function(data) {
                    $('#allcomment').html(data);
                })
            }
            viewData();
            function addData(){
                var postid = $('#pid').val();
                var userid = $('#uid').val();
                var ip = $('#ip').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var website = $('#website').val();
                var content = $('#content').val();
                $.post("<?php echo base_url('comment/save') ?>", { pid:postid, uid:userid, ip:ip, name:name, email:email, website:website, content:content }, function(data) {
                    viewData();
                    clearData();
                })
            }
            function editData(id){
                var comment = $('#comment-'+id).text();
                $('.w3-bar-item span#comment-'+id).replaceWith('<form id="comment2-'+id+'"><textarea id="ccontent-'+id+'" class="w3-input w3-border" style="width:600px">'+comment+'</textarea><br/><button onclick="updateData('+id+')" type="button" class="w3-button w3-orange">Update</button><button type="button" onclick="hideEditData('+id+')" class="w3-button w3-grey">Cancel</button></form>');
            }
            function hideEditData(id){
                var comment2 = $('#ccontent-'+id).val();
                $('.w3-bar-item form#comment2-'+id).replaceWith('<span id="comment-'+id+'">'+comment2+'</span>');
            }
            function updateData(id){
                var content = $('#ccontent-'+id).val();
                $.post("<?php echo base_url('comment/update') ?>", { id:id, content:content }, function(data) {
                    viewData();
                    hideEditData(id);
                })
            }
            function deleteData(id){
                $.post("<?php echo base_url('comment/trash') ?>", { id:id }, function(data) {
                    viewData();
                })
            }
            function clearData(){
                $('#name').val('');
                $('#email').val('');
                $('#website').val('');
                $('#content').val('');
            }
            function viewReply(id){
                $('#viewreply-'+id).show();
                $('#viewreply-'+id).html('<form style="padding:0 0 0 80px;margin-top:15px;"><input type="hidden" id="parentid-'+id+'" value="'+id+'"><textarea id="replycontent-'+id+'" class="w3-input w3-border" style="width:728px"></textarea><br/><button type="button" onclick="addReply('+id+')" class="w3-button w3-blue">Reply</button><button type="button" onclick="hideReply('+id+')" class="w3-button w3-grey">Cancel</button></form>');
            }
            function hideReply(id){
                $('#viewreply-'+id).hide();
            }
            function addReply(id){
                var postid = "<?php echo $pid; ?>";
                var userid = "1";
                var ip = $('#ip').val();
                var name = "Tedir Ghazali";
                var email = "myteukughazali@gmail.com";
                var website = "http://kautube.com";
                var content = $('#replycontent-'+id).val();
                var parent = $('#parentid-'+id).val();
                $.post("<?php echo base_url('comment/reply') ?>", { parentid:parent, pid:postid, uid:userid, ip:ip, name:name, email:email, website:website, content:content }, function(data) {
                    viewData();
                    viewReply(id);
                })
            }
        </script>
        <script>
            function getUserIP(onNewIP) {
                var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
                var pc = new myPeerConnection({
                    iceServers: []
                }),
                noop = function() {},
                localIPs = {},
                ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
                key;

                function iterateIP(ip) {
                    if (!localIPs[ip]) onNewIP(ip);
                    localIPs[ip] = true;
                }

                pc.createDataChannel("");

                pc.createOffer(function(sdp) {
                    sdp.sdp.split('\n').forEach(function(line) {
                        if (line.indexOf('candidate') < 0) return;
                        line.match(ipRegex).forEach(iterateIP);
                    });
                    
                    pc.setLocalDescription(sdp, noop, noop);
                }, noop); 

                pc.onicecandidate = function(ice) {
                    if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
                    ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
                };
            }

            getUserIP(function(ip){
                document.getElementById("ip").value = ip;
            });
        </script>
    </div>
</div>