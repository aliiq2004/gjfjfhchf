<?php
<!-- telegram: @corup / @api_web -->
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
global $MadelineProto;
class tagBot extends \danog\MadelineProto\EventHandler
{
    public function __construct($MadelineProto)
    {
        parent::__construct($MadelineProto);
    }
    public function onUpdateNewChannelMessage($update)
    {
        $this->onUpdateNewMessage($update);
    }
    public function onUpdateNewMessage($update)
    {
        if (isset($update['message']['out']) && $update['message']['out']) {
            return;
        }
        if (isset($update['message']['data']) && $update['message']['date'] + 5 < time()) {
            return;
        }
				$from_id = isset($update['message']['from_id']) ? $update['message']['from_id'] : null;
        $message = isset($update['message']['message']) ? $update['message']['message'] : '';
				global $MadelineProto;       
				try {
					$up = $MadelineProto->get_info($update);
					if($up['type'] == 'user'){
						$json = json_decode(file_get_contents('https://api.telegram.org/bot5253090075:AAHFOCSdHSWC03qwP0Lb1Oar-71J437FlTg/getchatmember?chat_id=@kslvnslxmxl&user_id='.$from_id));
	        	if($json->result->status == 'left'){
	        		$MadelineProto->messages->sendMessage([
	        			'peer'=>$update,
	        			'message'=>'- عليك الاشتراك في القناة لأستخدام البوت : @kslvnslxmxl'
	        			]);
	        			exit();
	        	}
					  if ($message=="/start"){
					      $this->messages->sendMessage([
					      "peer"=>$update,
					      "message"=>"مرحباً بك . \n▫️يقوم البوت بعمل تاك ( Mention : أشارة ) ، لكل اعضاء المجموعه \n▪️ فقط قم بأضافة البوت الى المجموعة وارسل /tagall\n\n -",
					      'reply_markup'=>[
            		    'inline_keyboard'=>[
            		        [['text'=>'▫️ تابعنا - ','url'=>'https://t.me/kslvnslxmxl']]
            		        ]
            		    ]
					      ]);
					  }
					} elseif($up['type'] == 'supergroup'){
						if(isset($update['message']['action']) and $update['message']['action']['_'] == 'messageActionChatAddUser'){
							if($update['message']['action']['users'][0] == 641624348){
							$this->messages->sendMessage([
					      	"peer"=>$update,
					      	"message"=>"مرحباً بك . \n▫️يقوم البوت بعمل تاك ( Mention : أشارة ) ، لكل اعضاء المجموعه \n▪️ فقط قم بأضافة البوت الى المجموعة وارسل /tagall\n\n -",
					      	'reply_to_msg_id'=>$update['message']['id'],
					      	'reply_markup'=>[
            		    'inline_keyboard'=>[
            		        [['text'=>'▫️ تابعنا - ','url'=>'https://t.me/kslvnslxmxl']]
            		        ]
            		    ]
					      ]);
							}
						}
						if($message == '/tagall' or $message == '/tagall@tagbbot'){
							$json = json_decode(file_get_contents('https://api.telegram.org/bot5253090075:AAHFOCSdHSWC03qwP0Lb1Oar-71J437FlTg/getchatmember?chat_id=@kslvnslxmxl&user_id='.$from_id));
		        	if($json->result->status == 'left'){
		        		$MadelineProto->messages->sendMessage([
		        			'peer'=>$update,
		        			'message'=>'- عليك الاشتراك في القناة لأستخدام البوت : @kslvnslxmxl',
		        			'reply_to_msg_id'=>$update['message']['id'],
		        			]);
		        			exit();
		        	}
							$pwr = $MadelineProto->get_pwr_chat($update);
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
				} catch (Exception $e) {
				    echo $e->getMessage();
				    }
				  }
}

$MadelineProto->start();
$MadelineProto->setEventHandler('\tagBot');
$MadelineProto->loop(-1);
; <?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
global $MadelineProto;
class tagBot extends \danog\MadelineProto\EventHandler
{
    public function __construct($MadelineProto)
    {
        parent::__construct($MadelineProto);
    }
    public function onUpdateNewChannelMessage($update)
    {
        $this->onUpdateNewMessage($update);
    }
    public function onUpdateNewMessage($update)
    {
        if (isset($update['message']['out']) && $update['message']['out']) {
            return;
        }
        if (isset($update['message']['data']) && $update['message']['date'] + 5 < time()) {
            return;
        }
				$from_id = isset($update['message']['from_id']) ? $update['message']['from_id'] : null;
        $message = isset($update['message']['message']) ? $update['message']['message'] : '';
				global $MadelineProto;       
				try {
					$up = $MadelineProto->get_info($update);
					if($up['type'] == 'user'){
						$json = json_decode(file_get_contents('https://api.telegram.org/bot5253090075:AAHFOCSdHSWC03qwP0Lb1Oar-71J437FlTg/getchatmember?chat_id=@kslvnslxmxl&user_id='.$from_id));
	        	if($json->result->status == 'left'){
	        		$MadelineProto->messages->sendMessage([
	        			'peer'=>$update,
	        			'message'=>'- عليك الاشتراك في القناة لأستخدام البوت : @kslvnslxmxl'
	        			]);
	        			exit();
	        	}
					  if ($message=="/start"){
					      $this->messages->sendMessage([
					      "peer"=>$update,
					      "message"=>"مرحباً بك . \n▫️يقوم البوت بعمل تاك ( Mention : أشارة ) ، لكل اعضاء المجموعه \n▪️ فقط قم بأضافة البوت الى المجموعة وارسل /tagall\n\n -",
					      'reply_markup'=>[
            		    'inline_keyboard'=>[
            		        [['text'=>'▫️ تابعنا - ','url'=>'https://t.me/kslvnslxmxl']]
            		        ]
            		    ]
					      ]);
					  }
					} elseif($up['type'] == 'supergroup'){
						if(isset($update['message']['action']) and $update['message']['action']['_'] == 'messageActionChatAddUser'){
							if($update['message']['action']['users'][0] == 641624348){
							$this->messages->sendMessage([
					      	"peer"=>$update,
					      	"message"=>"مرحباً بك . \n▫️يقوم البوت بعمل تاك ( Mention : أشارة ) ، لكل اعضاء المجموعه \n▪️ فقط قم بأضافة البوت الى المجموعة وارسل /tagall\n\n -",
					      	'reply_to_msg_id'=>$update['message']['id'],
					      	'reply_markup'=>[
            		    'inline_keyboard'=>[
            		        [['text'=>'▫️ تابعنا - ','url'=>'https://t.me/kslvnslxmxl']]
            		        ]
            		    ]
					      ]);
							}
						}
						if($message == '/tagall' or $message == '/tagall@tagbbot'){
							$json = json_decode(file_get_contents('https://api.telegram.org/bot5253090075:AAHFOCSdHSWC03qwP0Lb1Oar-71J437FlTg/getchatmember?chat_id=@kslvnslxmxl&user_id='.$from_id));
		        	if($json->result->status == 'left'){
		        		$MadelineProto->messages->sendMessage([
		        			'peer'=>$update,
		        			'message'=>'- عليك الاشتراك في القناة لأستخدام البوت : @kslvnslxmxl',
		        			'reply_to_msg_id'=>$update['message']['id'],
		        			]);
		        			exit();
		        	}
							$pwr = $MadelineProto->get_pwr_chat($update);
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
				} catch (Exception $e) {
				    echo $e->getMessage();
				    }
				  }
}

$MadelineProto->start();
$MadelineProto->setEventHandler('\tagBot');
$MadelineProto->loop(-1);
<!-- telegram: @corup / @api_web -->