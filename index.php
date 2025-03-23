<?php
// Get the requested path; if none provided, default to "manifest.mpd"
$get = (isset($_GET['get']) && $_GET['get'] !== '') ? $_GET['get'] : 'manifest.mpd';

// Build the target URL for Hub Sports 4
$mpdUrl = 'https://ucdn.starhubgo.com/bpk-tv/HubSports4HDnew/output/' . $get;

// Set up the HTTP context with a mobile user-agent, a referer header, and accept header.
// These headers are more likely to mimic a request coming from an actual device.
$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Mobile/15E148 Safari/604.1\r\n" .
                  "Referer: https://www.starhub.com/\r\n" .
                  "Accept: */*\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];

$context = stream_context_create($mpdheads);

// Fetch and output the content
$res = file_get_contents($mpdUrl, false, $context);
echo $res;
?>
