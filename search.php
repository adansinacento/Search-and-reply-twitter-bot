<?php
/*
* busca.php
* AdanSinAcento 2017
* When in boubt -> tweet me @Adansinacento
*/
require_once('codebird.php'); //CodeBird file inclusion
define('QUERY', 'Your-string-to-be-searched'); // define the string to be searched
\Codebird\Codebird::setConsumerKey("CONSUMER_KEY", "CONSUMER_KEY_SECRET");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("TOKEN", "TOKEN_SECRET"); //CodeBird Initialization
$lastTweet = lastId(); // gets the last tweet ID from the db and personalize the search query to fetch recent tweets
$params = array(
    'q'        =>    QUERY,
    'count'    =>    100,
    'since_id' =>    $lastTweet
); // search params {query, number of resultd, tweet id (from where to start looking)}

$data = (array) $cb->search_tweets($params, true); // search the tweets and cast them into an Array
echo '<pre>'; // this is for debugging, helps seeing the arrays aligned
print_r($data); // Graphically see the result of tweet search
$tweets = array(); // Empty Array to storage the tweets to reply at
$tweets = AddIds($tweets, $data, $lastTweet); // Filling up the array
print_r($tweets); // Graphically see the result of the tweets to reply at

/* Here is where the tweeting starts */
// send the image(s) to Twitter
foreach ($tweets as $key => $value) { // Process will repeat for every tweet to be done
  $media_files = [
    'path/to/img1.jpg',
    'path/to/img2.png'
  ];
  $media_ids = [];
  foreach ($media_files as $file) {
    // uploading all the media files
    $reply = $cb->media_upload([
      'media' => $file
    ]);
    // fetch the media ids, so we can use them in the tweets
    $media_ids[] = $reply->media_id_string;
  }
  $media_ids = implode(',', $media_ids); // Converts the resulting Array into a single String
  $params = [ // params for the tweet
      'status'                => '@' . $value . ' text-to-be-weeted.', // Tweet text & must contain @The_UserName
      'media_ids'             => $media_ids, // string with the media files
      'in_reply_to_status_id' => $key // Indicates that it is a response to specfic tweet
  ];
  print_r($params); // Graphically see the result of the params
  $reply = $cb->statuses_update($params); // Sends the tweet
}

function AddIds($arr, $res, $ut){ // Fnc to fill up the array of tweets to reply (and updates the DB)
	foreach ($res['statuses'] as $tuit) {
    	$t2 = (array) $tuit; // iterates in the Array of tweets found on the search
    	if ($t2['user']->screen_name == 'BOT_NAME') { continue;} // checks if the tweet was made from own account and ignores if so
    	$arr[$t2['id']] = $t2['user']->screen_name; // Adds the tweet data to the Array (tweet id and user who made it)
    	if ($t2['id'] > $ut) { $ut = $t2['id']; } // saves only the id from the most recent tweet
  	}
  	UpdateDB($ut); // Updates the DB
  	return $arr; // returns the new Array
}

function UpdateDB($_id){
  	include 'sql_connect.php';
  	$sql = 'UPDATE Twitter_Bots SET last_id = "' . $_id . '" WHERE bot_name = "BOT_NAME";'; // UPDATE on the DB
  	mysqli_query($link, $sql);
}

function lastId(){
	include 'sql_connect.php';
	$sql = 'SELECT last_id AS Id FROM Twitter_Bots WHERE bot_name = "BOT_NAME";'; // SELECT the column
	$result = mysqli_query($link, $sql);
	$row = $result->fetch_assoc();
	return $row['Id']; // returns the column aliased as 'Id'
}
?>