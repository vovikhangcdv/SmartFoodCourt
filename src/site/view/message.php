<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
<head>
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  background: #FFFFF0;
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"

</head>
<body>
<div class="container">
<h3 class=" text-center"><?= $title ?></h3>
<div class="messaging">
    <form action="../index.php" method="GET" id='read_message'>
        <input type='text' style='display:none' name='c' value='message'>
        <input type='text' style='display:none' name='id' id='id'>
    </form>
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Contacts</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">

            <?php foreach($list as $user_id=>$data): ?>
            <div type='button' class="chat_list <?= ($user_id == $chose_user['id'])?'active_chat':''; ?>" onclick="submit_form('read_message','id',<?= $user_id ?>)">
              <div class="chat_people">
                <div class="chat_img"> <img src="assets/img/avatars/<?= $user_id%8 +1?>.jpg" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5><?= htmlentities($data['fullname'], ENT_QUOTES, "UTF-8") ?><span class="chat_date"><?= date('M j',$data['message'][0]['timestamp'])?></span></h5>
                  <p><?= htmlentities($data['message'][count($data['message'])-1]['message'], ENT_QUOTES, "UTF-8") ?></p>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            
          </div>
        </div>
        <div class="mesgs" >
          <div class="msg_history" id='messageBody'>

            <?php foreach($list[$chose_user['id']]['message'] as $message): ?>
                <?php if($current_user['id'] == $message['receiver_id']): ?>
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="assets/img/avatars/<?= $message['receiver_id']%8 +1?>.jpg" alt="sunil"> </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                    <p><?= htmlentities($message['message'], ENT_QUOTES, "UTF-8") ?></p>
                    <span class="time_date"> <?= date('g:i a',$message['timestamp'])?>    |    <?= date('M j',$message['timestamp'])?></span></div>
                </div>
                </div>
                <?php else: ?>
                <div class="outgoing_msg">
                <div class="sent_msg">
                    <p><?= htmlentities($message['message'], ENT_QUOTES, "UTF-8") ?></p>
                    <span class="time_date"> <?= date('g:i a',$message['timestamp'])?>    |    <?= date('M j',$message['timestamp'])?></span> </div>
                </div>
                <?php endif;?>
            <?php endforeach;?>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
            <form action="../index.php?c=message&a=send&id=<?= $chose_user['id'] ?>" method="POST">
              <input type='text' name='receiver_id' style="display:none" value="<?= $chose_user['id'] ?>">
              <input type="text" class="write_msg" placeholder="Type a message" name='message' />
              <button class="msg_send_btn float-right " type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
            </form>
            <br>
            </div>
          </div>
        </div>
        <br>
      </div>
      
      <br>      
    </div></div>
    </body>
    <script>
    var messageBody = document.querySelector('#messageBody');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    </script>
    </html>