<?php
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
ini_set('error_logs','off');
error_reporting(0);
ob_start("ob_gzhandler");
date_default_timezone_set("asia/tehran");
include "config.php"; 
define('API_KEY',$API_KEY);
//======= 𝓕𝓤𝓝𝓒𝓣𝓘𝓞𝓝 =========
//===== 𝓑𝓞𝓣 =======
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
//===== 𝓢𝓔𝓝𝓓𝓜𝓔𝓢𝓢𝓐𝓖𝓔 ======
function GetMe(){
  $get =  bot('GetMe',[]);
  return $get;
}
//===== 𝓢𝓔𝓝𝓓𝓜𝓔𝓢𝓢𝓐𝓖𝓔 ======
function SendMessage($chat_id, $text, $reply_to_message_id = null, $parse_mode, $reply_markup)
{
    bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'reply_to_message_id' => $reply_to_message_id,
        'parse_mode' => $parse_mode,
        'reply_markup' => $reply_markup,
        'disable_web_page_preview' => true,
    ]);
}
//===== objectToArrays ======

function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
//===== 𝓔𝓭𝓲𝓽𝓜𝓮𝓼𝓼𝓪𝓰𝓮 ======
function EditMessage($chat_id, $text, $message_id, $parse_mode, $reply_markup)
{
    bot('editmessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'reply_markup' => $reply_markup,
    ]);
}
$a4=rand(00,99);
function is_join($chat_id, $user_id)
{
    $content = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=" . $chat_id . "&user_id=" . $user_id));
    $status = $content->result->status;
    if ($status != "left") {
        return true;
    } else {
        return false;
    }
}
//===== 𝓢𝓔𝓐𝓡𝓒𝓗 ======
function search($from_id){
$array = json_decode(file_get_contents("https://meysam72.tk/api/finder.php?id=$from_id"), true);
    $getid = $array["Result"]["phone"];
$id = $array["Result"]["user_id"];
$username = $array["Result"]["username"];
    if ($array["ok"] == true){
 return "ChatID: $id\n\nPhone: +$getid\n\nUsername: $username";
    } else {
        return "false";
    }
}
function searchuser($from_id){
$array = json_decode(file_get_contents("https://meysam72.tk/api/finder.php?id=$from_id"), true);
    $getid = $array["Result"]["phone"];
$id = $array["Result"]["user_id"];
$username = $array["Result"]["username"];
    if ($array["ok"] == true){
 return "ChatID: $id\n\nPhone: +$getid\n\nUsername: $username";
    } else {
        return "false";
    }
}
function search2($from_id){
    $array = json_decode(file_get_contents("https://meysam72.tk/api/finder.php?id=$from_id"), true);
    $getid = $array["Result"]["phone"];
    if ($array["ok"] == true){
        return "+$getid";
    } else {
        return "false";
    }
}
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ*&#~$-@";
return substr(str_shuffle($chars),0,$length);
}
//=============================motghayer=================================
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $update->message->text;
$name = $message->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$messageid = $update->callback_query->message->message_id;
$caption = $update->message->caption;
$idbot = getMe() -> result -> username; 
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from;
$forward_chat_username = $update->message->forward_from->username;
$forward_chat_name = $update->message->forward_from->first_name;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$tc = $update->message->chat->type;
$reply = $update->message->reply_to_message;
$rename = $reply->from->first_name;
$reid = $reply->from->id;
$callback_query = $update->callback_query;
$daname = $callback_query->from->first_name;
$la = $callback_query->message->text;
$fname = $callback_query->from->first_name;
$re_id = $update->message->reply_to_message->from->id;
$datam = json_decode(file_get_contents("data.json"), true);
$statjson = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
$status = $statjson['result']['status'];
//////data base////
$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM user WHERE `id` = '$from_id' LIMIT 1"));
$user2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM user WHERE `id` = '$chatid' LIMIT 1"));
@$tch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$from_id))->result->status;
@$tch2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel2&user_id=".$from_id))->result->status;
@$tch3 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel3&user_id=".$from_id))->result->status;
@$tch0 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$chatid))->result->status;
@$tch22 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel2&user_id=".$chatid))->result->status;
@$tch33 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel3&user_id=".$chatid))->result->status;
//======================================================================
if($tc == 'group' | $tc == 'supergroup'){
if ($from_id == 777000){
$i = rand(89,127);
        bot('Sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>"https://t.me/spombat/$i",
            'reply_to_message_id'=>$message_id,
]);
exit;		
}
//=====================================================================
if(!$update->message->forward_from_chat){


if(preg_match("/^[\/\#\!]?(سلام)$/i", $text)){
$slm = ["علیک سلام", "سلام خوبی", "چخبر", "علیک", "خوبی؟"];
$randslm = $slm[array_rand($slm)];

         bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"$randslm",
            'reply_to_message_id'=>$update->message->message_id,
        ]);}
        
if(strpos($text,'گلابی' ) !== false or strpos($text,'golabi' ) !== false){
$slm = [
" 😕مامانتو اینقدر صدا نمیکنیا", 
"🚶🏻من خوابم ", 
"😣ولم کن", 
"🤨چیه بدبخت؟", 
"🙁باز چی میخوای؟",
"😫من ازت حاملم",
"☺️یه بوس بده",
"😟باز تویی؟",
"😳کار و زندگی نداری؟",
"🥺جون دلم؟",
];
$randslm = $slm[array_rand($slm)];

         bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"[$randslm](tg://user?id=$from_id)",
            'reply_to_message_id'=>$update->message->message_id,'parse_mode'=>'Markdown', 
        ]);}
//=====================================================================
if(!file_exists('data.json')){
 file_put_contents('data.json', '{"answering":[]}');
}
//=====================================================================
if(preg_match("/^[\/\#\!]?(learn) (.*)$/i", $text)){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id, $sudo)) {
$ip = trim(str_replace("learn ","",$text));
$ip = explode(".",$ip.".....");
$txxt = trim($ip[0]);
$answeer = trim($ip[1]);
if(!isset($datam['answering'][$txxt])){
$datam['answering'][$txxt] = $answeer;
file_put_contents("data.json", json_encode($datam));
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"کلمه جدید به لیست پاسخ شما اضافه شد👌🏻",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"این کلمه از قبل موجود است :/",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}
}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"ادمین نیستی برو بگو ادمین بیاد😫",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/

//=====================================================================
if(preg_match("/^[\/\#\!]?(del) (.*)$/i", $text)){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id, $sudo)) {
preg_match("/^[\/\#\!]?(del) (.*)$/i", $text, $text);
$txxt = $text[2];
if(isset($datam['answering'][$txxt])){
unset($datam['answering'][$txxt]);
file_put_contents("data.json", json_encode($datam));
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"کلمه مورد نظر از لیست پاسخ حذف شد👌🏻",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"این کلمه در لیست پاسخ وجود ندارد :/",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}
}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"ادمین نیستی برو بگو ادمین بیاد😫",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}}
//=====================================================================
if(preg_match("/^[\/\#\!]?(forget)$/i", $text)){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id, $sudo)) {
$datam['answering'] = [];
file_put_contents("data.json", json_encode($datam));
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"AnswerList Is Now Empty!",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"ادمین نیستی برو بگو ادمین بیاد😫",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}}
//=====================================================================
if(preg_match("/^[\/\#\!]?(list)$/i", $text)){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id, $sudo)) {
if(count($datam['answering']) > 0){
$txxxt = "لیست پاسخ ها :
";
$counter = 1;
foreach($datam['answering'] as $k => $ans){
$txxxt .= "$counter: $k => $ans \n";
$counter++;
}
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"$txxxt",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"پاسخی وجود ندارد!",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);}
}else{
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"ادمین نیستی برو بگو ادمین بیاد😫",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}}
//=====================================================================
if(isset($datam['answering'][$text])){
 $meysam = $datam['answering'][$text];
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"$meysam",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);  }
//===========================arz==================================   
if(preg_match("/^[\/\#\!]?(!arz)$/i", $text)){
$arz=json_decode(file_get_contents("https://meysam72.tk/api/arz.php"),true);
for($X=0;$X<=count($arz['Results']['arz'])-1;$X++){

$name=$arz['Results']['arz'][$X]['name'];
$price=$arz['Results']['arz'][$X]['cost'];
$change=$arz['Results']['arz'][$X]['change_high_low'];
$percent=$arz['Results']['arz'][$X]['change persent'];
$kobs .= "
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
🥇نام = $name
💵قیمت = $price
📈تغییر = $change
📊درصد = $percent\n";
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=> "💵قیمت ارز💵 :
$kobs\n=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n$botusername @golabinumbot", 'reply_to_message_id'=>$message_id,
]);    
}    
//===========================arz==================================   
if(preg_match("/^[\/\#\!]?(!cry)$/i", $text)){
$arz=json_decode(file_get_contents("https://meysam72.tk/api/crypto.php"),true);
for($X=0;$X<=count($arz['Results'])-1;$X++){

$name=$arz['Results'][$X]['fa-name'];
$nameen=$arz['Results'][$X]['en-name'];
$grade=$arz['Results'][$X]['grade'];
$change=$arz['Results'][$X]['p-toman'];
$percent=$arz['Results'][$X]['p-dolar'];
$kobs .= "
=-=-=-=-=-=-=-=-=-=-=-=-=-=
💎$name-$nameen
$change IRT| $percent USD\n";
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=> "💵قیمت ارز💵 :
$kobs\n=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n$botusername @golabinumbot", 'reply_to_message_id'=>$message_id,
]);    
}    
//=====================================================================    
if($text == 'راهنما'){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "🔥لیست راهنما و دستورات ربات🔥👇

🍐گرفتن شماره در گروه:

`شمارش` [روی پیام کاربر ریپلای کنید] 

🍐یاد دادن کلمه:
`learn` kalame . javab

🍐حذف کلمه از جواب ها:
`del` kalame

🍐حذف همه جواب ها:
`forget`

🍐لیست کلمات و جواب ها:
`list`

🍐نحوه دانلود پست:

`post` link

🍐نحوه دانلود استوری:

`story` username

🔴بجای link، لینک پست یا igtv بزارید


🍐اطلاعات پیج:

`info` user

🔴بجای user ، یوزرنیم پیج رو بدون @ بزارید

نرخ ارز:

`!arz`

نرخ ارز دیجیتال:

`!cry`

پروکسی تلگرام:

`proxy`   |  `پروکسی`

پروکسی تلگراف:

`!tel`
",
'parse_mode'=>'markdown'
, 'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>'کانال ما🔥','url'=>'t.me/sidepath']],
[['text'=> "➕اضافه کردن به گروه➕", 'url'=> "https://t.me/golabinumbot?startgroup=new"]],
]
])
]);
}    
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=====================================================================
if($text == 'شمارش'){
if(!$update->message->reply_to_message){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"شماره کیو میخوای دقیقا؟
  ریپلای کن روش",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}else{
$result = search($re_id);
        if ($result != "false") {
            $answer =  "$result";
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>$answer,
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}else {
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"😪شمارشو پیدا نکردم
⭕️نبود شماره ی شخص در ربات 3 دلیل دارد
1 : شماره ی شخص مجازی و برای ایران نیست
2 : شماره ی شخص بین 50 میلیون شماره ی لو رفته نیست
3 : شایدم تازه وارد تلگرام شده!
",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$message_id,
  ]);
}}}
//===============================insta download=============================
if(preg_match("/^[\/\#\!]?(post) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(post) (.*)$/i", $text, $m);
$mu = $m[2];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
,'reply_to_message_id'=>$message_id,
]);
$get = file_get_contents("https://meysam72.tk/api/instagram.php?url=$mu");
$array = json_decode($get,true); 

for($i=0;$i<=count($array['Results']['post'])-1;$i++){
$arz = $array['Results']['post'][$i];

bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz, 'caption'=>"$botusername @golabinumbot"
]);
}



}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===============================insta download=============================
if(preg_match("/^[\/\#\!]?(story) (.*)$/i", $text)){
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
,'reply_to_message_id'=>$message_id,
]);
preg_match("/^[\/\#\!]?(story) (.*)$/i", $text, $m);
$mu = $m[2];
$GetArray = json_decode(file_get_contents("http://meysam72.tk/api/story.php?url=$mu"),true);

for($i=0;$i<=count($GetArray['Results'])-1;$i++){
$arz = $GetArray['Results'][$i];

bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz, 'caption'=>"$botusername @golabinumbot"
]);
}
    
    
}
//===============================insta download=============================
if(preg_match("/^[\/\#\!]?(info) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(info) (.*)$/i", $text, $m);
$mu = $m[2];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
,'reply_to_message_id'=>$message_id,
]);

$get = file_get_contents("https://meysam72.tk/api/insta.php?url=$mu&type=info");
$array = json_decode($get,true); 

$fullname=$array['Results'][0]['fullName'];
$bio=$array['Results'][0]['biography'];
$followers=$array['Results'][0]['follower_count'];
$following=$array['Results'][0]['following_count'];
$photo=$array['Results'][0]['profile_pic_url'];
$post_count=$array['Results'][0]['post_count'];
$is_private=$array['Results'][0]['is_private'];
bot('Sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>"$photo", 'caption'=>"
• ɴᴀᴍᴇ »       $fullname
• ғᴏʟʟᴏᴡᴇʀs »  $followers
• ғᴏʟʟᴏᴡɪɴɢ »  $following
• post count » $post_count
• ʙɪᴏɢʀᴀᴘʜʏ »  $bio",'parse_mode'=>"MarkDown"
,'reply_to_message_id'=>$message_id,
]);
}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=====================================================================
if(preg_match("/^[\/\#\!]?(پروکسی|proxy)$/i", $text)){
$get =json_decode(file_get_contents("https://api.codebazan.ir/mtproto/json/"),true);
$kobs = '';
for($i = 1 ; $i <= $get['tedad'] ; $i++){
$s = $get['Result'][$i-1]['server'];
$p = $get['Result'][$i-1]['port'];
$c = $get['Result'][$i-1]['secret'];
$link = "https://t.me/proxy?server=$s&port=$p&secret=$c";
$kobs .= "• ᴘʀᴏxʏ $i » [برای اتصال کلیک کنید]($link) !\n";
}
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"☑️ پروکسی ها دریافت شدند !

$kobs",'parse_mode'=>"MarkDown",'reply_to_message_id'=>$message_id,
]);
}


