<?php

ob_start();
$API_KEY="5229692392:AAEY2GhZtyHgXwDfcqWIh4J_ZQB0ui-1YxU";
echo "api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update   = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$from_id  = $message->from->id;
$chat_id  = $message->chat->id;
$text     = $message->text;
$data     = $update->callback_query->data;
$inline   = $update->inline_query->query;
$id       = $update->inline_query->from->id;
$msg_id   = $update->inline_query->inline_message_id;
$username = $update->inline_query->from->username;
$cuser    = $update->callback_query->from->username;
$cid      = $update->callback_query->from->id;
if ($inline) {
    $ex = explode(" ", $inline);
    $user = trim($ex[0],"@");
    $wh = str_replace($ex[0], $wh, $inline);
    bot('answerInlineQuery',[
            'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>"هـذه الـهـمـسـة خـاصـة لـ $user 😉",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هـذه الـهـمـسـة خـاصـة لـ $user 😉"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'👁 عـرض الـهـمـسـة','callback_data'=>$user."or".$username."or".$wh]
                ],
             ]]
          ]])
        ]);
}
if ($data) {
    $ex = explode("or", $data);
    if ($cuser == $ex[0] or $cuser == $ex[1] or $cid == $ex[0]) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$ex[2],
            'show_alert'=>true
            ]);
    }
   if ($cuser != $ex[0] or $cuser != $ex[1] or $cid != $ex[0]) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"الـهـمـسـة لـيـسـة لـك عـزيـزي 🖖",
            'show_alert'=>true
            ]);
    }
}
if ($text == "/start" or $text == "/start") {
	bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"
مـرحـبـا، بـك فـي بـوت اهـمـسـلـي 📝

تـسـتطيع ارسـال رسـالة بـشـكل سـري

لـايـمـكـن لـلـغـيـر الـاطـلـاع عـلـيـهـا 🔖

- /help
",
		'reply_markup'=>json_encode([
			'inline_keyboard'=>[
			[['text' => "✍ اكـتـب هـمـسـة لـصـديـق", 'switch_inline_query' => "اكـتب مـعـرف الـصـديـق ثـم الـرسـالـة 🤓"]]
			]
		])
]);
}
if ($text == "/help" or $text == "/help") {
	bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"
فكرة البوت يمكنك في المجموعات
مـن ارسـال رسـالة لـاشخاص داخل
الـمجموعة بشكل سـري لـايمك لغير
انـــــــــ يـطـلـع عــلـى الـرسـالـة 🤓

كـيـفـيـة اسـتـخـدام الـبـوت ⚙
مـن داخـل الـمـجـمـوعـة اكـتـب

`@A073ABOT @vn_zz  الرسالة هنا`
",
		'reply_markup'=>json_encode([
			'inline_keyboard'=>[
			[['text' => "✍ اكـتـب هـمـسـة لـصـديـق", 'switch_inline_query' => "اكـتب مـعـرف الـصـديـق ثـم الـرسـالـة 🤓"]]
			]
		])
]);
}