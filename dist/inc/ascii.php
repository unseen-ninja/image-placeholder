<?php

$emoticons = array(
	'o(^▽^)o',		'(/^▽^)/',		'ヽ(;^o^ヽ)',
	'ヽ(´∇｀)ﾉ',		'٩(^ᴗ^)۶',		'۹(˒௰˓)۶',
	'୧(˃◡ु˂)୨',		'(´｡･v･｡｀)',		'(^・ω・^ )',
	'( ﾉ^ω^)ﾉﾟ'
);
$emoticon = $emoticons[array_rand($emoticons)];

$values['message'] = $emoticon;

?>