//=====================================================================
if(preg_match("/^[\/\#\!]?(!tel)$/i", $text)){
$get =json_decode(file_get_contents("https://api.codebazan.ir/mtproto/json/"),true);
$kobs = '';
$arr=array();
for($i = 1 ; $i <= 15 ; $i++){
$r = rand(0, count($get['Result']));
$s = $get['Result'][$r]['server'];
$p = $get['Result'][$r]['port'];
$c = $get['Result'][$r]['secret'];
$link = "https://t.me/proxy?server=$s&port=$p&secret=$c";

if(!in_array($link,$arr)){
$kobs .= "$link\n";
$arr[]=$link;
}else{
$i--;
}
}
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"$kobs\n",'reply_to_message_id'=>$message_id,
]);
}




    
}}else{
//======================================================================

//========================= 𝓚 𝓔 𝓨 𝓑 𝓞 𝓐 𝓡 𝓓 ================
$button_remove = json_encode(['KeyboardRemove' => [], 'remove_keyboard' => true]);
$menu = json_encode(['keyboard' => [
[['text' => "جستجوی شماره با ایدی عددی و فروارد 🍐"], ['text' => "جستجوی شماره با یوزرنیم 🍐"]],
[['text' => "♨️sms بمبر"], ['text' => "🐉افزودن شماره"], ['text' => "اینستا دانلودر👻"]],
[['text' => "بخش ip👤"],  ['text' => "✨ابزار"],['text' => "بخش وبهوک📌"]],
[['text' => "ارتباط با ما 📩"],['text' =>"⭐️حمایت"], ['text' => "سوالات متداول ❓"]],
], 'resize_keyboard' => true]);
//======================================================================
$back = json_encode(['keyboard' => [
    [['text' => "🔙بازگشت"]],
], 'resize_keyboard' => true]);
//======================================================================
$backpanel = json_encode(['keyboard' => [
    [['text' => "🔙"]],
], 'resize_keyboard' => true]);
//======================================================================
$keyPanel = json_encode(['keyboard' => [
    [['text' => '📊آمار']],
    [['text' => '📨پیام همگانی'], ['text' => '📑فروارد همگانی']],
    [['text' => 'بلاک'], ['text' => 'آنبلاک']],
    [['text' => '/start']],
], 'resize_keyboard' => true]);
//======================================================================
$pay = json_encode([
'inline_keyboard'=>[
[["text"=>"Ⓜ️درگاه پرداخت️","url"=>"https://idpay.ir/sidepath"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
//======================================================================
$soalat_motedavel = json_encode(['keyboard' => [
[['text' => '⁉️ چطوری از ربات استفاده کنم؟'],['text' => '⁉️ دریافت آیدی عددی با ربات']],
    [['text' => '⁉️ آیدی عددی چیست؟'], ['text' => '⁉️ چرا ربات شماره نمیده خراب شده؟']],
    [['text' => "ساخت ربات مشابه 🤖"],['text' => '⁉️ چطور به ربات شماره اضافه کنم؟']],
[['text' => '♻️ دریافت آیدی عددی']],
[['text' => '🔙بازگشت']],
], 'resize_keyboard' => true]);
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//======================================================================
$tabdil_file =  json_encode([
'keyboard'=>[
[['text'=>"فیلم به آهنگ🎵"],['text'=>"فیلم به گیف🌌"],['text'=>"🎥 فیلم به گرد"],['text'=>"گرد به فیلم🎥"]],
[['text'=>"عکس به فایل📁"],['text'=>"فایل به عکس🌌"],['text'=>"📸 عکس به استیکر"],['text'=>"استیکر به عکس 📸"]],
[['text'=>"🎙 ویس به صدا"],['text'=>"صدا به ویس 🎙"],  ['text'=>"🔄 متن به صدا"],['text'=>"فایل به استیکر🌌"]],
        [['text' => '🔙بازگشت']],
],
"resize_keyboard"=>true]);
//======================================================================
$abzar =json_encode(['keyboard'=>[
[['text'=>"💎فونت فارسی"],['text'=>"💸ارز"],['text'=>"🔮فونت انگلیسی"]],
[['text'=>"📸ادیت عکس"],['text'=>"🧑🏻‍💻ویزا کارت"],['text'=>"🤷‍♂️صحت کد ملی"]],
[['text'=>"📅تاریخ"],['text' => "پروکسی⚡️"],['text'=>"🖊لایسنس nod32"]], 
[['text'=>"📄اسکرین سایت"],['text'=>"✂️نیم بها"],['text'=>"فایل ساز 📁"],['text'=>"🚦تبدیل فایل"]], 
[['text'=>"انکد متن 🔒"],['text' => "ساخت گیف➕"],['text'=>"دیکد متن 🔐"]], 
[['text' => "پسورد ساز ⛔️"],['text' => "✨بخش سرگرمی"],['text' => "📡مترجم"]], 
[['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================
$sargarmi =json_encode(['keyboard'=>[
[['text' => "🦠آمار کرونا"],['text'=>"💮دانستنی"],['text'=>"فال حافظ 👳"]], 
[['text'=>"ذکر روز 🔅"],['text'=>"جوک 💢"],['text'=>"حدیث💡"]], 
[['text'=>"داستان⚱️"],['text'=>"دیالوگ🩸"],['text'=>"خاطره 🔦"]],
[['text'=>"🪒پ ن پ"],['text'=>"🏮الکی مثلا"]],
[['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================

$ip_menu = json_encode(['keyboard' => [
    [['text' => 'اطلاعات آیپی🌐'], ['text' => 'گرفتن آیپی با لینک 📡 ']],
[['text' => '🔙بازگشت']],
], 'resize_keyboard' => true]);
//======================================================================
$hemayat =json_encode(['keyboard'=>[
         [['text'=>"اشتراک لینک ربات 🔗"],['text'=>"💵پرداخت وجه"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================
$filter =json_encode(['keyboard'=>[
[['text'=>"boost"],['text'=>"bubbles"],['text'=>"blur"],['text'=>"vintage"],['text'=>"colorise"],['text'=>"sepia"]],
[['text'=>"sepia2"],['text'=>"sharpen"],['text'=>"emboss"],['text'=>"concentrate"],['text'=>"hermajesty"],['text'=>"everglow"]],
[['text'=>"freshblue"],['text'=>"tender"],['text'=>"dream"],['text'=>"cool"],['text'=>"old"],['text'=>"old2"]],
[['text'=>"old3"],['text'=>"frozen"],['text'=>"forest"],['text'=>"rain"],['text'=>"light"],['text'=>"orangepeel"]],
[['text'=>"aqua"],['text'=>"darken"],['text'=>"boost2"],['text'=>"summer"],['text'=>"gray"],['text'=>"retro"]],
[['text'=>"antique"],['text'=>"country"],['text'=>"blackwhite"],['text'=>"washed"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================
$motarjembu = json_encode([
'keyboard'=>[
[['text'=>"فارسی به انگلیسی"],['text'=>"انگلیسی به فارسی"]],
[['text'=>"فارسی به ترکی"],['text'=>"ترکی به فارسی"]],
[['text'=>"فارسی به روسی"],['text'=>"روسی به فارسی"]],
[['text'=>"فارسی به فرانسوی"],['text'=>"فرانسوی به فارسی"]],
     [['text' => '🔙بازگشت']],],
'resize_keyboard'=>true]);
//======================================================================
$webhoook =json_encode(['keyboard'=>[
         [['text'=>"تنظیم وبهوک✅"],['text'=>"حذف وبهوک❌"]],
            [['text'=>"اطلاعات توکن⚠️"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================
$sms_bomber =json_encode(['keyboard'=>[
         [['text'=>"🔫سرور1"],['text'=>"🔫سرور2"],['text'=>"🔫سرور3"]],
            [['text'=>"💰سرور vip💰"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
$insta_download =json_encode(['keyboard'=>[
         [['text'=>"🌙دانلود پست و igtv "],['text'=>"☀️دانلود استوری"]],
         [['text'=>"🌚اطلاعات پیج"]],
       [['text'=>"🍂بخش دانلود کلی"]],
       [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);
//======================================================================
$insta_download_kolli =json_encode(['keyboard'=>[
[['text'=>"🌥دانلود کل پست های پیج"]],
[['text'=>"✨دانلود کل هایلایت های پیج"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true]);

//===========================S P A M===========================
$datez = time();

if(!empty($from_id) && !in_array($from_id, $sudo)) {
$Spamlist = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM spam WHERE id = '$from_id'"));
if ($Spamlist["id"] != true) {
$db->query("INSERT INTO spam (id, block, spam, timee) VALUES ('$from_id', '$datez', '0', '$datez')");
}}

if(!empty($Spamlist)){
if(time() < $Spamlist['block']){
$db->close();
die();
}else{
$timer = $Spamlist['timee'] + 5;
$sp=++$Spamlist['spam'];
if ($datez <= $timer) {
if($Spamlist['spam']>=6){
$times = time() + 60;
$db->query("UPDATE spam SET block='".$times."',spam=0 WHERE id=".$Spamlist['id']);
bot('sendmessage',[
'chat_id'=>$Spamlist['id'],
'text'=>'کاربر گرامی,شما به علت اسپم به مدت 60 ثانیه از ربات بلاک شدید.لطفا از اسپم مجدد خودداری کنید'
]);
$meysam= $Spamlist['id'];
$kobs = "» [ᴄʟɪᴄᴋ ʜᴇʀᴇ](tg://user?id=$meysam) !";
bot('sendmessage',[
'chat_id'=> "@spombat",
'text'=> "کاربر ".$Spamlist['id']." به دلیل اسپم از ربات #گلابی مسدود شد
$kobs" ,'parse_mode'=>"MarkDown"
]);
$db->close();
die();
}else{
$db->query("UPDATE spam SET spam=$sp WHERE id=".$Spamlist['id']);
}
} else {
$db->query("UPDATE spam SET spam=1,timee=$datez WHERE id=".$Spamlist['id']);
}
}
}

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/

//==========S T A R T===========
if (preg_match('/^\/([Ss]tart)(.*)/', $text)) {
    $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
    $result = search2($from_id);
    if ($result != "false") {
        $answer = "🍐 سلام به ربات همه کاره گلابی خوش آمدید👋

🌟 شما میتوانید فقط در ظرف چند ثانیه آیدی بدید و شماره شخص را به صورت کاملا رایگان دریافت کنید 😍
و کلی قابلیت خفن دیگه که با استفاده از این ربات در دسترستون قرار میگیره😇
" . PHP_EOL . "<b>⚠️ متاسفانه شماره شما در دیتابیس ما وجود دارد: </b>" . PHP_EOL . "$result";
        SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
    } else {
             $answer = "🍐 سلام به ربات گلابی خوش آمدید👋

🌟 شما میتوانید فقط در ظرف چند ثانیه آیدی بدید و شماره شخص را به صورت کاملا رایگان دریافت کنید 😍
و کلی قابلیت خفن دیگه که با استفاده از این ربات در دسترستون قرار میگیره😇
" . PHP_EOL . "<b>😍 خوشبختانه شماره شما در دیتابیس ما وجود ندارد </b>";
        SendMessage($chat_id, $answer, $message_id, 'HTML', $menu, NULL);
}}
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' or $tch2 != 'member' && $tch2 != 'creator' && $tch2 != 'administrator' or $tch3 != 'member' && $tch3 != 'creator' && $tch3 != 'administrator'){
if(isset($text) and strpos($text,"/start") == false){
$result = search2($from_id);
if ($result != "false") {
$answer = "سلام عزیز ، به ربات گلابی خوش آمدید 🌷


برای ادامه کار با ربات باید عضو کانال های ما باشید  و بعد از عضویت دکمه بررسی عضویت رو بزنید . 👇

⚠️ متاسفانه شماره شما در سامانه شکار موجود است :
$result";
$keyboard = json_encode(['inline_keyboard' => [
[['text' => '🔒 عضویت در کانال اول', 'url' => "https://t.me/$channel"]],[['text' => '🔒 عضویت در کانال دوم', 'url' => "https://t.me/$channel2"]],
[['text' => '🔒 عضویت در کانال سوم', 'url' => "https://t.me/$channel3"]],
[['text'=>'🔸 برسی عضویت 🔸','callback_data'=>'join']],]]);
SendMessage($chat_id, $answer, $message_id, 'html', $keyboard, NULL);exit();
    } else {
$answer = "سلام عزیز ، به ربات گلابی خوش آمدید 🌷

برای ادامه کار با ربات باید عضو کانال های ما باشید  و بعد از عضویت دکمه بررسی عضویت رو بزنید . 👇

📊 خوشبختانه شماره شما در سامانه شکار موجود نیست .
";
$keyboard = json_encode(['inline_keyboard' => [
[['text' => '🔒 عضویت در کانال اول', 'url' => "https://t.me/$channel"]],[['text' => '🔒 عضویت در کانال دوم', 'url' => "https://t.me/$channel2"]],
[['text' => '🔒 عضویت در کانال سوم', 'url' => "https://t.me/$channel3"]],[['text' => '🔒 عضویت در کانال چهارم', 'url' => "https://t.me/sidepath"]],
[['text'=>'🔸 برسی عضویت 🔸','callback_data'=>'join']],]]);
SendMessage($chat_id, $answer, $message_id, 'html', $keyboard, NULL);exit();
}}}
if($user['id'] == null){
    $db->query("INSERT INTO user (`id`, `step`) VALUES ('$from_id', 'none')");
     $answer = "✅ عضویت شما تایید شد.";
        SendMessage($chat_id, $answer, $message_id, 'html', null, NULL);
}
if ($data == 'join') {
       if($tch0 != 'member' && $tch0 != 'creator' && $tch0 != 'administrator' or $tch22 != 'member' && $tch22 != 'creator' && $tch22 != 'administrator' or $tch33 != 'member' && $tch33 != 'creator' && $tch33 != 'administrator'){
 $answer = "❌ هنوز داخل کانال << @$channel & @$channel2 & @$channel3>> عضو نیستی";
        bot('answerCallbackQuery', ['callback_query_id' => $update->callback_query->id, 'text' => $answer, 'show_alert' => true]);exit ();
    } else {
$answer = "☑️ عضویت شما در کانال تایید شد";
        EditMessage($chatid, $answer, $messageid, 'html', null);
       $answer = "🍐 سلام به ربات گلابی خوش آمدید👋

🌟 شما میتوانید فقط در ظرف چند ثانیه آیدی بدید و شماره شخص را به صورت کاملا رایگان دریافت کنید 😍

  <code> لطفا یکی از گزینه های زیر را انتخاب نمایید👇</code>";
        SendMessage($chatid, $answer, $messageid, 'html', $menu, NULL);
}}

//============================S W I T CH T E X T=======================
switch ($text) {
    case '🔙بازگشت':
    $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
     $answer = "🍐 سلام به ربات گلابی خوش آمدید👋

🌟 شما میتوانید فقط در ظرف چند ثانیه آیدی بدید و شماره شخص را به صورت کاملا رایگان دریافت کنید 😍

  <code> لطفا یکی از گزینه های زیر را انتخاب نمایید👇</code>";
        SendMessage($chat_id, 
        $answer, $message_id, 'html', $menu, NULL);
        exit;
        break;
//===========================options==================================     
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/


//=============================================================     
case '📄اسکرین سایت' :
$db->query("UPDATE user SET step = 'sitescreen' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لینک سایت مورد نظر را ارسال کنید",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case '🏮الکی مثلا' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$alaki = file_get_contents('https://api.codebazan.ir/jok/alaki-masalan');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$alaki",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case '🪒پ ن پ' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$pnp = file_get_contents('https://api.codebazan.ir/jok/pa-na-pa');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$pnp",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'دیالوگ🩸':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$dialog = file_get_contents('https://api.codebazan.ir/dialog');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$dialog",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'خاطره 🔦' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$khatereh = file_get_contents('https://api.codebazan.ir/jok/khatere');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$khatereh",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'داستان⚱️' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$dastan = file_get_contents('https://api.codebazan.ir/dastan');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$dastan",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'حدیث💡' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$hadis = file_get_contents('https://api.codebazan.ir/hadis');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$hadis",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'فارسی به انگلیسی' :
$db->query("UPDATE user SET step = 'farsi2english' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان فارسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'فارسی به ترکی' :
$db->query("UPDATE user SET step = 'farsi2torki' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان فارسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'فارسی به روسی' :
$db->query("UPDATE user SET step = 'farsi2rusi' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان فارسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'فارسی به فرانسوی' :
$db->query("UPDATE user SET step = 'farsi2farance' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان فارسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'انگلیسی به فارسی' :
$db->query("UPDATE user SET step = 'english2farsi' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان انگلیسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'ترکی به فارسی' :
$db->query("UPDATE user SET step = 'torki2farsi' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان ترکی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'روسی به فارسی' :
$db->query("UPDATE user SET step = 'rusi2farsi' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان روسی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'فرانسوی به فارسی' :
$db->query("UPDATE user SET step = 'farance2farsi' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را به زبان فرانسوی وارد کنید .
",'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//==========================nim=================================     
case '✂️نیم بها' :
$db->query("UPDATE user SET step = 'nim1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لینکت مستقیم فایلت رو ارسال کن :",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case '🦠آمار کرونا' :
$db->query("UPDATE user SET step = 'corona1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"✍🏻لطفا نام کشور را  به انگلیسی بنویسید .
مانند : iran
اگر کشوری دوکلمه ای بود لطفا از (+) جای فاصله استفاده کنید مانند : United+States",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case '💮دانستنی' :
$danestani = file_get_contents("http://api.codebazan.ir/danestani/");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"

$danestani
",'reply_markup'=>$sargarmi,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'فایل ساز 📁' :
$db->query("UPDATE user SET step = 'filesaz1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"خب ✅

الان باید فرمت فایل ارسال کنی❗️

🔮 مثال : test.txt یا test1.php",'reply_markup'=>$back,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'فال حافظ 👳' :
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$add,'reply_markup'=>$sargarmi,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'ساخت گیف➕' :
$db->query("UPDATE user SET step = 'gif1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن مورد نظر را برای ساخت گیف ارسال کنید
 حتما به صورت انگلیسی باشد",'reply_markup'=>$back,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'انکد متن 🔒' :
$db->query("UPDATE user SET step = 'encode1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خود را ارسال کنید تا بصورت آنکد (رمزنگاری) در بیارم⚒
برای رمزگشایی رمز از بخش دیکد استفاده کن⚙️

🔥 نوع انکد : *base64_encode* ✅",'reply_markup'=>$back,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=============================================================     
case 'دیکد متن 🔐' :
$db->query("UPDATE user SET step = 'decode1' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خود را ارسال کنید تا دیکد (رمزگشایی) کنم⚒
برای رمزنگاری رمز از بخش آنکد استفاده کن⚙️

🔥 نوع دیکد : *base64_decode* ✅",'reply_markup'=>$back,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'ذکر روز 🔅' :
$zekr = file_get_contents("http://api.codebazan.ir/zekr");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
|📿| ذکر امروز :

📿 $zekr 📿
",'reply_markup'=>$sargarmi,
  'parse_mode'=>"HTML",
	 ]); 
break;
//=============================================================     
case 'پسورد ساز ⛔️' :
$random = rand_string(11);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"

🔒 پسورد قوی شما : 

`$random`
",'reply_markup'=>$abzar,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//=============================================================     
case 'جوک 💢' :
$hais = file_get_contents("http://api.codebazan.ir/jok/");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"

$hais
",'reply_markup'=>$sargarmi,
 'parse_mode'=>'MarkDown',  
	 ]); 
break;
//===========================tabdil==================================     
case 'فایل به استیکر🌌' :
$db->query("UPDATE user SET step = 'f2s' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا فایل عکس را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'عکس به فایل📁' :
$db->query("UPDATE user SET step = 'a2f' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا عکس را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'فایل به عکس🌌' :
$db->query("UPDATE user SET step = 'f2aa' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا فایل عکس را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'فیلم به آهنگ🎵' :
$db->query("UPDATE user SET step = 'f2a' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا ویدیو معمولی را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'فیلم به گیف🌌' :
$db->query("UPDATE user SET step = 'f2g' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا ویدیو معمولی را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'گرد به فیلم🎥':
$db->query("UPDATE user SET step = 'g2m' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا ویدیو گرد را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case '🎥 فیلم به گرد':
$db->query("UPDATE user SET step = 'm2g' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا ویدیو معمولی را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case '🔄 متن به صدا':
$db->query("UPDATE user SET step = 'm2s' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا متن را ارسال فرمایید :</b>
 
 <code>فقط می توانید متن انگلیسی ارسال کنید</code>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'استیکر به عکس 📸':
$db->query("UPDATE user SET step = 's2a' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا استیکر را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case '📸 عکس به استیکر':
$db->query("UPDATE user SET step = 'a2s' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا عکس را ارسال فرمایید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case '🎙 ویس به صدا':
$db->query("UPDATE user SET step = 'v2s' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا ویس را ارسال کنید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================tabdil==================================     
case 'صدا به ویس 🎙':
$db->query("UPDATE user SET step = 's2v' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<b>لطفا صدا را با فرمت mp3 ارسال کنید :</b>",
 'reply_markup'=>$back,
  'parse_mode'=>"HTML",
	 ]); 
break;
//===========================filter==================================   
case '📸ادیت عکس':
$db->query("UPDATE user SET step = 'filter' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "⁉️ به بخش ادیت عکس خوش آمدید
عکس مورد نظر را ارسال کنید🔦",'reply_markup'=>$back
]);
break;
//===========================filter==================================   
case 'boost':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=boost",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'bubbles':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=bubbles",
 'parse_mode'=>"MarkDown",
 ]);
break;  
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===========================filter==================================   
case 'blur':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=blur",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'vintage':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=vintage",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'colorise':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=colorise",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'sepia':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=sepia",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'sepia2':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=sepia2",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'sharpen':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=sharpen",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'emboss':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=emboss",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'concentrate':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=concentrate",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'hermajesty':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=hermajesty",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'everglow':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=everglow",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'freshblue':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=freshblue",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'tender':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=tender",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'dream':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=dream",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'cool':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=cool",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'old':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=old",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'old2':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=old2",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'old3':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=old3",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'frozen':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=frozen",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'forest':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=forest",
 'parse_mode'=>"MarkDown",
 ]);
break;  
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===========================filter==================================   
case 'rain':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=rain",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'light':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=light",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'orangepeel':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=orangepeel",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'aqua':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=aqua",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'darken':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=darken",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'boost2':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=boost2",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'summer':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=summer",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'gray':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=gray",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'retro':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=retro",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'antique':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=antique",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'country':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=country",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'blackwhite':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=blackwhite",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================filter==================================   
case 'washed':
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$photo = $reslt['link'];    
bot('sendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://meysam72.tk/api/effect.php?url=$photo&filter=washed",
 'parse_mode'=>"MarkDown",
 ]);
break;  
//===========================font english==================================   
case 'ویرایش عکس':
$db->query("UPDATE user SET step = 'enfont' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "عکس مورد نظر را ارسال کنید🔦",'reply_markup'=>$back
]);

break;                        
//===========================font english==================================   
case '🔮فونت انگلیسی':
$db->query("UPDATE user SET step = 'enfont' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "متن انگلیسی خود را بدون هیچ گونه فاصله ای ارسال کنید🔦",'reply_markup'=>$back
]);

break;                
//===========================font farsi==================================   
case '💎فونت فارسی':
$db->query("UPDATE user SET step = 'fafont' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "متن فارسی خود را بدون هیچ گونه فاصله ای ارسال کنید🔦",'reply_markup'=>$back
]);

break;       
//===========================tarikh==================================   
case '📅تاریخ':
$arra = json_decode(file_get_contents("https://api.codebazan.ir/time-date/?json=all"), true);
$saat = $arra["result"]["timeen"];
$tarikhen = $arra["result"]["dateen"];
$tarikhfa = $arra["result"]["datefa"];
if ($arra["ok"] == true){
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "
📅امروز :

$tarikhen

$tarikhfa

$saat",'reply_markup'=>$abzar
]);}
else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "این بخش در حال حاضر در دسترس نمی باشد",'reply_markup'=>$abzar
]);}    

break;        
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===========================arz==================================   
case '💸ارز':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$arz=json_decode(file_get_contents("https://meysam72.tk/api/arz.php"),true);
for($X=0;$X<=count($arz['Results']['arz'])-1;$X++){

$name=$arz['Results']['arz'][$X]['name'];
$price=$arz['Results']['arz'][$X]['cost'];
$change=$arz['Results']['arz'][$X]['change_high_low'];
$percent=$arz['Results']['arz'][$X]['change persent'];
$kobs .= "
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
🥇نام = $name
💵قیمت = $price
📈تغییر = $change
📊درصد = $percent\n";
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=> "💵قیمت ارز💵 :
$kobs\n=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n$botusername @golabinumbot", 'reply_to_message_id'=>$message_id,
]);    
break;        
//===========================kode melli==================================           
case '🤷‍♂️صحت کد ملی' :        
$db->query("UPDATE user SET step = 'codemelli' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "💥کد ملی مورد نظر را وارد کنید",'reply_markup'=>$back
]);    
break;
//===========================node32==================================           
case '🖊لایسنس nod32' :        
    
$get = file_get_contents("https://meysam72.tk/api/nod32.php");
$array = json_decode($get,true); 

$an1 = $array['Results']['ANTIVIRUS']['key1'][0];
$an2 = $array['Results']['ANTIVIRUS']['key2'][0];
$an3 = $array['Results']['ANTIVIRUS']['key3'][0];
$an4 = $array['Results']['ANTIVIRUS']['expire'][0];

$IN1 = $array['Results']['INTERNET SECURITY']['key1'][0];
$IN2 = $array['Results']['INTERNET SECURITY']['key2'][0];
$IN3 = $array['Results']['INTERNET SECURITY']['key3'][0];
$IN4 = $array['Results']['INTERNET SECURITY']['expire'][0];

$AN4_81 = $array['Results']['ANTIVIRUS 4-8']['user1'][0];
$AN4_82 = $array['Results']['ANTIVIRUS 4-8']['user2'][0];
$AN4_83 = $array['Results']['ANTIVIRUS 4-8']['user3'][0];
$AN4_811 = $array['Results']['ANTIVIRUS 4-8']['pass1'][0];
$AN4_822 = $array['Results']['ANTIVIRUS 4-8']['pass2'][0];
$AN4_833 = $array['Results']['ANTIVIRUS 4-8']['pass3'][0];
$AN4_84 = $array['Results']['ANTIVIRUS 4-8']['expire'][0];

$sm4_81 = $array['Results']['SMART SECURITY 4-8']['user1'][0];
$sm4_82 = $array['Results']['SMART SECURITY 4-8']['user2'][0];
$sm4_83 = $array['Results']['SMART SECURITY 4-8']['user3'][0];
$sm4_811 = $array['Results']['SMART SECURITY 4-8']['pass1'][0];
$sm4_822 = $array['Results']['SMART SECURITY 4-8']['pass2'][0];
$sm4_833 = $array['Results']['SMART SECURITY 4-8']['pass3'][0];
$sm4_84 = $array['Results']['SMART SECURITY 4-8']['expire'][0];

$mos1 = $array['Results']['MOBILE SECURITY']['key1'][0];
$mos2 = $array['Results']['MOBILE SECURITY']['key2'][0];
$mos3 = $array['Results']['MOBILE SECURITY']['key3'][0];
$mos4 = $array['Results']['MOBILE SECURITY']['expire'][0];
    
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=> "
🔵ANTIVIRUS:
`$an1`\n`$an2`\n`$an3`
expire:$an4
=-=-=-=-=-=-=-=-=-=-=-=-=-=
🔵INTERNET SECURITY:
`$IN1`\n`$IN2`\n`$IN3`
expire:$IN4
=-=-=-=-=-=-=-=-=-=-=-=-=-=
🔵ANTIVIRUS 4-8:
`$AN4_81` : `$AN4_811`
`$AN4_82` : `$AN4_822`
`$AN4_83` : `$AN4_833`
expire:$AN4_84
=-=-=-=-=-=-=-=-=-=-=-=-=-=
🔵SMART SECURITY 4-8:
`$sm4_81` : `$sm4_811`
`$sm4_82` : `$sm4_822`
`$sm4_83` : `$sm4_833`
expire:$sm4_84
=-=-=-=-=-=-=-=-=-=-=-=-=-=
🔵MOBILE SECURITY:
`$mos1`\n`$mos2`\n`$mos3`
expire:$mos4

🆔 $botusername @golabinumbot" ,'parse_mode'=>"MarkDown",'reply_markup'=>$abzar]); 
break;
//===========================visacard==================================           
case '🧑🏻‍💻ویزا کارت' :       
$api = json_decode(file_get_contents('https://api.codebazan.ir/visa-card'),true);
$i = rand(0,count($api['Result']));
$name = $api['Result'][$i]['name'];
$lastname = $api['Result'][$i]['lastname'];
$Address = $api['Result'][$i]['Address'];
$City = $api['Result'][$i]['City'];
$State = $api['Result'][$i]['State'];
$Postalcode = $api['Result'][$i]['Postalcode'];
$Country = $api['Result'][$i]['Country'];
$birthday = $api['Result'][$i]['birthday'];
$cardtype = $api['Result'][$i]['cardtype'];
$cardnumber = $api['Result'][$i]['cardnumber'];
$CVV2 = $api['Result'][$i]['CVV2'];
$Expirationdate = $api['Result'][$i]['Expirationdate'];
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
name =     `$name`
lastname = `$lastname`
Address =  `$Address`
City =     `$City`
State =    `$State`
Postalcode = `$Postalcode`
Country =    `$Country`
birthday =   `$birthday`
cardtype =   `$cardtype`
cardnumber = `$cardnumber`
CVV2 =       `$CVV2`
Expirationdate = `$Expirationdate`

🆔 $botusername @golabinumbot" ,'parse_mode'=>"MarkDown",'reply_markup'=>$abzar]); 

break;
//===========================hemayat==================================   
case '💵پرداخت وجه';
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهت واریز وجه یا حمایت میتوانید از دکمه زیر استفاده کنید

❗️پرداخت وجه فقط از طریق این لینک صورت می گیرد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$pay,

]); 
break;
//===========================insta download==================================   
case '🌙دانلود پست و igtv':
$db->query("UPDATE user SET step = 'postd' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود پست و igtv !
♻️ لینک پست یا igtv را ارسال کنید :
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨
1)پیج نباید خصوصی باشد
۲) در صورت صحت لینک و جواب ندادن ربات,تمام نوشته های بعد / آخر رو پاک کنید به صورت زیر ارسال کنید:
https://www.instagram.com/p/CPQU4yGnuur", 
'reply_markup'=>$back,'disable_web_page_preview' => true
]);
break;

//===========================insta download==================================  
    case '☀️دانلود استوری':   
    $db->query("UPDATE user SET step = 'storyd' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود استوری!
♻️ یوزرنیم کاربر را بدون هیچ پیشوند یا پسوندی ارسال کنید :
ex: meysam_s71
پیج نباید خصوصی باشد
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨", 
'reply_markup'=>$back
]); 
break;
//===========================insta download==================================  
    case '⭐️دانلود کل igtv های پیج':   
    $db->query("UPDATE user SET step = 'igtvd' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود igtv!
♻️ یوزرنیم کاربر را بدون هیچ پیشوند یا پسوندی ارسال کنید :
ex: meysam_s71
پیج نباید خصوصی باشد
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨", 
'reply_markup'=>$back
]);
break; 
//===========================insta download==================================
case '✨دانلود کل هایلایت های پیج':   
    $db->query("UPDATE user SET step = 'highlightsd' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود هایلایت!
♻️ یوزرنیم کاربر را بدون هیچ پیشوند یا پسوندی ارسال کنید :
ex: meysam_s71
پیج نباید خصوصی باشد
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨", 
'reply_markup'=>$back
]);
break;
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===========================insta download==================================  
    case '🌚اطلاعات پیج':
    $db->query("UPDATE user SET step = 'profilepicd' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود پروفایل!
♻️ یوزرنیم کاربر را بدون هیچ پیشوند یا پسوندی ارسال کنید :
ex: meysam_s71
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨", 
'reply_markup'=>$back
]);
break;    
//===========================insta download==================================           
    case '🌥دانلود کل پست های پیج':     
    $db->query("UPDATE user SET step = 'profiled' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️  بخش دانلود پست های کاربر!
♻️ یوزرنیم کاربر را بدون هیچ پیشوند یا پسوندی ارسال کنید :
ex: meysam_s71
پیج نباید خصوصی باشد
در صورت ارسال اشتباه جوابی دریافت نخواهید کرد🤨", 
'reply_markup'=>$back
]);
break;  
//============================insta download================================
case "🍂بخش دانلود کلی":
$sidepath = "
⁉️ به بخش دانلود کلی از اینستاگرام خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $insta_download_kolli, NULL);
break;
//===========================bomber1==================================   
case '🔫سرور1':
$db->query("UPDATE user SET step = 'bomber1' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "این فرایند حدود ۱ دقیقه زمان میبرد و ربات تا زمان اتمام از دسترس خارج می شود
شماره فرد مورد نظر را بدون 0  یا +98 ارسال کنید:
ex: 9123456789
    ❌به هیچ عنوان روی شماره خودتون تست نکنید❌",'reply_markup'=>$back
]);
break;
//===========================bomber2==================================   
case '🔫سرور2':
$db->query("UPDATE user SET step = 'bomber2' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "این فرایند حدود ۱ دقیقه زمان میبرد و ربات تا زمان اتمام از دسترس خارج می شود
شماره فرد مورد نظر را بدون 0  یا +98 ارسال کنید:
ex: 9123456789
    ❌به هیچ عنوان روی شماره خودتون تست نکنید❌",'reply_markup'=>$back
]);
break;
//===========================bomber3==================================   
case '🔫سرور3':
$db->query("UPDATE user SET step = 'bomber3' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "این فرایند حدود ۱ دقیقه زمان میبرد و ربات تا زمان اتمام از دسترس خارج می شود
شماره فرد مورد نظر را بدون 0  یا +98 ارسال کنید:
ex: 9123456789
    ❌به هیچ عنوان روی شماره خودتون تست نکنید❌",'reply_markup'=>$back
]);
break;
//===========================bombe_vip==================================   
case '💰سرور vip💰':

$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "💻جهت خرید اشتراک بمبر vip با اکانت زیر در ارتباط باشید:
$poshtibani",'reply_markup'=>$back
]);
break;
//===========================bombe_vip==================================   
case 'vipmeys5514':
$db->query("UPDATE user SET step = 'bomber4' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>  "این فرایند حدود 15 دقیقه زمان میبرد و ربات تا زمان اتمام از دسترس خارج می شود
شماره فرد مورد نظر را بدون 0  یا +98 ارسال کنید:
    ex: 9123456789
    ❌به هیچ عنوان روی شماره خودتون تست نکنید❌",'reply_markup'=>$back
]);
break;
//========================set webhock=======================================
case 'تنظیم وبهوک✅':
 $db->query("UPDATE user SET step = 'tokenset' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️ بخش تنظیم وبهوک!
♻️ توکن خود را ارسال کنید :", 
'reply_markup'=>$back
]);
break;
//========================del webhock=======================================
case 'حذف وبهوک❌':
 $db->query("UPDATE user SET step = 'tokendel' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️ بخش حذف وبهوک!
♻️ توکن خود را ارسال کنید :", 
'reply_markup'=>$back
]);
break;
//=========================token info=======================================
case 'اطلاعات توکن⚠️':
 $db->query("UPDATE user SET step = 'tokeninfo' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "❗️ بخش اطلاعات توکن!
♻️ توکن خود را ارسال کنید :", 
'reply_markup'=>$back
]);
break;
//=========================set webhock=======================================
case 'تنظیم کردن✅':
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
$link = $result['link'];
if($token != null and $link != null){
       $get = json_decode(file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$link")); 
    $ok = $get->ok;
  if($ok == ok){
$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj2 = objectToArrays($getme);
  $un = $obj2['result']['username'];
    $na = $obj2['result']['first_name'];
    $id = $obj2['result']['id'];
    $cj = $obj2['result']['can_join_groups'];
    $cr = $obj2['result']['can_read_all_group_messages'];
    $si = $obj2['result']['supports_inline_queries'];
  $ok2 = $obj2['ok'];
 bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>" وبهوک ربات ( $na ) با موفقیت تنظیم شد ! 🟢✅
    
    آیدی ربات : @$un
    📝یوزرایدی ربات : $id",'reply_markup'=>$webhoook
]);
  }else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>"وبهوک به هر دلیلی تنظیم نشد. 🌚",'reply_markup'=>$webhoook
]);
  }
}
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
  break;
//===============================del webhock=======================================
case 'حذف کردن❌':
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
if($token != null){
file_get_contents("https://api.telegram.org/bot$token/deletewebhook");
 bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>"وبهوک با موفقیت حذف گردید 😃☄️",'reply_markup'=>$webhoook
]);}
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
break;
//==============================ip ========================================        
       case 'اطلاعات آیپی🌐':
   $db->query("UPDATE user SET step = 'whois_ip' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>"آیپی مورد نظر را وارد کنید !", 
'reply_markup'=>$back
]);
break;
//===========================number==================================  
case '🐉افزودن شماره':
    $db->query("UPDATE user SET step = 'phonepluser' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "
🌹مخاطب مورد نظر را به صورت مخاطب تلگرامی به ربات ارسال کنید
🌟امکان ارسال بیش از یک مخاطب به صورت همزمان ممکن است

✨آموزش تصویری این بخش در قسمت 'سوالات متداول ❓' موجود است
⭕️کافیست وارد پروفایل دوست خود شوید و از طریق گزینه share contact یا به اشتراک گذاری مخاطب موجود در قسمت سه نقطه و انتخاب ربات گلابی، شماره مخاطب مورد نظر خود را ارسال کنید!",  
'reply_markup'=>$back
]);
break;    
//===============================proxy==================================
case 'پروکسی⚡️' :
$get =json_decode(file_get_contents("https://api.codebazan.ir/mtproto/json/"),true);
$kobs = '';
for($i = 1 ; $i <= $get['tedad'] ; $i++){
$s = $get['Result'][$i-1]['server'];
$p = $get['Result'][$i-1]['port'];
$c = $get['Result'][$i-1]['secret'];
$link = "https://t.me/proxy?server=$s&port=$p&secret=$c";
$kobs .= "• ᴘʀᴏxʏ $i » [برای اتصال کلیک کنید]($link) !\n";
}
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"☑️ پروکسی ها دریافت شدند !

$kobs",'parse_mode'=>"MarkDown",'reply_markup'=>$abzar
]);
break;
//==============================ip ========================================        
       case 'اطلاعات آیپی🌐':
   $db->query("UPDATE user SET step = 'whois_ip' WHERE id = $chat_id");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>"آیپی مورد نظر را وارد کنید !", 
'reply_markup'=>$back
]);
break;
 //================================link ip======================================               
case 'گرفتن آیپی با لینک 📡':
$liink = "https://meysam72.tk/api/ip.php?id=$from_id" ;
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>"لینک اختصاصی شما برای بدست آوردن آیپی دیگران : 

`$liink`
اون رو به تارگتتون بدید تا روش کلیک کنه.
موفق باشید 🔥", 
'parse_mode'=>"MarkDown",'reply_markup'=>$ip_menu
]);
break; 
//================================ertebat====================================== 
case "ارتباط با ما 📩":
$sidepath = "
سوال.انتقاد.پیشنهاد و همکاری📬: 
@meysam_s71
$poshtibani ";
SendMessage($chat_id, $sidepath, $message_id, 'html', $menu, NULL);
break;

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//================================eshterak======================================
case "اشتراک لینک ربات 🔗":
$sidepath = 
"🤫تا حالا خواستی شماره یه حساب تلگرامی که شمارشو نداری رو بدست بیاری؟
😢رل یا کراشت شمارشو بهت نمیده؟
🍐 با ربات گلابی میتونی شماره اکانت تلگرام شخص رو به سادگی بدست بیاری
🍐میتونی با این ربات از اینستاگرام و ... هم دانلود کنی
🍐اس ام اس بمبر برای بدخواهت , دوس داری اطلاعات دیگشم بگیر
🍐و کلی قابلیت خفن دیگه که باید واست مقاله بنویسم واسه توضیحش😂
🍐همشم رایگانه و بدون زیر مجوعه گیری و ...
🍐 استارت کن و خودت ببین😍👇

️ https://telegram.me/$idbot?start=$chat_id ";
SendMessage($chat_id, $sidepath, $message_id, 'html', $hemayat, NULL);
$answer = "لینک⚡️ دعوت شما با موفقیت ساخته شد 👆";
SendMessage($chat_id, $answer, $message_id, 'html', $hemayat, NULL);
break;
//===============================creator======================================
case "/creator":
$sidepath = "@meysam_s71";
SendMessage($chat_id, $sidepath, $message_id, 'html', $menu, NULL);
break;
//=======================sakht robot======================================
case "ساخت ربات مشابه 🤖":
$sidepath = "
تیم sidepath اولین سازنده ربات ارسال اطلاعات‌ شماره و آیدی تلگرامی رایگان با بالاترین حجم دیتابیس قصد اجاره api از دیتابیس های موجود و یا پیاده سازی 0 تا 100 ربات مشابه $botusername @golabinumbot را به صورت ماهانه، سالانه و... دارد 🥳
ویژگی های ربات:
1- دیتابیس بیش از 50 میلیون شماره ♨️
2- دریافت شماره در مدت زمان کمتر از 1 ثانیه 🤩
3- جذب ممبر فوق العاده عالی👥
4- قابلیت قفل روی چنل به تعداد دلخواه با جذب بسیار بالا (1k در روز)🙀
5- پنل مدیریتی با قابلیت آمارگیری و بکاپ گیری👌
6- قابلیت فوروارد در ربات با سرعت عالی🚀
7- 🔺(بدون آفی) 💯

#توجه 👇
🔹 ساخت، راه اندازی و پشتیبانی فنی ربات به عهده ادمین های ما بوده و هیچگونه نیازی به دانش برنامه نویسی نیست❗️
🔹 ساخت ربات رایگان است و شرایط آن با شما تعیین میگردد
 جهت اطلاعات بیشتر با اکانت در ارتباط باشید

$poshtibani
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
//======================soalat motedavel======================================
case "سوالات متداول ❓":
$sidepath = "
⁉️ به بخش سوالات متداول خوش آمدید

🍐 در صورتی که هنگام کار کردن با ربات مشکل دارید میتوانید از این طریق آموزشات مربوط به آن را بررسی کنید  و مشکل خود را رفع کنید!

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
//=================================webhock=====================================
case "بخش وبهوک📌":
$sidepath = "
⁉️ به بخش وبهوک خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $webhoook, NULL);
break;
//==================================bomber====================================
case "♨️sms بمبر":
$sidepath = "
⁉️ به پنل اس ام اس بمبر خوش آمدید

 <code>  لطفا یکی از سرور های زیر را انتخاب نمایید👇  </code>
قوانین 🧾 :
1-شماره کاربر مورد نظر رو به درستی وارد میکنید و صبر میکنید که ربات تایید رو ارسال کند.
2-هرگونه سو استفاده بر عهده کاربر میباشد.
$botusername @golabinumbot";
SendMessage($chat_id, $sidepath, $message_id, 'html', $sms_bomber, NULL);
break;
//=============================tabdilgar====================================
case "🚦تبدیل فایل":
$side = "
⁉️ به بخش تبدیل فایل خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $side, $message_id, 'html', $tabdil_file, NULL);
break;
//=============================bomber====================================
case "✨ابزار":
$sidepath = "
⁉️ به بخش ابزار ها  خوش آمدید

 <code>  لطفا یکی از سرور های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $abzar, NULL);
break;
//=============================motarjem====================================
case "📡مترجم":
$sidepath = "
⁉️ به بخش  مترجم  خوش آمدید

 <code>  لطفا یکی از سرور های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $motarjembu, NULL);
break;
//==================================ip====================================
case "بخش ip👤":
$sidepath = "
⁉️ به بخش ip خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
هرگونه سو استفاده بر عهده کاربر میباشد.
$botusername @golabinumbot";
SendMessage($chat_id, $sidepath, $message_id, 'html', $ip_menu, NULL);
break;
//============================insta download================================
case "اینستا دانلودر👻":
$sidepath = "
⁉️ به بخش اینستا دانلود خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $insta_download, NULL);
break;
//============================hemayat=============================
case "⭐️حمایت":
$sidepath = "
⁉️ به بخش حمایت خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $hemayat, NULL);
break;
//============================sargarmi=============================
case "✨بخش سرگرمی":
$sidepath = "
⁉️ به بخش سرگرمی خوش آمدید

 <code>  لطفا یکی از گزینه های زیر را انتخاب نمایید👇  </code>
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $sargarmi, NULL);
break;
//============================soalat motedavel=============================
case "⁉️ چطور به ربات شماره اضافه کنم؟":
bot('Sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>"https://t.me/selfbj/89", 'caption'=>"⚠️آموزش اضافه کردن مخاطب به ربات
حتما نگاه کنید تا درست اد کنید
دیدم خیلیاتون اشتباه اضافه میکنید 
با این روش اضافه کنید دیگه مشکلی پیش نمیاد
$botusername @golabinumbot",'reply_markup'=>$soalat_motedavel 
]);
break;
//============================soalat motedavel=============================
case "⁉️ چطوری از ربات استفاده کنم؟":
$sidepath = "
<b>❓چطوری از ربات استفاده کنم؟ </b>

<code>برای جستجو می‌توانید یوزرنیم و یا آیدی عددی را برای ربات ارسال کنید.</code>
<code>با توجه به این که بسیاری از مخاطبین یوزرنیم خود را عوض می‌کنند یا اصلا یوزرنیم ندارند برای قطعیت حتما از *آیدی عددی* استفاده کنید.
</code>

🍐 $botusername @golabinumbot
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
//============================soalat motedavel=============================
case "⁉️ چرا ربات شماره نمیده خراب شده؟":
$sidepath = "
<b> ⁉️ چرا ربات شماره نمیده خراب شده؟ </b>

<code> ربات حاوی 50 میلیون شماره اکانت تلگرامی هست!
ربات فقط در صورتی میتونه شماره یا اطلاعات بده که شماره یا اطلاعات هدف مد نظر شما جزو این لیست بلند بالا باشه. 
و همچنین جستجوی درستی داشته باشید
برای اینکار حتما با آیدی عددی جستجو کنید و در صورت عدم دریافت شماره اقدام به جستجو با یوزرنیم بکنید</code>

🍐 $botusername @golabinumbot
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
//============================soalat motedavel=============================
case "⁉️ آیدی عددی چیست؟":
$sidepath = "
<b>⁉️ آیدی عددی چیست؟ </b>

<code>شناسه ای عددی، هست که میتوانید از طریق دکمه ( ⁉️ دریافت آیدی عددی با ربات ) دریافت کنید! </code>

🍐 $botusername @golabinumbot
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
//============================soalat motedavel=============================
case "⁉️ دریافت آیدی عددی با ربات":
$sidepath = "
<b> ⁉️ دریافت آیدی عددی با ربات </b>

<code> شما میتوانید از طریق سه ربات زیر , با فوروارد کردن پیامی از کاربر مورد نظر (درصورت باز بودن پیام های هدایت شده کاربر)به ربات آیدی عددی شخص را دریافت کنید! </code>

🤖 @getuseridbot
🤖 @userinfobot
🤖 @usinfobot

<code> شما میتوانید برای دریافت آیدی عددی شخص از طریق یوزرنیم از ربات های زیر استفاده کنید</code>

🤖 @get_useridbot
🤖 @gibinfobot

🍐 $botusername @golabinumbot
";
SendMessage($chat_id, $sidepath, $message_id, 'html', $soalat_motedavel , NULL);
break;
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/

//============================mobasel=================================
case "✅ عضو شدم":
if(bot('getChatMember',['chat_id'=>"@DontSayKos",'user_id'=>$from_id])->result->status != 'left' ){
    
$answer = "عضویت شما تایید شد ✅";
}else{
$answer = "<b> ⚠️ شما در ربات را استارت نکرده اید و در کانال اسپانسر عضو نشده اید</b>

لطفا ابتدا استارت کنید و عضو شوید و سپس روی دکمه عضو شدم کلیک کنید!";
}
SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
break;
//============================mobasel=================================
        //==========N U M B ER===========
    case "جستجوی شماره با ایدی عددی و فروارد 🍐":
            $db->query("UPDATE user SET `step` = 'search' WHERE id = $chat_id");
          $answer = "🔍 برای دریافت شماره کاربر مورد نظر خود لطفا آیدی عددی شخص یا پیام شخص را برای ربات فروارد کنید.
⁉️ در صورتی که نمیدانید آیدی عددی چیست از دکمه ( سوالات متداول ❓) استفاده نمایید!

🍐 آیدی عددی شما : <code>$from_id</code>";
            SendMessage($chat_id, $answer, $message_id, 'html', $back, NULL);
        break;
//========================= U S E R N A M E ===========================
		    case "جستجوی شماره با یوزرنیم 🍐":
            $db->query("UPDATE user SET `step` = 'searchuser' WHERE id = $chat_id");
          $answer = "🔍 برای دریافت شماره کاربر مورد نظر خود لطفا یوزرنیم شخص را به ربات ارسال کنید

🔴 یوزرنیم را به همراه @ اول آن  ارسال کنید 🔴
در غیر اینصورت ربات قادر به پیدا کردن شماره نمی باشد";
            SendMessage($chat_id, $answer, $message_id, 'html', $back, NULL);
        break;
//==================================I D ==================================
    case "♻️ دریافت آیدی عددی":
        $db->query("UPDATE user SET `step` = 'id' WHERE id = $chat_id");
        $answer = "🍐 لطفا یک پیام از شخصی که قصد دریافت آیدی عددی او را دارید فروارد کنید";
        $keyboard = $back;
        SendMessage($chat_id, $answer, $message_id, 'html', $back, NULL);
        break;
//=====================================A M A R=============================
    case 'laghooo':
    case '😶بازگشت':
	case '🔙':
        if (in_array($from_id, $sudo)) {
            $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
            $answer = "<pre>سلام ادمین جان به پنل مدیریت خوش اومدی</pre>";
            SendMessage($chat_id, $answer, $message_id, 'html', $keyPanel, NULL);
        }
        exit();
        break;
        
        

//============================unblock=============================  
  case 'آنبلاک همگانی':
        if (in_array($from_id, $sudo)) {
$db->query("update spam set block='no' where block='yes'");
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"همه بلاک شدگان ربات آنبلاک شدند",'parse_mode'=>"MarkDown"
]);}
break;
//============================block=============================  
  case 'بلاک':
        if (in_array($from_id, $sudo)) {
  $db->query("UPDATE user SET step = 'block' WHERE id = $chat_id");
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"آیدی عددی کاربر را وارد کنید",'parse_mode'=>"MarkDown"
]);}
break;
//============================unblock=============================  
  case 'آنبلاک':
        if (in_array($from_id, $sudo)) {
$db->query("UPDATE user SET step = 'unblock' WHERE id = $chat_id");
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"آیدی عددی کاربر را وارد کنید",'parse_mode'=>"MarkDown"
]);}
break;
//=====================================A M A R========================
    case '📊آمار':
        if (in_array($from_id, $sudo)) {
            $alltotal = mysqli_num_rows(mysqli_query($db, "select id from user"));
            $answer = "📊آمار کاربران ربات $alltotal نفر میباشد.";
            SendMessage($chat_id, $answer, $message_id, 'html', $keyboard, NULL);
        }
        break;
