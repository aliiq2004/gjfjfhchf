<?php 
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('bot.madeline');
$MadelineProto->start();
ob_start();
$API_KEY = "5253090075:AAHFOCSdHSWC03qwP0Lb1Oar-71J437FlTg";
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
echo file_get_contents("https://api.telegram.org/bot$API_KEY/getme?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);

global $MadelineProto;
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{return json_decode($res);}}

$update  = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$text    = $message->text;
 $data = $update->callback_query->data;
$chat_id  = $message->chat->id;
$name   = $message->from->first_name;
$from_id = $message->from->id;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
mkdir("Alihassan");
$Ali = $message->message_id;
$Ali0= file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$Ali1= json_decode($Ali0, true);
$Ali2 = $Ali1['result']['status'];
$ch = file_get_contents("Alihassan/$chat_id.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
if($Ali2 != "creator" and $Ali2 != "administrator"){
bot('DeleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$Ali
]);
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"- [$name](tg://user?id=$from_id) ؛ ❤️

- لايمكنك ارسال اي رسالة هنا لانك غير مشترك في قناة المجموعة ؛ ✅

- اشترك الان من هنا ؛ [@$ch] 📡",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>" اضغط هنا للاشتراك ✅",'url'=>"https://t.me/$ch"]]
]
])
]);return false;}}
$tws = "kk";
$kna = "kk";
$Alihassan2004 = 5202630832;

$LIST = explode(' ', file_get_contents('list.txt'));
if($update and !in_array('@'.$user, $LIST)){ file_put_contents('list.txt', '@'.$user . ' ', FILE_APPEND); }
$xsPHP = file_get_contents('list.txt');

if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"- [$name](tg://user?id=$from_id) ؛ ❤

- اهلا بك في بوت الاشتراك الاجباري ؛ 👥

- اضفني الى مجموعتك وقم برفعي مشرف ؛ 👨‍✈️

- بعدها ارسل { ت } واتبع التعليمات التي ارسلها اليك ؛ 🈯️

- لتعطيل البوت ارسل داخل مجموعتك كلمة { تعط } ؛ ❎

- اذا واجهتك مشكلة راسلني ؛ 📬 
- [@$tws] ؛ 📮
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[- اضغط هنا وتابع جديدنا ؛ 📡](t.me/$kna)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"📡 - تابع جديدنا - 📡",'url'=>"https://t.me/$kna"]],
]
])
]);
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
}
if($Ali2 == "creator" or $Ali2 == "administrator" ){
$S = file_get_contents("Alihassan/S$chat_id $from_id.txt");
if($text == "ت"){
file_put_contents("Alihassan/S$chat_id $from_id.txt", "1");
file_put_contents("Alihassan/$chat_id.txt", "");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- [$name](tg://user?id=$from_id) ؛ ❤️

- الان ارسل معرف قناة المجموعة التي لايمكن للاعضاء التكلم الا بعد الاشتراك فيها ؛ ✅

- ملاحظة : ارسل معرف القناة بدون { @ } ؛ ⁉️
- مثال ؛ [$kna] ؛ ☑️",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
]);
}
if($text and $S == "1"){
file_put_contents("Alihassan/$chat_id.txt", "$text");
file_put_contents("Alihassan/S$chat_id $from_id.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"- [$name](tg://user?id=$from_id) ؛ ✓✓

- تم حفظ قناة المجموعة بنجاح ؛ ✅

- الان تأكد من ان البوت ادمن في القناة ليعمل بالشكل الصحيح",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
]);
}
if($text == "تعط"){
file_put_contents("Alihassan/$chat_id.txt", "");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- [$name](tg://user?id=$from_id) ؛ ❤️

- تم تعطيل البوت بنجاح ؛ ✅",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
]);
}
if($text == 'تاك للكل')
{
		$pwr = $MadelineProto->channels->getParticipants(['channel' => InputChannel]);
							$users = '';
							foreach($pwr['participants'] as $user){
								if(isset($user['user']['username'])){
									$users .= '@'.$user['user']['username']." - ";
								} else {
									continue;
								}
							}
							$MadelineProto->messages->sendMessage([
								'peer'=>$update,
								'message'=>$users,
								'reply_to_msg_id'=>$update['message']['id'],
								'reply_markup'=>[
            		    'inline_keyboard'=>[
            		        [['text'=>'▫️ تابعنا - ','url'=>'https://t.me/kslvnslxmxl']]
            		        ]
            		    ]
								]);
}
}
$Alihassan = explode("\n",file_get_contents("Ali.txt"));
$Ali = count($Alihassan)-1;
$Alihassan2004 = file_get_contents("Alihassan2004.txt");
if ($update && !in_array($chat_id, $Alihassan)) {
    file_put_contents("Ali.txt", $chat_id."\n",FILE_APPEND);
  }
if($text == "المشتركين" and $chat_id == $Alihassan2004){
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❖￤عدد مشتركين بوتك سيدي المطور هو { $Ali } مشترك ؛ 👥"
    ]);
}
if($text == "نشر" and $chat_id == $Alihassan2004){
 file_put_contents("Alihassan2004.txt", "Ali");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❖￤ارسل رسالتك الان سيدي المطور وسيتم ارسالها الى { $Ali } مشترك ؛ 📬"
    ]);
}
if($text != "نشر" and $Alihassan2004 == "Ali" and $chat_id == $Alihassan2004){
  for ($i=0; $i < count($Alihassan); $i++) { 
    bot('sendMessage',[
      'chat_id'=>$Alihassan[$i],
      'text'=>$text,
    ]);
  }
  unlink("Alihassan2004.txt");
}

