<?php
$get = $_GET['get'];
$mpdUrl = 'https://linearjitp-playback.astro.com.my/dash-wv/linear/' . $get;

$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 17_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Mobile/15E148 Safari/604.1\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];
$context = stream_context_create($mpdheads);
$res = file_get_contents($mpdUrl, false, $context);
echo $res;
?>
