import os
token = os.getenv('TOKEN')  # Your bot token.
api_id = 13966124  # the api id from my.telegram.org
api_hash = "ffb60460dd6a3e4e087f8b29d3179059"  # the api hash from my.telegram.org

try:
    import asyncio, sys, time, redis
    from telethon import TelegramClient
except ImportError:
    print("Please install the required libraries. (pip install -r requirements.txt)")
    sys.exit()

r = redis.StrictRedis(
    host="localhost", port=6379, charset="utf-8", decode_responses=True
)

try:
    chat_id = int(sys.argv[1].split("ykwshluagdueskukyu553j2qwk")[0])  # the chatID of the group you want to mention.
except IndexError:  # if no chatID is given.
    print("Usage: python3 mention.py <chat_id>")
    sys.exit()
storeMentionsWithString, StoreMentionsArray = "", []
overFourMentionsSum, totalUsers = [0, 0]
checkIfnotOverNum = 0

async def starts():  # start the bot function
    global storeMentionsWithString, overFourMentionsSum, totalUsers, checkIfnotOverNum
    try:
        app = TelegramClient(
            str(chat_id).split("-")[1], api_id, api_hash
        )  # Connect to the client.
        await app.connect()  # Connect to the client.
        if not await app.is_user_authorized():  # Check if the user is authorized.
            await app.start(bot_token=token)  # if not then Start the client.
        for user in await app.get_participants(chat_id):  # Get all participants.
            if user.id and user.first_name:
                StoreMentionsArray.append(
                    f"[{user.first_name}](tg://user?id={user.id})"
                )
        for mention in StoreMentionsArray:  # Get all mentions.
            if r.get(f"stop:{chat_id}"):  # Check if the bot is stopped.
                print("stopped: " + str(chat_id))
                return sys.exit()
            overFourMentionsSum += 1
            totalUsers += 1
            if sys.argv[1].split("ykwshluagdueskukyu553j2qw")[1]+"ac" == "kac":
             storeMentionsWithString += str(totalUsers) + "- " + str(mention) + "\n"
            else:
             storeMentionsWithString += str(totalUsers) + "- " + str(mention) + "\n" + sys.argv[1].split("ykwshluagdueskukyu553j2qwk")[1] + "\n"
            if overFourMentionsSum == 5:
                checkIfnotOverNum += 1 # sum the values of the mentions.
                await app.send_message(chat_id, storeMentionsWithString)
                storeMentionsWithString, overFourMentionsSum = "", 0
                time.sleep(
                    0.5
                )  # sleep for 1 second to prevent telegram from blocking the bot.
        if checkIfnotOverNum < totalUsers: # if the sum of the mentions is less than the total users.
            await app.send_message(chat_id, storeMentionsWithString) # send the mentions.
        await app.send_message(chat_id, "تم عمل تاك ل" + str(totalUsers) + " حسابات \n ")
    except Exception as e:  # If there is an error.
        with open("log.txt", "a") as f:  # Log the error.
            f.write(str(e) + "\n")
        f.close()
    print("done: " + str(chat_id))  # print the chat id that the bot finished.
if __name__ == "__main__":  # start the bot.
          print(str(len(sys.argv[1].split("ykwshluagdueskukyu553j2qwk")[1]+"k")))
          loop = asyncio.get_event_loop()
          loop.run_until_complete(starts())
         