<?php

include 'bot.php';
//-------------------------------------------
$send = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM sendall"));
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//-------------------------------------------
if($send['step'] == 'send'){
$alluser = mysqli_num_rows(mysqli_query($db,"select id from user"));
$users = mysqli_query($db,"SELECT id FROM user LIMIT 100 OFFSET {$send['user']}");
if($send['chat'] == false){
while($row = mysqli_fetch_assoc($users))
     bot('sendmessage',[
        'chat_id'=>$row['id'],        
		'text'=>$send['text'],
        ]);	
}else{
while($row = mysqli_fetch_assoc($users))
  bot('sendphoto',[
	'chat_id'=>$row['id'],
	'photo'=>$send['chat'],
	'caption'=>$send['text'],
 ]);
}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
$db->query("UPDATE sendall SET user = user + 100 ");
if($send['user'] + 100 >= $alluser){
    bot('sendmessage', [
      'chat_id' => $sudo[0],
      'text' => "📍 پیام برای همه کابران ارسال شد",
    ]);
$db->query("UPDATE sendall SET step = 'none' , text = '' , user = '0' , chat = '' ");	
}
}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//-------------------------------------------
elseif($send['step'] == 'forward'){
$alluser = mysqli_num_rows(mysqli_query($db,"select id from `user`"));
$users = mysqli_query($db,"SELECT id FROM `user` LIMIT 100 OFFSET {$send['user']}");
while($row = mysqli_fetch_assoc($users))
bot('ForwardMessage',[
'chat_id'=>$row['id'],   
'from_chat_id'=>$send['chat'],
'message_id'=>$send['text'],
]);	
$db->query("UPDATE sendall SET user = user + 100 ");
if($send['user'] + 100 >= $alluser){
    bot('sendmessage', [
      'chat_id' => $sudo[0],
      'text' => "📍 پیام برای همه کابران فوروارد شد",
    ]);
$db->query("UPDATE sendall SET step = 'none' , text = '' , user = '0' , chat = '' LIMIT 1");		
}
}
//-------------------------------------------
?> 