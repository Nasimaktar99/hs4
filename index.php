<?php
// Grab the dynamic portion from the URL (e.g. "manifest.mpd")
$get = $_GET['get'];

// Build the target MPD URL for Hub Sports 4 by appending the path
$mpdUrl = 'https://ucdn.starhubgo.com/bpk-tv/HubSports4HDnew/output/' . $get;

// Set up the HTTP context with a custom User-Agent, enable following redirects, and set a timeout
$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];
$context = stream_context_create($mpdheads);

// Fetch the MPD content from the remote URL and output it
$res = file_get_contents($mpdUrl, false, $context);
echo $res;
?>
