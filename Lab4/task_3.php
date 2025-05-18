<?php
$text = $_POST["textarea"];
$vowels_regexp = "/[eyuioaёуеаояиюэы]/ui";
$consonant_regexp = "/[qwrtpsdfghjklzxcvbnmцкнгшщзхъфвпрлджчсмтьб]/ui";
$vowels_matches = [];
$consonant_matches = [];

$count_vowels = preg_match_all($vowels_regexp, $text, $vowels_matches);
$count_consonant = preg_match_all($consonant_regexp, $text, $consonant_matches);
echo "There are <b>$count_vowels vowels</b> in the text!";
echo "There are <b>$count_consonant consonant</b> in the text!";
?>