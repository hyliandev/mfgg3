<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Export: mfgg - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer.php?file=default.css&amp;version=4.3.1">
<script type="text/javascript" src="adminer.php?file=functions.js&amp;version=4.3.1"></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer.php?file=favicon.ico&amp;version=4.3.1">
<link rel="apple-touch-icon" href="adminer.php?file=favicon.ico&amp;version=4.3.1">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href="adminer.php">MySQL</a> &raquo; <a href='adminer.php?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="adminer.php?username=root&amp;db=mfgg">mfgg</a> &raquo; Export
<h2>Export: mfgg</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Output<td><label><input type='radio' name='output' value='text' checked>open</label><label><input type='radio' name='output' value='file'>save</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Format<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Database<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Routines</label><label><input type='checkbox' name='events' value='1' checked>Events</label><tr><th>Tables<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggers</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="951649:59357">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked onclick='formCheck(this, /^tables\[/);'>Tables</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_admin_msg' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_admin_msg</label><td align='right'><label class='block'><span id='Rows-tsms_admin_msg'></span><input type='checkbox' name='data[]' value='tsms_admin_msg' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_comments' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_comments</label><td align='right'><label class='block'><span id='Rows-tsms_comments'></span><input type='checkbox' name='data[]' value='tsms_comments' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_filter_group' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_filter_group</label><td align='right'><label class='block'><span id='Rows-tsms_filter_group'></span><input type='checkbox' name='data[]' value='tsms_filter_group' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_filter_list' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_filter_list</label><td align='right'><label class='block'><span id='Rows-tsms_filter_list'></span><input type='checkbox' name='data[]' value='tsms_filter_list' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_filter_multi' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_filter_multi</label><td align='right'><label class='block'><span id='Rows-tsms_filter_multi'></span><input type='checkbox' name='data[]' value='tsms_filter_multi' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_filter_use' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_filter_use</label><td align='right'><label class='block'><span id='Rows-tsms_filter_use'></span><input type='checkbox' name='data[]' value='tsms_filter_use' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_groups' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_groups</label><td align='right'><label class='block'><span id='Rows-tsms_groups'></span><input type='checkbox' name='data[]' value='tsms_groups' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_mail_log' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_mail_log</label><td align='right'><label class='block'><span id='Rows-tsms_mail_log'></span><input type='checkbox' name='data[]' value='tsms_mail_log' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_messages' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_messages</label><td align='right'><label class='block'><span id='Rows-tsms_messages'></span><input type='checkbox' name='data[]' value='tsms_messages' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_modules' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_modules</label><td align='right'><label class='block'><span id='Rows-tsms_modules'></span><input type='checkbox' name='data[]' value='tsms_modules' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_news' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_news</label><td align='right'><label class='block'><span id='Rows-tsms_news'></span><input type='checkbox' name='data[]' value='tsms_news' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_panels' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_panels</label><td align='right'><label class='block'><span id='Rows-tsms_panels'></span><input type='checkbox' name='data[]' value='tsms_panels' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_resources' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_resources</label><td align='right'><label class='block'><span id='Rows-tsms_resources'></span><input type='checkbox' name='data[]' value='tsms_resources' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_games' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_games</label><td align='right'><label class='block'><span id='Rows-tsms_res_games'></span><input type='checkbox' name='data[]' value='tsms_res_games' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_gfx' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_gfx</label><td align='right'><label class='block'><span id='Rows-tsms_res_gfx'></span><input type='checkbox' name='data[]' value='tsms_res_gfx' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_howtos' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_howtos</label><td align='right'><label class='block'><span id='Rows-tsms_res_howtos'></span><input type='checkbox' name='data[]' value='tsms_res_howtos' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_misc' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_misc</label><td align='right'><label class='block'><span id='Rows-tsms_res_misc'></span><input type='checkbox' name='data[]' value='tsms_res_misc' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_reviews' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_reviews</label><td align='right'><label class='block'><span id='Rows-tsms_res_reviews'></span><input type='checkbox' name='data[]' value='tsms_res_reviews' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_res_sounds' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_res_sounds</label><td align='right'><label class='block'><span id='Rows-tsms_res_sounds'></span><input type='checkbox' name='data[]' value='tsms_res_sounds' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_sec_images' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_sec_images</label><td align='right'><label class='block'><span id='Rows-tsms_sec_images'></span><input type='checkbox' name='data[]' value='tsms_sec_images' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_sessions' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_sessions</label><td align='right'><label class='block'><span id='Rows-tsms_sessions'></span><input type='checkbox' name='data[]' value='tsms_sessions' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_skins' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_skins</label><td align='right'><label class='block'><span id='Rows-tsms_skins'></span><input type='checkbox' name='data[]' value='tsms_skins' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_staffchat' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_staffchat</label><td align='right'><label class='block'><span id='Rows-tsms_staffchat'></span><input type='checkbox' name='data[]' value='tsms_staffchat' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_users</label><td align='right'><label class='block'><span id='Rows-tsms_users'></span><input type='checkbox' name='data[]' value='tsms_users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='tsms_version' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">tsms_version</label><td align='right'><label class='block'><span id='Rows-tsms_version'></span><input type='checkbox' name='data[]' value='tsms_version' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('adminer.php?username=root&db=mfgg&script=db');</script>
</table>
</form>
<p><a href='adminer.php?username=root&amp;db=mfgg&amp;dump=tsms%25'>tsms</a></div>