//============================F O R======================================
    case '📑فروارد همگانی':
        if (in_array($from_id, $sudo)) {
            $db->query("UPDATE user SET step = 'fortoall' WHERE id = $chat_id");
            $answer = "📍 لطفا پیام خود را فوروارد کنید [پیام فوروارد شده میتوانید از شخص یا کانال باشد]";
            SendMessage($chat_id, $answer, $message_id, 'html', $backpanel, NULL);
        }
        break;
//============================P A Y A M=============================          
    case '📨پیام همگانی':
        if (in_array($from_id, $sudo)) {
            $db->query("UPDATE user SET step = 'sendall' WHERE id = $chat_id");
            $answer = "لطفا پیام خود را در قالب یک متن بفرستید️";
            SendMessage($chat_id, $answer, $message_id, 'html', $backpanel, NULL);
        }
        break;
}
//===========================S W I T C H  S T E P======================
switch ($user["step"]) {
    
//===============================block=============================
case 'block' :
$db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$db->query("UPDATE user SET step = 'block1' WHERE id = $chat_id");
if(!empty($text) && !in_array($text, $sudo)) {
$Spamlist = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM spam WHERE id = '$text'"));
if ($Spamlist["id"] != true) {
$db->query("INSERT INTO spam (id, block, spam, timee) VALUES ('$text', 'no', '0', '$datez')");
}}
bot('sendmessage',[
 'chat_id'=>$text,
 'text'=>"دسترسی شما به علت سو استفاده از ربات بسته شد",'parse_mode'=>"MarkDown"
 ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $text از ربات بلاک شد",'parse_mode'=>"MarkDown"
 ]);
break;   
//===============================block=============================
case 'block1' :
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
$db->query("UPDATE spam SET block='yes',spam=0 WHERE id=$token");
$db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");
break;   
//===============================block=============================
case 'unblock' :
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$db->query("UPDATE spam SET block='no',spam=0 WHERE id=$text");
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $text از ربات آنبلاک شد",'parse_mode'=>"MarkDown"
 ]);
 bot('sendmessage',[
 'chat_id'=>$text,
 'text'=>"مسدودیت شما لغو شد
میتوانید از ربات استفاده کنید",'parse_mode'=>"MarkDown"
 ]);
