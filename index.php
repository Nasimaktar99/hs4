<?php
// Fixed MPD URL for the channel
$mpdUrl = 'https://ucdn.starhubgo.com/bpk-tv/HubSports4HDnew/output/manifest.mpd';

// Create a custom HTTP context with the desired user-agent header,
// follow redirects, and set a timeout
$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Mobile/15E148 Safari/604.1\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];
$context = stream_context_create($mpdheads);

// Fetch the MPD content
$res = file_get_contents($mpdUrl, false, $context);
echo $res;
?>
