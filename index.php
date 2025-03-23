<?php
// Use the "get" parameter from the URL or default to "manifest.mpd" if empty.
$get = (isset($_GET['get']) && $_GET['get'] !== '') ? $_GET['get'] : 'manifest.mpd';

// Build the target URL for Hub Sports 4.
$mpdUrl = 'https://ucdn.starhubgo.com/bpk-tv/HubSports4HDnew/output/' . $get;

// Set up HTTP options with a custom User-Agent (mimicking a Windows browser),
// enable following redirects, and set a timeout.
$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];

$context = stream_context_create($mpdheads);

// Fetch the content from the remote MPD URL and output it.
$res = file_get_contents($mpdUrl, false, $context);
echo $res;
?>