<form action='' method='post'>
<div id='lang'>Language: <select name='lang' onchange="this.form.submit();"><option value="en" selected>English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs">Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select> <input type='submit' value='Use' class='hidden'>
<input type='hidden' name='token' value='1007326:80994'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="951649:59357">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.3.1</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="adminer.php?file=jush.js&amp;version=4.3.1"></script>
<script type="text/javascript">
var jushLinks = { sql: [ 'adminer.php?username=root&db=mfgg&table=$&', /\b(tsms_admin_msg|tsms_comments|tsms_filter_group|tsms_filter_list|tsms_filter_multi|tsms_filter_use|tsms_groups|tsms_mail_log|tsms_messages|tsms_modules|tsms_news|tsms_panels|tsms_resources|tsms_res_games|tsms_res_gfx|tsms_res_howtos|tsms_res_misc|tsms_res_reviews|tsms_res_sounds|tsms_sec_images|tsms_sessions|tsms_skins|tsms_staffchat|tsms_users|tsms_version)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.5');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>ai<option>aviation2<option>aviationrecruiting<option>backpack<option>backuptest<option>bridal<option>cnrg<option>dolphin<option>duostech<option>fabi<option>fogle<option>fogletest<option>fpza<option>fuckblog<option>hctax<option>hines<option>information_schema<option>jaxallglass<option>joyal<option>justplaneadventures<option>kampus<option>life2<option selected>mfgg<option>mysql<option>nolimit<option>performance_schema<option>phpmyadmin<option>prana<option>rachelann<option>tamara<option>test<option>themedev<option>visionsbeyond<option>zdev<option>zfgr</select><input type='submit' value='Use' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='adminer.php?username=root&amp;db=mfgg&amp;sql='>SQL command</a>
<a href='adminer.php?username=root&amp;db=mfgg&amp;import='>Import</a>
<a href='adminer.php?username=root&amp;db=mfgg&amp;dump=' id='dump' class='active '>Export</a>
<a href="adminer.php?username=root&amp;db=mfgg&amp;create=">Create table</a>
<ul id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_admin_msg" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_admin_msg" class='structure' title='Show structure'>tsms_admin_msg</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_comments" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_comments" class='structure' title='Show structure'>tsms_comments</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_filter_group" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_filter_group" class='structure' title='Show structure'>tsms_filter_group</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_filter_list" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_filter_list" class='structure' title='Show structure'>tsms_filter_list</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_filter_multi" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_filter_multi" class='structure' title='Show structure'>tsms_filter_multi</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_filter_use" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_filter_use" class='structure' title='Show structure'>tsms_filter_use</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_groups" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_groups" class='structure' title='Show structure'>tsms_groups</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_mail_log" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_mail_log" class='structure' title='Show structure'>tsms_mail_log</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_messages" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_messages" class='structure' title='Show structure'>tsms_messages</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_modules" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_modules" class='structure' title='Show structure'>tsms_modules</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_news" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_news" class='structure' title='Show structure'>tsms_news</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_panels" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_panels" class='structure' title='Show structure'>tsms_panels</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_resources" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_resources" class='structure' title='Show structure'>tsms_resources</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_games" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_games" class='structure' title='Show structure'>tsms_res_games</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_gfx" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_gfx" class='structure' title='Show structure'>tsms_res_gfx</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_howtos" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_howtos" class='structure' title='Show structure'>tsms_res_howtos</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_misc" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_misc" class='structure' title='Show structure'>tsms_res_misc</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_reviews" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_reviews" class='structure' title='Show structure'>tsms_res_reviews</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_res_sounds" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_res_sounds" class='structure' title='Show structure'>tsms_res_sounds</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_sec_images" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_sec_images" class='structure' title='Show structure'>tsms_sec_images</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_sessions" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_sessions" class='structure' title='Show structure'>tsms_sessions</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_skins" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_skins" class='structure' title='Show structure'>tsms_skins</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_staffchat" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_staffchat" class='structure' title='Show structure'>tsms_staffchat</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_users" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_users" class='structure' title='Show structure'>tsms_users</a>
<li><a href="adminer.php?username=root&amp;db=mfgg&amp;select=tsms_version" class='select'>select</a> <a href="adminer.php?username=root&amp;db=mfgg&amp;table=tsms_version" class='structure' title='Show structure'>tsms_version</a>
</ul>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