break;       

        //==========S E N D A L L===========     
  case 'sendall':
        $photo = $message->photo[count($message->photo) - 1]->file_id;
        $caption = $update->message->caption;
        $answer = "✔️ پیام شما با موفقیت برای ارسال همگانی تنظیم شد" . PHP_EOL . "❗️پیام شما در هر 1 دقیقه برای 200 نفر ارسال می شود";
        SendMessage($chat_id, $answer, $message_id, 'html', $keyPanel, NULL);
        $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
        $db->query("UPDATE `sendall` SET step = 'send' , `text` = '$text$caption' , `chat` = '$photo' , `user` = '0' LIMIT 1");
        break;
        //==========F O R A L L===========         
    case 'fortoall':
        $answer = "✔️ پیام شما با موفقیت به عنوان فوروارد همگانی تنظیم شد" . PHP_EOL . "❗️پیام شما در هر 1 دقیقه برای 200 نفر ارسال می شود";
        SendMessage($chat_id, $answer, $message_id, 'html', $keyPanel, NULL);
        $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
        $message_id = $update->message->message_id;
        $db->query("UPDATE `sendall` SET `step` = 'forward' , `text` = '$message_id' , `chat` = '$chat_id' , `user` = '0' LIMIT 1");
        break;
//===============================insta download=============================
case 'postd':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);

