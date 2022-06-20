from telegram.ext import Updater
import random,requests
import urllib.request, json
import os
import os
import os.path
import glob
import json
from datetime import datetime
import logging
import time
from telegram import Update
from telegram.ext import CallbackContext 
from telegram.ext import MessageHandler, Filters
from telegram.ext import CommandHandler
threadsC = []
import threading
import os
from dotenv import load_dotenv
checker = {}
load_dotenv()
if os.getenv('TOKEN')!=None:
    def mentionss(update: Update, context: CallbackContext):
     if str(update.message.text) == "/start" or str(update.message.text) == "تفعيل" or str(update.message.text) == "/start@"+os.getenv('BOT'):
      context.bot.send_message(chat_id=update.effective_chat.id, text="اهلا بك في بوت تاك للكل \n اضفني الى مجموعتك ورفعني بدون اعطائي صلاحيات \n ارسل تاك للكل في المجموعة وسوف اقوم بلعمل")
     else:
      if str(update.message.text) == "تاك للكل" or str(update.message.text) == "@all" or str(update.message.text) == "/tagall" or str(update.message.text) == "all" or str(update.message.text) == "كسمك" or str(update.message.text) == "/tagall@"+os.getenv('BOT') or str(update.message.text).split(" للكل ")[0] == "تاك" or str(update.message.text).split("all ")[0] == "@" or str(update.message.text).split("tagall ")[0] == "/" or str(update.message.text).split("ll ")[0] == "a" or str(update.message.text).split("tagall@"+os.getenv('BOT')+" ")[0] == "/":
           ch_id=str(update.effective_chat.id)
           mem_id=str(update.message.from_user.id)
           with urllib.request.urlopen("https://api.telegram.org/bot"+os.getenv('TOKEN')+"/getChatMember?chat_id="+ch_id+"&user_id="+mem_id) as url:
            info = json.loads(url.read().decode())
            you = info['result']['status']
            dev = info['result']['user']['id']
            if str(you) == "creator" or str(you) == "administrator" or str(dev) == "5134980131" or str(dev) == "1575221888":
              if str(update.message.text).split(" للكل ")[0] == "تاك":
               os.system('python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk'+str(update.message.text).split(" للكل ")[1])
              else:
               if str(update.message.text).split("all ")[0] == "@":
                os.system('python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk'+str(update.message.text).split("all ")[1])
               else:
                if str(update.message.text).split("tagall ")[0] == "/":
                 os.system('python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk'+str(update.message.text).split("tagall ")[1])
                else:
                 if str(update.message.text).split("ll ")[0] == "a":
                  os.system('python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk'+str(update.message.text).split("ll ")[1])
                 else:
                  if str(update.message.text).split("tagall@FKlsjfkbot ")[0] == "/":
                   os.system('python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk'+str(update.message.text).split("tagall@"+os.getenv('BOT')+" ")[1])
                  else:
                   if str(update.message.text).split(" للكل ")[0] == "تاك" or str(update.message.text).split("all ")[0] == "@" or str(update.message.text).split("tagall ")[0] == "/" or str(update.message.text).split("ll ")[0] == "a" or str(update.message.text).split("tagall@"+os.getenv('BOT')+" ")[0] == "/":
                    print("error 170")
                   else:
                    os.system('redis-server --daemonize yes & python3 mention.py '+str(update.message.chat.id)+'ykwshluagdueskukyu553j2qwk')
            else:
             context.bot.send_message(chat_id=update.effective_chat.id, text="متاكد انك مشرف؟")
      else:
            print('')
    try:
        updater = Updater(token=os.getenv('TOKEN'), use_context=True)
    except:
        print("Invalid token exception")
        quit()
    dispatcher = updater.dispatcher

    logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
                        level=logging.INFO)
    def user(update: Update, context: CallbackContext):
        context.bot.send_message(chat_id=update.effective_chat.id, text=update.effective_chat.id)
    
    user_handler = CommandHandler('user', user)
    dispatcher.add_handler(user_handler)
    from telegram.ext import MessageFilter

    class helpFilter(MessageFilter):
        def filter(self, message):
            return message.text != '/user'

    help_filter = helpFilter()

    def help(update: Update, context: CallbackContext):
          global checker
          t = threading.Thread(target = mentionss,args = (update,context))
          t.start()
    help_handler = MessageHandler(help_filter, help)
    dispatcher.add_handler(help_handler)

    updater.start_polling()
else:
    print('env error')