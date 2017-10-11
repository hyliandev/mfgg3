<div class="bbcode-bar"><?php foreach([
	[
		'fa'=>'bold',
		'tag'=>'[b][/b]'
	],
	[
		'fa'=>'italic',
		'tag'=>'[i][/i]'
	],
	[
		'fa'=>'underline',
		'tag'=>'[u][/u]'
	],
	[
		'fa'=>'strikethrough',
		'tag'=>'[s][/s]'
	],
	[
		'fa'=>'align-center',
		'tag'=>'[center][/center]'
	],
	[
		'fa'=>'link',
		'tag'=>'[url=example.com][/url]'
	],
	[
		'fa'=>'quote-right',
		'tag'=>'[quote][/quote]'
	],
	[
		'fa'=>'picture-o',
		'tag'=>'[img][/img]'
	],
	[
		'fa'=>'text-height',
		'tag'=>'[size=100][/size]'
	],
	[
		'fa'=>'youtube',
		'tag'=>'[youtube][/youtube]'
	],
	[
		'fa'=>'youtube-play',
		'tag'=>'[ytaudio][/ytaudio]'
	],
	[
		'fa'=>'code',
		'tag'=>'[code][/code]'
	],
	[
		'fa'=>'list-ul',
		'tag'=>'[list][/list]'
	],
	[
		'fa'=>'asterisk',
		'tag'=>'[*]'
	],
	[
		'fa'=>'eye-slash',
		'tag'=>'[spoiler][/spoiler]'
	],
	[
		'fa'=>'mouse-pointer',
		'tag'=>'[ispoiler][/ispoiler]'
	]
] as $bbcode): ?>

<button type="button" class="btn btn-secondary" data-bbcode="<?=$bbcode['tag']?>">
	<span class="fa fa-<?=$bbcode['fa']?>"></span>
</button>

<?php endforeach; ?></div>





<textarea
	name="<?=$name?>"
	class="form-control <?=$error ? 'form-control-danger' : ''?>"
	placeholder="<?=$title?>"
	<?php if($minlength) echo 'minlength="' . $minlength . '"'; ?>
	<?php if($maxlength) echo 'maxlength="' . $maxlength . '"'; ?>
	<?=$required ? 'required' : ''?>
><?=$_POST[$name]?></textarea>