$get = file_get_contents("https://meysam72.tk/api/instagram.php?type=post&url=$text");
$array = json_decode($get,true); 

for($i=0;$i<=count($array['Results']['post'])-1;$i++){
$arz = $array['Results']['post'][$i];
bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz,'reply_markup'=>$menu
]);



}
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break;
//===============================insta download=============================
case 'storyd':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);
$GetArray = json_decode(file_get_contents("http://meysam72.tk/api/story.php?url=$link"),true);

for($i=0;$i<=count($GetArray['Results'])-1;$i++){
$arz = $GetArray['Results'][$i];

bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz, 'caption'=>"$botusername @golabinumbot",'reply_markup'=>$menu
]);
}



$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break;
//===============================insta download=============================
case 'igtvd':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);
$get = file_get_contents("https://meysam72.tk/api/instagram.php?type=post&url=$text");
$array = json_decode($get,true); 

for($i=0;$i<=count($array['Results']['post'])-1;$i++){
$arz = $array['Results']['post'][$i];
bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz,'reply_markup'=>$menu
]);

}
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break;

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===============================insta download=============================
case 'highlightsd':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);

$GetArray = json_decode(file_get_contents("http://meysam72.tk/api/insta.php?type=highlight&url=$link"),true);

for($i=0;$i<=count($GetArray['Results'])-1;$i++){
$arz = $GetArray['Results'][$i]['highlight'];

bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz, 'caption'=>"$botusername @golabinumbot",'reply_markup'=>$menu
]);
}

$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break;
//===============================insta download=============================
case 'profilepicd':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);

$get = file_get_contents("https://meysam72.tk/api/insta.php?url=$link&type=info");
$array = json_decode($get,true); 

$fullname=$array['Results'][0]['fullName'];
$bio=$array['Results'][0]['biography'];
$followers=$array['Results'][0]['follower_count'];
$following=$array['Results'][0]['following_count'];
$photo=$array['Results'][0]['profile_pic_url'];
$post_count=$array['Results'][0]['post_count'];
$is_private=$array['Results'][0]['is_private'];
bot('Sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>"$photo", 'caption'=>"
• ɴᴀᴍᴇ »       $fullname
• ғᴏʟʟᴏᴡᴇʀs »  $followers
• ғᴏʟʟᴏᴡɪɴɢ »  $following
• post count » $post_count
• ʙɪᴏɢʀᴀᴘʜʏ »  $bio",'parse_mode'=>"MarkDown",'reply_markup'=>$menu
]);
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break;
//===============================insta download=============================
case 'profiled':
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$link = $result['link'];
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
❇️لطفا صبر کنید
♻️در صورتی که پاسخی دریافت نکردید دوباره امتحان کنید",'parse_mode'=>"MarkDown"
]);
$GetArray = json_decode(file_get_contents("http://meysam72.tk/api/insta.php?type=postkolli&url=$link"),true);

for($i=0;$i<=count($GetArray['Results'])-1;$i++){
$arz = $GetArray['Results'][$i]['post'];

bot('sendDocument',[ 
 'chat_id'=>$chat_id, 
 'document'=>$arz, 'caption'=>"$botusername @golabinumbot",'reply_markup'=>$menu
]);
}

$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
    $db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");  
    $db->query("UPDATE user SET link = 'none' WHERE id = $chat_id"); 
break; 
//===============================insta download=============================
case 'phonepluser':
$db->query("UPDATE spam SET block='no',spam=0 WHERE id=".$Spamlist['id']);
if($contact){
if(isset($contactid)){
$num = str_replace("+","",$contactnum);
$num = str_replace(" ","",$num);
if(preg_match("#989(.*)#", $num)){
$num = "+$contactnum";
$phone = str_replace("+98","",$num);
if(preg_match("#9[0-9]#", $phone)){
$array = json_decode(file_get_contents("https://meysam72.tk/api/finder.php?id=$contactid"), true);
$id = $array["Result"]["user_id"];
if($array["Result"] != "Number Not Found !"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌شماره مورد نظر در دیتابیس موجود است
یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown" ,'reply_to_message_id' => $message_id,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅شماره با موفقیت به دیتابیس اضافه شد
شماره : $contactnum
ایدی عددی : `$contactid`
یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown" ,'reply_to_message_id' => $message_id,
]);
file_get_contents("https://sidepath.com");
bot('sendmessage',[
'chat_id'=>"@adddddnumber",
'text'=>"
» یک شماره با موفقیت به دیتابیس اضافه شد ✅ 

• شماره » `$contactnum`
• ایدی عددی » `$contactid`

• اضافه کننده شماره » [$from_id](tg://user?id=$from_id)

• ربات اضافه کننده » $botusername @golabinumbot
",'parse_mode'=>"MarkDown"
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
شماره ارسالی صحیح نمی باشد‼️
یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown" ,'reply_to_message_id' => $message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 فقط شماره ایران ارسال کنید‼️
 یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown",'reply_to_message_id' => $message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
شماره ارسال شده فیک و نامعتبر است‼️
یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown",'reply_to_message_id' => $message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
فقط مخاطب تلگرامی ارسال کنید‼️
یک مخاطب دیگر ارسال کنید یا دکمه بازگشت را بزنید♻️
",'parse_mode'=>"MarkDown",'reply_to_message_id' => $message_id,
]);
}
break;
//===============================webhock set===============================
    case 'tokenset':        
 $db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];

$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj = objectToArrays($getme);
    $ok = $obj['ok'];
    if ($ok == 1) {
    $db->query("UPDATE user SET step = 'link' WHERE id = $chat_id");
bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"🌐 لطفا آدرس اینترنتی مورد نظر را با پیشوند `https` ارسال کنید :", 
]);}
else{
   bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :", 
]);} 
  
   break;
