<?php

$file = end($argv);
if (!file_exists($file)) {
    echo "{$file} not found\n";
    exit(1);
}

$text = file_get_contents($file);
echo strlen($text) . " bytes read from {$file}\n";

$from = $to = [];
if (preg_match_all('/i:(\d+);/', $text, $matches)) {
    foreach ($matches[0] as $i => $match) {
        $from[] = $match;
        $to[] = 's:' . strlen($matches[1][$i]) . ':"' . $matches[1][$i] . '";';
    }
}

$from = array_unique($from);
$to = array_unique($to);
if (!$from || !$to) {
    echo "No replacements needed\n";
    exit(0);
}

$text = str_replace($from, $to, $text);
echo count($from) . " replacements performed\n";

echo file_put_contents("{$file}.fp", $text) . " bytes written to {$file}.fp\n";
exit(0);
