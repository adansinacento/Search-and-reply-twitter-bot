# Search-and-reply-twitter-bot
A twitter bot that uses [CodeBird](https://github.com/jublonet/codebird-php) to search for tweets containing a specfic string and reply to them with an image

**[AdanSinAcento](http://www.twitter.com/adansinacento)** 2017.  
Any questions on my twitter.  
CronJob execution is _recomended,_ run it every 5 minutes or so.  
To start using the bot you'll need to 
* Create the database and the tables (the definition is in the **[Twitter_Bots.sql](Twitter_Bots.sql)** file)
* Insert a row in the table, set your bot name in the **bot_name** column and any recent tweet id in the **last_id** column
* Modify the **[search.php](search.php)** file, change **BOT_NAME, CONSUMER_KEY, CONSUMER_KEY_SECRET, TOKEN** and **TOKEN_SECRET** (you can generate your own keys and tokens in the [Twitter Application Manager](https://apps.twitter.com/))
* Modify the **[sql_connect.php](sql_connect.php)** file, change **DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME** and any other params you consider necesary.

  
This code (just like any other code ever written) can be optimized, please feel free to modify it and do as many pull request as you think the code can use.  