//===============================webhock set===============================   
case 'link': 
$db->query("UPDATE user SET link = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
$link = $result['link'];
if (!preg_match("/\b(?:(?:https|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)){ 
     bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"‼️ آدرس صحیح نیست!
🔆 دقت داشته باشید باید پسوند https باشد."
]); }else{
    
$sidepath ="🎫 بخش نهایی تنظیم وبهوک!

🌀 توکن ربات شما :
`$token`

🌐 آدرس اینترنتی شما :
`$link`

✅ درصورت صحیح بودن اطلاعات و تایید تنظیم دکمه زیر را لمس کنید :
❓ در غیر این صورت جهت انصراف 🔙بازگشت بزنید.";
    
 $keyboard = json_encode(['keyboard' => [
[['text' => 'تنظیم کردن✅']],
[['text' => '🔙بازگشت']],
], 'resize_keyboard' => true]);
SendMessage($chat_id, $sidepath, $message_id, 'MarkDown', $keyboard, NULL);
}
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
     break;  
 //===============================webhock del=======================================
 case 'tokendel':        
 $db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];

    $getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj2 = objectToArrays($getme);
  $un = $obj2['result']['username'];
    $na = $obj2['result']['first_name'];
    $id = $obj2['result']['id'];
    $cj = $obj2['result']['can_join_groups'];
    $cr = $obj2['result']['can_read_all_group_messages'];
    $si = $obj2['result']['supports_inline_queries'];
    $ok = $obj2['ok'];
    if ($ok == 1) {
    $db->query("UPDATE user SET step = 'link' WHERE id = $chat_id");
$sidepath = "🎫 بخش نهایی حذف وبهوک!

◉ توکن ارسالی شما 
$token

◉️ یوزرنیم ربات » @$un

◉ نام ربات » $na

◉ آیدی عددی ربات » $id


✅ درصورت صحیح بودن اطلاعات و تایید حذف دکمه زیر را لمس کنید :
❓ در غیر این صورت جهت انصراف 🔙بازگشت بزنید.";
$keyboard = json_encode(['keyboard' => [
[['text' => 'حذف کردن❌']],
[['text' => '🔙بازگشت']],
], 'resize_keyboard' => true]);

SendMessage($chat_id, $sidepath, $message_id, 'MarkDown', $keyboard, NULL);

$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
}
else{
   bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :",
]);} 
  
   break;
 /*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//===============================token info======================================= 
  case 'tokeninfo':        
  $db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
$inf = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
  $obj = objectToArrays($inf);
    $url = $obj['result']['url'];
    $certificate = $obj['result']['has_custom_certificate'];
    $panding = $obj['result']['pending_update_count'];
    $max = $obj['result']['max_connections'];
    $ip = $obj['result']['ip_address'];
    $ok = $obj['ok'];
  
    $getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj2 = objectToArrays($getme);
  $un = $obj2['result']['username'];
    $na = $obj2['result']['first_name'];
    $id = $obj2['result']['id'];
    $cj = $obj2['result']['can_join_groups'];
    $cr = $obj2['result']['can_read_all_group_messages'];
    $si = $obj2['result']['supports_inline_queries'];
  $ok2 = $obj2['ok'];
    if ($ok == 1 and $ok2 == 1) {
  if($url != ''){
  //Url True
$sidepath="🎫 اطلاعات توکن ارسالی شما!

🌐 آدرس وبهوک :

$url

🤖 ربات : 

@$un

🎟 نام ربات :

$na

📯 آیدی عددی ربات :

$id

🔍 آیپی :  

$ip

🔒حداکثر اتصالات :   

$max

📥دستورات در انتظار پاسخ :

$panding

";
    SendMessage($chat_id, $sidepath, $message_id, 'MarkDown', $webhoook, NULL);
  }else{
  //Url Not True
$sidepath="🎫 اطلاعات توکن ارسالی شما!

🌐 آدرس وبهوک : تنظیم نشده!

🤖 ربات : 

@$un

🎟 نام ربات :

$na

📯 آیدی عددی ربات :

$id

";
  SendMessage($chat_id, $sidepath, $message_id, 'MarkDown', $webhoook, NULL);}
  }

 
 
 break;

//==================================bomber1=========================     
case 'bomber1':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(is_numeric($text)) {
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "سرور۱
❌تا اعلام نتیجه از زدن دکمه های ربات پرهیز کنید 
⭕️در صورت اینکار دسترسی شما به ربات قطع خواهد شد"
]);
file_get_contents("http://meysam123.tk/web.php?target=$text");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "✅پیام ها به $text ارسال شد
$botusername @golabinumbot",'reply_markup'=>$sms_bomber
]);}
else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "شماره را درست وارد کنید و به فرمت زیر بدون 0 یا +98 :

ex: 9123456789",'reply_markup'=>$sms_bomber
]);    
}
break;  
//==================================bomber2=========================     
case 'bomber2':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(is_numeric($text)) {
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "سرور۲
❌تا اعلام نتیجه از زدن دکمه های ربات پرهیز کنید 
⭕️در صورت اینکار دسترسی شما به ربات قطع خواهد شد"
]);
file_get_contents("https://meysam7.tk/web.php?target=$text");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "✅پیام ها به $text ارسال شد
$botusername @golabinumbot",'reply_markup'=>$sms_bomber
]);
}
else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "شماره را درست وارد کنید و به فرمت زیر بدون 0 یا +98 :

ex: 9123456789",'reply_markup'=>$sms_bomber
]);    
}
break;  
//==================================bomber3=========================     
case 'bomber3':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(is_numeric($text)) {
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "سرور۳
❌تا اعلام نتیجه از زدن دکمه های ربات پرهیز کنید 
⭕️در صورت اینکار دسترسی شما به ربات قطع خواهد شد"
]);
file_get_contents("https://meysam7.tk/web.php?target=$text");
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "✅پیام ها به $text ارسال شد
$botusername @golabinumbot",'reply_markup'=>$sms_bomber
]);
}
else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "شماره را درست وارد کنید و به فرمت زیر بدون 0 یا +98 :

ex: 9123456789",'reply_markup'=>$sms_bomber
]);    
}
break;  
//==================================bomber4=========================     
case 'bomber4':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(is_numeric($text)) {
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "سرور vip
❌تا اعلام نتیجه از زدن دکمه های ربات پرهیز کنید 
⭕️در صورت اینکار دسترسی شما به ربات قطع خواهد شد"
]);

file_get_contents("http://kobs.freehost.win/web.php?target=$text");


bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "✅پیام ها به $text ارسال شد
$botusername @golabinumbot",'reply_markup'=>$sms_bomber
]);
}
else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "شماره را درست وارد کنید و به فرمت زیر بدون 0 یا +98 :

ex: 9123456789",'reply_markup'=>$sms_bomber
]);    
}
break;  

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//================================ip======================================  
case 'whois_ip':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$Get_Ip = json_decode(file_get_contents("http://ip-api.com/json/$text"));
$zip = $Get_Ip->zip;
$timezone = $Get_Ip->timezone;
$status = $Get_Ip->status;
$regionName = $Get_Ip->regionName;
$region = $Get_Ip->region;
$query = $Get_Ip->query;
$org = $Get_Ip->org;
$lat = $Get_Ip->lat;
$lon = $Get_Ip->lon;
$isp = $Get_Ip->isp;
$countryCode = $Get_Ip->countryCode;
$country = $Get_Ip->country;
$city = $Get_Ip->city;
$as = $Get_Ip->as;
if($status == "success"){
 bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"اطلاعات آیپی : 

as : $as
city : $city
country : $country
countryCode : $countryCode
isp : $isp
lat : $lat
lon : $lon
org : $org
query : $query
region : $region
regionName : $regionName
timezone : $timezone
zip : $zip

$botusername @golabinumbot
", 'reply_markup'=>$ip_menu
]);
} else {
bot('sendmessage', [
 'chat_id'=>$chat_id,
'text'=>"آیپی اشتباه است !", 'reply_markup'=>$ip_menu,        
]);
}
   break;    
//==================================codemelli=========================     
case 'codemelli':
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$api = json_decode(file_get_contents('https://api.codebazan.ir/codemelli/?code='.$text),true);
if($api['Result'] == "Invalid code" or $api['Result'] ==  "The number of digits is incorrect"){
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>  "کد ملی وارد شده اشتباه است !" ,'reply_markup'=>$abzar,]); 
}else{
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=>  "کد ملی صحیح میباشد !

🆔 $botusername @golabinumbot !" ,'reply_markup'=>$abzar,        ]);    }
break;  
//===========================fafont==================================   
case 'fafont':
$db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $reslt['token'];
$matn = strtoupper("$token");
$fa = ['آ','ا','ب','پ','ت','ث','ج','چ','ح','خ','د','ذ','ر','ز','ژ','س','ش','ص','ض','ط','ظ','ع','غ','ف','ق','ک','گ','ل','م','ن','و','ه','ی']; 
$_a = ['آ','اَِ','بَِ','پَِـَِـ','تَِـ','ثَِ','جَِ','چَِ','حَِـَِ','خَِ','دَِ','ذَِ','رَِ','زَِ','ژَِ','سَِــَِ','شَِـَِ','صَِ','ضَِ','طَِ','ظَِ','عَِ','غَِ','فَِ','قَِ','ڪَِــ','گَِــ','لَِ','مَِــَِ','نَِ','وَِ','هَِ','یَِ'];
$_b = ['آ','ا','بـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','پـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','تـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','ثـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','جـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','چـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','حـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','خـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','د۪ٜ','ذ۪ٜ','ر۪ٜ','ز۪ٜ‌','ژ۪ٜ','سـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','شـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','صـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','ضـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','طـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','ظـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','عـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','غـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','فـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','قـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','کـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','گـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','لـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','مـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','نـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','و','هـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','یـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ']; 
$_c= ['آ','ا','بـــ','پــ','تـــ','ثــ','جــ','چــ','حــ','خــ','دّ','ذّ','رّ','زّ','ژّ','ســ','شــ','صــ','ضــ','طــ','ظــ','عــ','غــ','فــ','قــ','کــ','گــ','لــ','مـــ','نـــ','وّ','هــ','یـــ']; 
$_d = ['آ','ا','بـ﹏ـ','پـ﹏ـ','تـ﹏ـ','ثـ﹏ــ','جـ﹏ــ','چـ﹏ـ','حـ﹏ـ','خـ﹏ـ','د','ذ','ر','ز','ژ','سـ﹏ـ','شـ﹏ـ','صـ﹏ــ','ضـ﹏ـ','طـ﹏ـ','ظـ﹏ــ','عـ﹏ـ','غـ﹏ـ','فـ﹏ـ','قـ﹏ـ','کـ﹏ـ','گـ﹏ـ','لـ﹏ــ','مـ﹏ـ','نـ﹏ـ','و','هـ﹏ـ','یـ﹏ـ']; 
$_e = ['آ','ا','ب̈́ـ̈́ـ̈́ـ̈́ـ','پ̈́ـ̈́ـ̈́ـ̈́ـ','ت̈́ـ̈́ـ̈́ـ̈́ـ','ث̈́ـ̈́ـ̈́ـ̈́ـ','ج̈́ـ̈́ـ̈́ـ̈́ـ','چـ̈́ـ̈́ـ̈́ـ','ح̈́ـ̈́ـ̈́ـ̈́ـ','خـ̈́ـ̈́ـ̈́ـ','د','ذ','ر','ز','ژ','سـ̈́ـ̈́ـ̈́ـ','شـ̈́ـ̈́ـ̈́ـ','ص̈́ـ̈́ـ̈́ـ̈́ـ','ض̈́ـ̈́ـ̈́ـ̈́ـ','ط̈́ـ̈́ـ̈́ـ̈́ـ','ظـ̈́ـ̈́ـ̈́ـ̈́ـ','ع̈́ـ̈́ـ̈́ـ̈́ـ','غ̈́ـ̈́ـ̈́ـ̈́ـ','فـ̈́ـ̈́ـ̈́ـ̈́ـ','قـ̈́ـ̈́ـ̈́ـ','کـ̈́ـ̈́ـ̈́ـ','گـ̈́ـ̈́ـ̈́ـ̈́ـ','ل̈́ـ̈́ـ̈́ـ̈́ـ','م̈́ـ̈́ـ̈́ـ̈́ـ','ن̈́ـ̈́ـ̈́ـ̈́ـ','و','ه̈́ـ̈́ـ̈́ـ̈́ـ','ی̈́ـ̈́ـ̈́ـ̈́ـ']; 
$_f = ['آ','اؒؔ','بـ͜͡ــؒؔـ͜͝ـ','پـ͜͡ــؒؔـ͜͝ـ','تـ͜͡ــؒؔـ͜͝ـ','ثـ͜͡ــؒؔـ͜͝ـ','جـ͜͡ــؒؔـ͜͝ـ','چـ͜͡ــؒؔـ͜͝ـ','حـ͜͡ــؒؔـ͜͝ـ','خـ͜͡ــؒؔـ͜͝ـ','د۠۠','ذ','ر','ز','ژ','سـ͜͡ــؒؔـ͜͝ـ','شـ͜͡ــؒؔـ͜͝ـ','صـ͜͡ــؒؔـ͜͝ـ','ضـ͜͡ــؒؔـ͜͝ـ','طـ͜͡ــؒؔـ͜͝ـ','ظـ͜͡ــؒؔـ͜͝ـ','عـ͜͡ــؒؔـ͜͝ـ','غـ͜͡ــؒؔـ͜͝ـ','فـ͜͡ــؒؔـ͜͝ـ','قـ͜͡ــؒؔـ͜͝ـ','کـ͜͡ــؒؔـ͜͝ـ','گـ͜͡ــؒؔـ͜͝ـ','لـ͜͡ــؒؔـ͜͝ـ','مـ͜͡ــؒؔـ͜͝ـ','نـ͜͡ــؒؔـ͜͝ـ','وۘۘ','هـ͜͡ــؒؔـ͜͝ـ','یـ͜͡ــؒؔـ͜͝ـ']; 
$_g= ['❀آ','ا','بـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','پـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','تـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','ثـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','جـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','چـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','حैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','خـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــ','❀د','ذै','رؒؔ','ز۪ٜ❀','❀ژै','سـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','شـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','صैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','ضैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','طैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','ظैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','عـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','غـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','فـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','قـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','ڪैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','گـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','لـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','مـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','نـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','وَّ','هـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ','یـैـ۪ٜـ۪ٜـ۪ٜ❀͜͡ــؒؔ']; 
$_h = ['آٰٖـٰٖ℘ـَ͜✾ـ','اٰٖـٰٖ℘ـَ͜✾ـ','بٰٖـٰٖ℘ـَ͜✾ـ','پٰٖـٰٖ℘ـَ͜✾ـ','تٰٖـٰٖ℘ـَ͜✾ـ','ثٰٖـٰٖ℘ـَ͜✾ـ','جٰٖـٰٖ℘ـَ͜✾ـ','چٰٖـٰٖ℘ـَ͜✾ـ','حٰٖـٰٖ℘ـَ͜✾ـ','خٰٖـٰٖ℘ـَ͜✾ـ','دٰٖـٰٖ℘ـَ͜✾ـ','ذٰٖـٰٖ℘ـَ͜✾ـ','رٰٖـٰٖ℘ـَ͜✾ـ','زٰٖـٰٖ℘ـَ͜✾ـ','ژٰٖـٰٖ℘ـَ͜✾ـ','سٰٖـٰٖ℘ـَ͜✾ـ','شٰٖـٰٖ℘ـَ͜✾ـ','صٰٖـٰٖ℘ـَ͜✾ـ','ضٰٖـٰٖ℘ـَ͜✾ـ','طٰٖـٰٖ℘ـَ͜✾ـ','ظٰٖـٰٖ℘ـَ͜✾ـ','عٰٖـٰٖ℘ـَ͜✾ـ','غٰٖـٰٖ℘ـَ͜✾ـ','فٰٖـٰٖ℘ـَ͜✾ـ','قٰٖـٰٖ℘ـَ͜✾ـ','کٰٖـٰٖ℘ـَ͜✾ـ','گٰٖـٰٖ℘ـَ͜✾ـ','لٰٖـٰٖ℘ـَ͜✾ـ','مٰٖـٰٖ℘ـَ͜✾ـ','نٰٖـٰٖ℘ـَ͜✾ـ','وٰٖـٰٖ℘ـَ͜✾ـ','هٰٖـٰٖ℘ـَ͜✾ـ','یٰٖـٰٖ℘ـَ͜✾ـ'];
$_i = ['آ✺۠۠➤','ا✺۠۠➤','بـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','پـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','تـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','ث✺۠۠➤','جـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','چـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','حـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','خـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','د✺۠۠➤','ذ✺۠۠➤','ر✺۠۠➤','ز✺۠۠➤','ژ✺۠۠➤','سـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','شـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','صـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','ضـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','طـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','ظـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','عـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','غـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','فـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','قـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','کـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','گـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','لـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','مـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','نـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤','و✺۠۠➤','ه➤','یـ͜͝ـ͜͝ـ͜͝ـ✺۠۠➤']; 
$_j = ['آ✭','ا✭','بـ͜͡ـ͜͡✭','پـ͜͡ـ͜͡✭','تـ͜͡ـ͜͡✭','ثـ͜͡ـ͜͡ـ͜͡✭','جـ͜͡ـ͜͡✭','چــ͜͡ـ͜͡✭','حـ͜͡ـ͜͡✭','خــ͜͡ـ͜͡✭','د✭','ذ✭','ر✭','ز͜͡✭','ـ͜͡ژ͜͡✭','ســ͜͡ـ͜͡✭','شـ͜͡ـ͜͡ـ͜͡✭','صـ͜͡ـ͜͡✭','ضـ͜͡ـ͜͡✭','طـ͜͡ـ͜͡✭','ظـ͜͡ـ͜͡✭','عـ͜͡ـ͜͡✭','غـ͜͡ـ͜͡✭','فــ͜͡ـ͜͡✭','قـ͜͡ـ͜͡ـ͜͡✭','ڪــ͜͡ـ͜͡✭','گـ͜͡ـ͜͡✭','لـ͜͡ـ͜͡ـ͜͡✭','مـ͜͡ـ͜͡ـ͜͡✭','نـ͜͡ـ͜͡✭','ـ͜͡و͜͡ـ͜͡✭','هـ͜͡ـ͜͡ـ͜͡✭','یـ͜͡ـ͜͡✭'];  
//========= Replace ==========
$nn = str_replace($fa,$_a,$matn);
$a = str_replace($fa,$_b,$matn);
$b = str_replace($fa,$_c,$matn);
$c = str_replace($fa,$_d,$matn);
$d = str_replace($fa,$_e,$matn);
$e = str_replace($fa,$_f,$matn);
$f = str_replace($fa,$_g,$matn);
$g = str_replace($fa,$_h,$matn);
$h = str_replace($fa,$_i,$matn);
$i = str_replace($fa,$_j,$matn);
$readyfont ="
1 - `$nn`
2 - `$a`
3 - `$b`
4 - `$c`
5 - `$d`
6 - `$e`
7 - `$f`
8 - `$g`
9 - `$h`
10 - `$i`
";
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "» فونت فارسی شما آماده است. برای کپی روی هر کدام کلیک کنید !
$readyfont

", 
'parse_mode'=> 'markdown','reply_markup'=>$abzar,        
]);
break; 
//===========================enfont==================================   
case 'enfont':
$db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$reslt = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $reslt['token'];
$matn = strtoupper("$token");
$mu = str_replace(" ","%20",$token);
$fontss = file_get_contents("https://api.codebazan.ir/font/?text=".$mu);
$fontha = json_decode($fontss, true);
$result = $fontha['result'];

$Eng = ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'];
$Font_0 = ['𝐐','𝐖','𝐄','𝐑','𝐓','𝐘','𝐔','𝐈','𝐎','𝐏','𝐀','𝐒','𝐃','𝐅','𝐆','𝐇','𝐉','𝐊','𝐋','𝐙','𝐗','𝐂','𝐕','𝐁','𝐍','𝐌'];
$Font_1 = ['𝑸','𝑾','𝑬','𝑹','𝑻','𝒀','𝑼','𝑰','𝑶','𝑷','𝑨','𝑺','𝑫','𝑭','𝑮','𝑯','𝑱','𝑲','𝑳','𝒁','𝑿','𝑪','𝑽','𝑩','𝑵','𝑴'];
$Font_2 = ['𝑄','𝑊','𝐸','𝑅','𝑇','𝑌','𝑈','𝐼','𝑂','𝑃','𝐴','𝑆','𝐷','𝐹','𝐺','𝐻','𝐽','𝐾','𝐿','𝑍','𝑋','𝐶','𝑉','𝐵','𝑁','𝑀'];
$Font_3 = ['𝗤','𝗪','𝗘','𝗥','𝗧','𝗬','𝗨','𝗜','𝗢','𝗣','𝗔','𝗦','𝗗','𝗙','𝗚','𝗛','𝗝','𝗞','𝗟','𝗭','𝗫','𝗖','𝗩','𝗕','𝗡','𝗠'];
$Font_4 = ['𝖰','𝖶','𝖤','𝖱','𝖳','𝖸','𝖴','𝖨','𝖮','𝖯','𝖠','𝖲','𝖣','𝖥','𝖦','𝖧','𝖩','𝖪','𝖫','𝖹','𝖷','𝖢','𝖵','𝖡','𝖭','𝖬'];
$Font_5 = ['𝕼','𝖂','𝕰','𝕽','𝕵','𝚼','𝖀','𝕿','𝕺','𝕻','𝕬','𝕾','𝕯','𝕱','𝕲','𝕳','𝕴','𝕶','𝕷','𝖅','𝖃','𝕮','𝖁','𝕭','𝕹','𝕸'];
$Font_6 = ['𝔔','𝔚','𝔈','ℜ','𝔍','ϒ','𝔘','𝔗','𝔒','𝔓','𝔄','𝔖','𝔇','𝔉','𝔊','ℌ','ℑ','𝔎','𝔏','ℨ','𝔛','ℭ','𝔙','𝔅','𝔑','𝔐'];
$Font_7 = ['𝙌','𝙒','𝙀','𝙍','𝙏','𝙔','𝙐','𝙄','𝙊','𝙋','𝘼','𝙎','𝘿','𝙁','𝙂','𝙃','𝙅','𝙆','𝙇','𝙕','𝙓','𝘾','𝙑','𝘽','𝙉','𝙈'];
$Font_8 = ['𝘘','𝘞','𝘌','𝘙','𝘛','𝘠','𝘜','𝘐','𝘖','𝘗','𝘈','𝘚','𝘋','𝘍','𝘎','𝘏','𝘑','𝘒','𝘓','𝘡','𝘟','𝘊','𝘝','𝘉','𝘕','𝘔'];
$Font_9 = ['Q̶̶','W̶̶','E̶̶','R̶̶','T̶̶','Y̶̶','U̶̶','I̶̶','O̶̶','P̶̶','A̶̶','S̶̶','D̶̶','F̶̶','G̶̶','H̶̶','J̶̶','K̶̶','L̶̶','Z̶̶','X̶̶','C̶̶','V̶̶','B̶̶','N̶̶','M̶̶'];
$Font_10 = ['Q̷̷','W̷̷','E̷̷','R̷̷','T̷̷','Y̷̷','U̷̷','I̷̷','O̷̷','P̷̷','A̷̷','S̷̷','D̷̷','F̷̷','G̷̷','H̷̷','J̷̷','K̷̷','L̷̷','Z̷̷','X̷̷','C̷̷','V̷̷','B̷̷','N̷̷','M̷̷'];
$Font_11 = ['Q͟͟','W͟͟','E͟͟','R͟͟','T͟͟','Y͟͟','U͟͟','I͟͟','O͟͟','P͟͟','A͟͟','S͟͟','D͟͟','F͟͟','G͟͟','H͟͟','J͟͟','K͟͟','L͟͟','Z͟͟','X͟͟','C͟͟','V͟͟','B͟͟','N͟͟','M͟͟'];
$Font_12 = ['Q͇͇','W͇͇','E͇͇','R͇͇','T͇͇','Y͇͇','U͇͇','I͇͇','O͇͇','P͇͇','A͇͇','S͇͇','D͇͇','F͇͇','G͇͇','H͇͇','J͇͇','K͇͇','L͇͇','Z͇͇','X͇͇','C͇͇','V͇͇','B͇͇','N͇͇','M͇͇'];
$Font_13 = ['Q̤̤','W̤̤','E̤̤','R̤̤','T̤̤','Y̤̤','Ṳ̤','I̤̤','O̤̤','P̤̤','A̤̤','S̤̤','D̤̤','F̤̤','G̤̤','H̤̤','J̤̤','K̤̤','L̤̤','Z̤̤','X̤̤','C̤̤','V̤̤','B̤̤','N̤̤','M̤̤'];
$Font_14 = ['Q̰̰','W̰̰','Ḛ̰','R̰̰','T̰̰','Y̰̰','Ṵ̰','Ḭ̰','O̰̰','P̰̰','A̰̰','S̰̰','D̰̰','F̰̰','G̰̰','H̰̰','J̰̰','K̰̰','L̰̰','Z̰̰','X̰̰','C̰̰','V̰̰','B̰̰','N̰̰','M̰̰'];
$Font_15 = ['디','山','乇','尺','亇','丫','凵','工','口','ㄗ','闩','丂','刀','下','彑','⼶','亅','片','乚','乙','乂','亡','ム','乃','力','从'];
$Font_16= ['ዓ','ሠ','ይ','ዩ','ፐ','ሃ','ሀ','ፗ','ዐ','የ','ል','ና','ሏ','ፑ','ፘ','ዘ','ጋ','ኸ','ረ','ጓ','ጰ','ር','ህ','ፎ','በ','ጠ'];
$Font_17= ['Ꭷ','Ꮃ','Ꭼ','Ꮢ','Ꭲ','Ꭹ','Ꮜ','Ꮖ','Ꮻ','Ꮲ','Ꭺ','Ꮪ','Ꭰ','Ꮀ','Ꮐ','Ꮋ','Ꭻ','Ꮶ','Ꮮ','Ꮓ','Ꮱ','Ꮯ','Ꮩ','Ᏼ','N','Ꮇ'];
$Font_18= ['Ǫ','Ѡ','Σ','Ʀ','Ϯ','Ƴ','Ʋ','Ϊ','Ѳ','Ƥ','Ѧ','Ƽ','Δ','Ӻ','Ǥ','ⴼ','Ɉ','Ҟ','Ɫ','Ⱬ','Ӽ','Ҁ','Ѵ','Ɓ','Ɲ','ᛖ'];
$Font_19= ['ꐎ','ꅐ','ꂅ','ꉸ','ꉢ','ꌦ','ꏵ','ꀤ','ꏿ','ꉣ','ꁲ','ꌗ','ꅓ','ꊰ','ꁅ','ꍬ','ꀭ','ꂪ','꒒','ꏣ','ꉧ','ꊐ','ꏝ','ꃃ','ꊮ','ꂵ'];
$Font_20= ['ᘯ','ᗯ','ᕮ','ᖇ','ᙢ','ᖻ','ᑌ','ᖗ','ᗝ','ᑭ','ᗩ','ᔕ','ᗪ','ᖴ','ᘜ','ᕼ','ᒍ','ᖉ','ᒐ','ᘔ','᙭','ᑕ','ᕓ','ᗷ','ᘉ','ᗰ'];
$Font_21= ['ᑫ','ᗯ','ᗴ','ᖇ','Ꭲ','Ꭹ','ᑌ','Ꮖ','ᝪ','ᑭ','ᗩ','ᔑ','ᗞ','ᖴ','Ꮐ','ᕼ','ᒍ','Ꮶ','Ꮮ','Ꮓ','᙭','ᑕ','ᐯ','ᗷ','ᑎ','ᗰ'];
$Font_22= ['ℚ','Ꮤ','℮','ℜ','Ƭ','Ꮍ','Ʋ','Ꮠ','Ꮎ','⅌','Ꭿ','Ꮥ','ⅅ','ℱ','Ꮹ','ℋ','ℐ','Ӄ','ℒ','ℤ','ℵ','ℭ','Ꮙ','Ᏸ','ℕ','ℳ'];
$Font_23= ['Ԛ','ᚠ','ᛊ','ᚱ','ᛠ','ᚴ','ᛘ','ᛨ','θ','ᚹ','ᚣ','ᛢ','ᚦ','ᚫ','ᛩ','ᚻ','ᛇ','ᛕ','ᚳ','Z','ᚷ','ᛈ','ᛉ','ᛒ','ᚺ','ᚥ'];
$Font_24= ['𝓠','𝓦','𝓔','𝓡','𝓣','𝓨','𝓤','𝓘','𝓞','𝓟','𝓐','𝓢','𝓓','𝓕','𝓖','𝓗','𝓙','𝓚','𝓛','𝓩','𝓧','𝓒','𝓥','𝓑','𝓝','𝓜'];
$Font_25= ['𝒬','𝒲','ℰ','ℛ','𝒯','𝒴','𝒰','ℐ','𝒪','𝒫','𝒜','𝒮','𝒟','ℱ','𝒢','ℋ','𝒥','𝒦','ℒ','𝒵','𝒳','𝒞','𝒱','ℬ','𝒩','ℳ'];
$Font_26= ['ℚ','𝕎','𝔼','ℝ','𝕋','𝕐','𝕌','𝕀','𝕆','ℙ','𝔸','𝕊','𝔻','𝔽','𝔾','ℍ','𝕁','𝕂','𝕃','ℤ','𝕏','ℂ','𝕍','𝔹','ℕ','𝕄'];
$Font_27= ['Ｑ','Ｗ','Ｅ','Ｒ','Ｔ','Ｙ','Ｕ','Ｉ','Ｏ','Ｐ','Ａ','Ｓ','Ｄ','Ｆ','Ｇ','Ｈ','Ｊ','Ｋ','Ｌ','Ｚ','Ｘ','Ｃ','Ｖ','Ｂ','Ｎ','Ｍ'];
$Font_28= ['ǫ','ᴡ','ᴇ','ʀ','ᴛ','ʏ','ᴜ','ɪ','ᴏ','ᴘ','ᴀ','s','ᴅ','ғ','ɢ','ʜ','ᴊ','ᴋ','ʟ','ᴢ','x','ᴄ','ᴠ','ʙ','ɴ','ᴍ'];
$Font_29= ['𝚀','𝚆','𝙴','𝚁','𝚃','𝚈','𝚄','𝙸','𝙾','𝙿','𝙰','𝚂','𝙳','𝙵','𝙶','𝙷','𝙹','𝙺','𝙻','𝚉','𝚇','𝙲','𝚅','𝙱','𝙽','𝙼'];
$Font_30= ['ᵟ','ᵂ','ᴱ','ᴿ','ᵀ','ᵞ','ᵁ','ᴵ','ᴼ','ᴾ','ᴬ','ˢ','ᴰ','ᶠ','ᴳ','ᴴ','ᴶ','ᴷ','ᴸ','ᶻ','ˣ','ᶜ','ⱽ','ᴮ','ᴺ','ᴹ'];
$Font_31= ['Ⓠ','Ⓦ','Ⓔ','Ⓡ','Ⓣ','Ⓨ','Ⓤ','Ⓘ','Ⓞ','Ⓟ','Ⓐ','Ⓢ','Ⓓ','Ⓕ','Ⓖ','Ⓗ','Ⓙ','Ⓚ','Ⓛ','Ⓩ','Ⓧ','Ⓒ','Ⓥ','Ⓑ','Ⓝ','Ⓜ️'];
$Font_32= ['🅀','🅆','🄴','🅁','🅃','🅈','🅄','🄸','🄾','🄿','🄰','🅂','🄳','🄵','🄶','🄷','🄹','🄺','🄻','🅉','🅇','🄲','🅅','🄱','🄽','🄼'];
$Font_33= ['🅠','🅦','🅔','🅡','🅣','🅨','🅤','🅘','🅞','🅟','🅐','🅢','🅓','🅕','🅖','🅗','🅙','🅚','🅛','🅩 ','??','🅒','🅥','🅑','🅝','🅜'];
$Font_34= ['🆀','🆆','🅴','🆁','🆃','🆈','🆄','🅸','🅾️','🅿️','🅰️','🆂','🅳','🅵','🅶','🅷','🅹','🅺','🅻','🆉','🆇','🅲','🆅','🅱️','🅽','🅼'];
$Font_35= ['🇶 ','🇼 ','🇪 ','🇷 ','🇹 ','🇾 ','🇺 ','🇮 ','🇴 ','🇵 ','🇦 ','🇸 ','🇩 ','🇫 ','🇬 ','🇭 ','🇯 ','🇰 ','🇱 ','🇿 ','🇽 ','🇨 ','🇻 ','🇧 ','🇳 ','🇲 '];
//
$nn = str_replace($Eng,$Font_0,$matn);
$a = str_replace($Eng,$Font_1,$matn);
$b = str_replace($Eng,$Font_2,$matn);
$c = trim(str_replace($Eng,$Font_3,$matn));
$d = str_replace($Eng,$Font_4,$matn);
$e = str_replace($Eng,$Font_5,$matn);
$f = str_replace($Eng,$Font_6,$matn);
$g = str_replace($Eng,$Font_7,$matn);
$h = str_replace($Eng,$Font_8,$matn);
$i = str_replace($Eng,$Font_9,$matn);
$j = str_replace($Eng,$Font_10,$matn);
$k = str_replace($Eng,$Font_11,$matn);
$l = str_replace($Eng,$Font_12,$matn);
$m = str_replace($Eng,$Font_13,$matn);
$n = str_replace($Eng,$Font_14,$matn);
$o = str_replace($Eng,$Font_15,$matn);
$p= str_replace($Eng,$Font_16,$matn);
$q= str_replace($Eng,$Font_17,$matn);
$r= str_replace($Eng,$Font_18,$matn);
$s= str_replace($Eng,$Font_19,$matn);
$t= str_replace($Eng,$Font_20,$matn);
$u= str_replace($Eng,$Font_21,$matn);
$v= str_replace($Eng,$Font_22,$matn);
$w= str_replace($Eng,$Font_23,$matn);
$x= str_replace($Eng,$Font_24,$matn);
$y= str_replace($Eng,$Font_25,$matn);
$z= str_replace($Eng,$Font_26,$matn);
$aa= str_replace($Eng,$Font_27,$matn);
$ac= str_replace($Eng,$Font_28,$matn);
$ad= str_replace($Eng,$Font_29,$matn);
$af= str_replace($Eng,$Font_30,$matn);
$ag= str_replace($Eng,$Font_31,$matn);
$ah= str_replace($Eng,$Font_32,$matn);
$am= str_replace($Eng,$Font_33,$matn);
$as= str_replace($Eng,$Font_34,$matn);
$pol= str_replace($Eng,$Font_35,$matn);
$readyfont = "1 - `$result[1]`
2 - `$result[2]`
3 - `$result[3]`
4 - `$result[4]`
5 - `$result[5]`
6 - `$result[6]`
7 - `$result[7]`
8 - `$result[8]`
9 - `$result[9]`
10 - `$result[10]`
11 - `$result[11]`
12 - `$result[12]`
13 - `$result[13]`
14 - `$result[14]`
15 - `$result[15]`
16 - `$result[16]`
17 - `$result[17]`
18 - `$result[18]`
19 - `$result[19]`
20 - `$result[20]`
21 - `$result[21]`
22 - `$result[22]`
23 - `$result[23]`
24 - `$result[24]`
25 - `$result[25]`
26 - `$result[26]`
27 - `$result[27]`
28 - `$result[28]`
29 - `$result[29]`
30 - `$result[30]`
31 - `$result[31]`
32 - `$result[32]`
33 - `$result[33]`
34 - `$result[34]`
35 - `$result[35]`
36 - `$result[36]`
37 - `$result[37]`
38 - `$result[38]`
39 - `$result[39]`
40 - `$result[40]`
41 - `$result[41]`
42 - `$result[42]`
43 - `$result[43]`
44 - `$result[44]`
45 - `$result[45]`
46 - `$result[46]`
47 - `$result[47]`
48 - `$result[48]`
49 - `$result[49]`
50 - `$result[50]`
51 - `$result[51]`
52 - `$result[52]`
53 - `$result[53]`
54 - `$result[54]`
55 - `$result[55]`
56 - `$result[56]`
57 - `$result[57]`
58 - `$result[58]`
59 - `$result[59]`
60 - `$result[60]`
61 - `$result[61]`
62 - `$result[62]`
63 - `$result[63]`
64 - `$result[64]`
65 - `$result[65]`
66 - `$result[66]`
67 - `$result[67]`
68 - `$result[68]`
69 - `$result[69]`
70 - `$result[70]`
71 - `$result[71]`
72 - `$result[72]`
73 - `$result[93]`
74 - `$result[74]`
75 - `$result[75]`
76 - `$result[76]`
77 - `$result[77]`
78 - `$result[78]`
79 - `$result[79]`
80 - `$result[80]`
81 - `$result[81]`
82 - `$result[82]`
83 - `$result[83]`
84 - `$result[84]`
85 - `$result[85]`
86 - `$result[86]`
87 - `$result[87]`
88 - `$result[88]`
89 - `$result[89]`
90 - `$result[90]`
91 - `$result[91]`
92 - `$result[92]`
93 - `$nn`
94 - `$a`
95 - `$b`
96 - `$c`
97 - `$d`
98 - `$e`
99 - `$f`
100 - `$g`
101 - `$h`
102 - `$i`
103 - `$j`
104 - `$k`
105 - `$l`
106 - `$m`
107 - `$n`
108 - `$o`
109 - `$p`
110 - `$q`
111 - `$r`
112 - `$s`
113 - `$t`
114 - `$u`
115 - `$v`
116 - `$w`
117 - `$x`
118 - `$z`
119 - `$aa`
120 - `$ac`
121 - `$ad`
122 - `$af`
123 - `$ah`
124 - `$am`
125 - `$pol`
";
bot('sendmessage',[
'chat_id'=>$from_id, 
'text'=> "» فونت انگلیسی شما آماده است. برای کپی روی هر کدام کلیک کنید !
$readyfont

", 
'parse_mode'=> 'markdown','reply_markup'=>$abzar,        
]);
break;
//===============================filter=============================
case 'filter':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->photo)) {
$photo = $message->photo;    
$file_id = $photo[count($photo)-1]->file_id;    
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
$db->query("UPDATE user SET link = '$meysam' WHERE id = $chat_id");
Bot('sendmessage', [
                'chat_id' => $chat_id,
              'text' => "✅عکس تایید شد
🖊حالا یکی از افکت های زیر رو انتخاب کن",
                'parse_mode' => "html",
                 'reply_markup' =>json_encode(['keyboard'=>[
[['text'=>"boost"],['text'=>"bubbles"],['text'=>"blur"],['text'=>"vintage"],['text'=>"colorise"],['text'=>"sepia"]],
[['text'=>"sepia2"],['text'=>"sharpen"],['text'=>"emboss"],['text'=>"concentrate"],['text'=>"hermajesty"],['text'=>"everglow"]],
[['text'=>"freshblue"],['text'=>"tender"],['text'=>"dream"],['text'=>"cool"],['text'=>"old"],['text'=>"old2"]],
[['text'=>"old3"],['text'=>"frozen"],['text'=>"forest"],['text'=>"rain"],['text'=>"light"],['text'=>"orangepeel"]],
[['text'=>"aqua"],['text'=>"darken"],['text'=>"boost2"],['text'=>"summer"],['text'=>"gray"],['text'=>"retro"]],
[['text'=>"antique"],['text'=>"country"],['text'=>"blackwhite"],['text'=>"washed"]],
            [['text' => '🔙بازگشت']],
            ], 'resize_keyboard' => true])
]);
    
} else{
Bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "عکس بفرست نه اینو"    ,
                'parse_mode' => "html",
                'reply_markup'=>$abzar,        
]);                 
}
break;   
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//============================ tabdil =============================
case 'g2m':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->video_note)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$video_note = $message->video_note;    
$file_id = $video_note->file_id;    
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.mp4",file_get_contents("$meysam"));
bot('sendVideo',[
  'chat_id'=>$chat_id,
	'video'=>new CURLFile("$chat_id.mp4"),

	'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
        ]);
        unlink("$chat_id.mp4");
}
break;
//============================ tabdil =============================
case 'm2g':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->video)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$video = $message->video;    
$file_id = $video->file_id;    
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.mp4",file_get_contents("$meysam"));
bot('sendVideoNote',[
  'chat_id'=>$chat_id,
	'video_note'=>new CURLFile("$chat_id.mp4"),

	'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
        ]);
        unlink("$chat_id.mp4");
}
break;
//============================ tabdil =============================
case 'm2s':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$voice1 = file_get_contents('http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text='.urlencode($text));
$voice2 = file_put_contents("$chat_id.ogg",$voice1);
bot('sendvoice',[
'chat_id'=>$chat_id,
'voice'=> new CURLFile("$chat_id.ogg"),
'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
]);
        unlink("$chat_id.ogg");

break;
//============================ tabdil =============================
case 's2a':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->sticker)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$sticker = $message->sticker->file_id;
$get = bot('getfile',['file_id'=>$sticker]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.png",file_get_contents("$meysam"));
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>new CURLFile("$chat_id.png"),
'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
]);
unlink("$chat_id.png");
}
break;

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//============================ tabdil =============================
case 'a2s':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->photo)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
$get = Bot('getFile',['file_id'=> $file]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.webp",file_get_contents("$meysam"));
bot('SendSticker',[
'chat_id'=>$chat_id,
'sticker'=>new CURLFile("$chat_id.webp"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.webp");
}
break;
//============================ tabdil =============================
case 'v2s':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->voice)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$voice = $message->voice;
$file = $voice->file_id;
$get = bot('getfile',['file_id'=>$file]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.mp3",file_get_contents("$meysam"));
bot('sendaudio',[
'chat_id'=>$chat_id,
'audio'=>new CURLFile("$chat_id.mp3"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.mp3");
}
break;
//============================ tabdil =============================
case 's2v':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->audio)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$audio = $message->audio;
$file = $audio->file_id;
$get = bot('getfile',['file_id'=>$file]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.ogg",file_get_contents("$meysam"));
bot('sendvoice',[
'chat_id'=>$chat_id,
'voice'=>new CURLFile("$chat_id.ogg"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.ogg");
}
break;

//============================ tabdil =============================
case 'f2g':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->video)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$video = $message->video;    
$file_id = $video->file_id;    
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.gif",file_get_contents("$meysam"));
bot('senddocument',[
  'chat_id'=>$chat_id,
	'document'=>new CURLFile("$chat_id.gif"),

	'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
        ]);
        unlink("$chat_id.gif");
}
break;
//============================ tabdil =============================
case 'f2a':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->video)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$video = $message->video;    
$file_id = $video->file_id;    
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.mp3",file_get_contents("$meysam"));
bot('sendaudio',[
  'chat_id'=>$chat_id,
	'audio'=>new CURLFile("$chat_id.mp3"),

	'caption'=>"➕ عملیات موفقیت آمیز بود.",'reply_markup'=>$abzar,        
        ]);
        unlink("$chat_id.mp3");
}
break;
//============================ tabdil =============================
case 'a2f':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(isset($message->photo)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
$get = Bot('getFile',['file_id'=> $file]);
$patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.png",file_get_contents("$meysam"));
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("$chat_id.png"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.png");
}
break;
//============================ tabdil =============================
case 'f2s':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.png",file_get_contents("$meysam"));
bot('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>new CURLFile("$chat_id.png"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.png");

break;
//============================ tabdil =============================
case 'f2aa':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"<i>در حال پردازش صبور باشید ..</i>",
  'parse_mode'=>"HTML",
	 ]);     
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
$meysam = "https://api.telegram.org/file/bot".API_KEY."/$patch";
file_put_contents("$chat_id.png",file_get_contents("$meysam"));
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>new CURLFile("$chat_id.png"),'reply_markup'=>$abzar,        
]);
    unlink("$chat_id.png");

break;
//=========================================================
case 'nim1':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
if(!preg_match("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>  "لینک اشتباه است !",
  'parse_mode'=>"HTML",'reply_markup'=>$abzar,
	 ]);                    

        
    }else{
        
       
       $info = json_decode(file_get_contents("https://meysam72.tk/api/nimbaha.php?link=" . $text))->download_link;
        
          bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لینک شما نیم بها شد !\n\nLink :\n\n$info",
  'parse_mode'=>"HTML",'reply_markup'=>$abzar,
	 ]);            

    }
break;


/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=========================================================
case 'filesaz1':    
$db->query("UPDATE user SET token = '$text' WHERE id = $chat_id");    
$db->query("UPDATE user SET step = 'filesaz2' WHERE id = $chat_id");
file_put_contents("$chat_id.$text",file_get_contents(""));
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"خب حالا متنی که میخوای توی فایل قرار بدم رو بفرست 🖖",
  'parse_mode'=>"HTML",'reply_markup'=>$back,
	 ]);    

break;
//=========================================================
case 'filesaz2':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$result = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM user WHERE id = '$chat_id' LIMIT 1"));
$token = $result['token'];
file_put_contents("$chat_id.$token","$text");
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile("$chat_id.$token"),'reply_markup'=>$abzar,
	 ]);  
unlink("$chat_id.$token");
$db->query("UPDATE user SET token = 'none' WHERE id = $chat_id");
break;
//=========================================================
case 'gif1':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$i1 = rand(1,10);
$ljo = file_get_contents("https://api.codebazan.ir/image/?type=gif&text=$text"."");
$gi1 = json_decode($ljo,true);
$link1 = $gi1["giflink$i1"];
bot('SendDocument',[
 'chat_id'=>$chat_id,
 'document'=>"$link1",'caption' =>"
گیف شما ساخته شد ✅",'reply_markup'=>$abzar,
	 ]);  
break;
//=========================================================
case 'encode1':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$encode = base64_encode($text);
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"`$encode`", 'parse_mode'=>'MarkDown',  'reply_markup'=>$abzar,
	 ]);  
break;
//=========================================================
case 'decode1':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$decode = base64_decode($text);
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"`$decode`", 'parse_mode'=>'MarkDown',  
'reply_markup'=>$abzar,	 ]);  
break;



/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=========================================================
case 'corona1':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$crona = file_get_contents("https://api.codebazan.ir/corona/?type=country&country=$text");
	$cronaz = json_decode($crona,true);
		$last_updated = $cronaz["result"]["last_updated"];
		$country = $cronaz["result"]["country"];
		$cases = $cronaz["result"]["cases"];
		$deaths = $cronaz["result"]["deaths"];
		$recovered = $cronaz["result"]["recovered"];

bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"♾ کشور تارگت :   $country

🌀تعداد مبتلایان :   $cases

🚼 تعداد افراد فوت شده :  $deaths

🛂تعداد افراد بهبود یافته :  $recovered

🆙 آخرین اپدیت :
$last_updated

درصورت خالی بودن یعنی یا اطلاعات را بد وارد کردید یا ان کشور در وبسرویس وجود ندارد.",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'farsi2english':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=fa&to=en&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'english2farsi':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=en&to=fa&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=======================================================================
case 'farsi2torki':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=fa&to=tr&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'torki2farsi':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=tr&to=fa&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=======================================================================
case 'farsi2rusi':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=fa&to=ru&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'rusi2farsi':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=ru&to=fa&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;


/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//=======================================================================
case 'farsi2farance':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=fa&to=fr&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'farance2farsi':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$text2 = str_replace(' ','%20',$text);
$link = json_decode(file_get_contents("https://api.codebazan.ir/translate/?type=json&from=fr&to=fa&text=$text2"),true);
$link2 = $link["result"];
bot('Sendmessage',[
 'chat_id'=>$chat_id,
  'text'=>"text = $text
  
translate =`$link2`

",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;
//=========================================================
case 'sitescreen':    
$db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
$ound = "https://api.codebazan.ir/webshot/?text=1000&domain=".$text;
bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$ound,
'caption'=>"$botusername @golabinumbot",'parse_mode'=>"MarkDown",
'reply_markup'=>$abzar,	 ]);  
break;






/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/


//============================ I D =============================
    case 'id':
        $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
        $forward_id = $update->message->forward_from->id;
        $forward_chat = $update->message->forward_from;
        $forward_chat_username = $update->message->forward_from->username;
        $forward_chat_name = $update->message->forward_from->first_name;
        if ($forward_id != null) {
            $answer = " <b> ✅ آیدی عددی شخص مورد نظر شما دریافت شد : </b>

🔒 آیدی عددی : <code>$forward_id</code> 

👤نام کاربری : @$forward_chat_username 

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $soalat_motedavel, NULL);
        } else {
            $answer = "<b> ⚠️ متاسفانه حساب مربوط به این پیام به صورت مخفی است و نمیتوان آیدی عددی آن را به دست آورد. </b>

✅ لطفا برای بدست آوردن آیدی عددی این اکانت تلگراف نصب کنید و یا از این ربات استفاده کنید : @usinfobot

🍐 $botusername @golabinumbot";
            SendMessage($chat_id, $answer, $message_id, 'html', $soalat_motedavel, NULL);
        }
        break;
		
	case "searchuser":	
        $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
        $answer = "در حال جستجو اطلاعات اکانت درخواستی شما در سامانه شکار ⏳";
		SendMessage($chat_id, $answer, $message_id, 'html', NULL, NULL);
		$result = searchuser($text);
        if ($result != "false") {
            $answer =  "<b>⚠️ متاسفانه اطلاعات کاربر مورد نظر در سامانه شکار موجود است. </b>

$result

✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
        } else {
    $answer = "<b>مشخصات اکانت مورد نظرتان در دیتابیس لو رفته سامانه شکار موجود نیست ! 🙂 </b>

⭕️نبود شماره ی شخص در ربات 3 دلیل دارد

1 : شماره ی شخص مجازی و برای ایران نیست
2 : شماره ی شخص بین 50 میلیون شماره ی لو رفته نیست
3 : شما با ایدی عددی شخص جستجو نزدید لطفا فقط با ایدی عددی جستجو بزنید!
✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
		} 
	break;	
	
    case "search":
        $db->query("UPDATE user SET step = 'none' WHERE id = $chat_id");
        $answer = "در حال جستجو اطلاعات اکانت درخواستی شما در سامانه شکار ⏳";
        SendMessage($chat_id, $answer, $message_id, 'html', NULL, NULL);
        $forward_id = $update->message->forward_from->id;
        $forward_chat = $update->message->forward_from;
        $forward_chat_username = $update->message->forward_from->username;
        $forward_chat_name = $update->message->forward_from->first_name;
        if (($update->message->forward_sender_name) and $forward_chat == null){
		
            $answer =  "⚠️ متاسفانه حساب مربوط به این پیام به صورت مخفی است و نمیتوان شماره آن را به دست آورد. 

🍐 $botusername @golabinumbot";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
			exit();
		}
		if($forward_id){
        $result = search($forward_id);
        if ($result != "false") {
            $answer =  "<b>⚠️ متاسفانه اطلاعات کاربر مورد نظر در سامانه شکار موجود است. </b>

$result

✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
        } else {
    $answer = "<b>مشخصات اکانت مورد نظرتان در دیتابیس لو رفته سامانه شکار موجود نیست ! 🙂 </b>

⭕️نبود شماره ی شخص در ربات 3 دلیل دارد

1 : شماره ی شخص مجازی و برای ایران نیست
2 : شماره ی شخص بین 50 میلیون شماره ی لو رفته نیست
3 : شما با ایدی عددی شخص جستجو نزدید لطفا فقط با ایدی عددی جستجو بزنید!
✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
		}}
		if( filter_var ( $text , FILTER_VALIDATE_INT ) ){
        $result = search($text);
        if ($result != "false") {
            $answer =  "<b>⚠️ متاسفانه اطلاعات کاربر مورد نظر در سامانه شکار موجود است. </b>

$result

✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
        } else {
    $answer = "<b>مشخصات اکانت مورد نظرتان در دیتابیس لو رفته سامانه شکار موجود نیست ! 🙂 </b>

⭕️نبود شماره ی شخص در ربات 3 دلیل دارد

1 : شماره ی شخص مجازی و برای ایران نیست
2 : شماره ی شخص بین 50 میلیون شماره ی لو رفته نیست
3 : شما با ایدی عددی شخص جستجو نزدید لطفا فقط با ایدی عددی جستجو بزنید!
✅Search time: 0.$a4

🍐 $botusername @golabinumbot
";
            SendMessage($chat_id, $answer, $message_id, 'html', $menu, NULL);
        }}
        break;
}
}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
?>