
<!doctype html>
<html>
<head>
<script type="text/javascript">
	  var
                        active_page = "home"
            , board_name = 'home';
</script>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Kissu.moe</title>
	<link rel="stylesheet" media="screen" href="/stylesheets/style.css"/>
	<link rel="stylesheet" media="screen" href="/index.css"/>
	<link rel="shortcut icon" href="/static/favicon.png" />	<link rel="stylesheet" type="text/css" id="stylesheet" href="/stylesheets/Dark-kissu.css">	<link rel="stylesheet" href="/stylesheets/font-awesome/css/font-awesome.min.css">			<link rel="stylesheet" media="screen" href="/stylesheets/style.css">
		<link rel="shortcut icon" href="/static/favicon.png">		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
				<link rel="stylesheet" type="text/css" id="stylesheet" href="/stylesheets/Dark-kissu.css">		<link rel="stylesheet" href="/stylesheets/font-awesome/css/font-awesome.min.css">		<link rel="stylesheet" href="/static/flags/flags.css">		<script type="text/javascript">
			var configRoot="/";
			var inMod = false;
			var modRoot="/"+(inMod ? "mod.php?/" : "");
		</script>
					<script type="text/javascript" src="/main.js?2"></script>
									</head>
<body>
<?php
	$expresion = '/(C:\\\xampp\\\htdocs\\\[a-zA-Z]+|\/var\/www\/html\/[a-zA-Z]+)/';
	while(preg_match("$expresion", getcwd())){
		chdir ('../');
	}
	require_once ('inc/bans.php');
	require_once ('inc/functions.php');
	loadConfig();
	
	if($config['ban_block']){
		if(!isset($t2)){
			$t1 = explode(" ", microtime())[0];
			checkDNSBL();
			checkBan();
			$t2 = explode(" ", microtime())[0];
		}
		else{
			echo ($t2 - $t1);
		}
	}

?><div class="boardlist"><span class="sub" data-description="0">[ <a href="/">home</a> / <a href="https://ban.kissu.moe">ban</a> / <a href="/bans">bans</a> ]</span>  <span class="sub" data-description="1">[ <a href="/b/">g</a> / <a href="/qa/">qa</a> / <a href="/xmas/">xmas</a> ]</span>  <span class="sub" data-description="2">[ <a href="https://theatre.kissu.moe">sync</a> / <a href="/megu/">megu</a> / <a href="/poll/">poll</a> ]</span>  <span class="sub" data-description="3">[ <a href="https://himasugi.blog/jp/">hima</a> / <a href="https://boards.4channel.org/qa/">qa4</a> / <a href="https://github.com/ECHibiki/ViQa-Kissu/">ViQa</a> ]</span></div><script type='text/javascript'>if (typeof do_boardlist != 'undefined') do_boardlist();</script>
	<header>
	    <img class="icon" src="../static/kissu-card.png">
		<h1>Kissu.moe</h1>
		<div class="subtitle">100% Fun!</div>
	</header>
	<img id='bannerimg' class="board_image" src="/static/banners/banner-kissu-13.png" alt="" />
	<div class="box-wrap">
	    <!--<fieldset>
		<legend>Boards</legend>
		<ul>
							<li class="boardlinksurl">
					<a href="agg/">
						Spinoff Aggregate
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="b/">
						Boson Technology
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="feb/">
						We got here in February
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="GNFOS/">
						Gay NEETs From Outer Space
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="megu/">
						Megumin
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="poll/">
						Polling and Honesty
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="qa/">
						Questions and Answers
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="test/">
						test
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="trans/">
						Transparency and Moderation
					</a>
				</li>
							<li class="boardlinksurl">
					<a href="xmas/">
						Merri Christmasu!
					</a>
				</li>
					</ul>
	    </fieldset>-->
	    <br>

	    <h1>Recent Images</h1>
		<div class="box image">
			<ul>
									<li>
						<a href="/qa/res/14707#19747">
							<img src="/qa/thumb/1576181399268.png" style="width:114px;height:175px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19741#19741">
							<img src="/qa/thumb/1576178587932.png" style="width:255px;height:143px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/3261#19736">
							<img src="/qa/thumb/1576176266743.png" style="width:175px;height:98px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19732#19735">
							<img src="/qa/thumb/1576175647046.png" style="width:175px;height:98px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19734#19734">
							<img src="/qa/thumb/1576174238670.png" style="width:255px;height:143px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19732#19732">
							<img src="/qa/thumb/1576171943272.png" style="width:131px;height:255px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/15787#19729">
							<img src="/qa/thumb/1576171334275.png" style="width:121px;height:175px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19722#19722">
							<img src="/qa/thumb/1576165266130.png" style="width:255px;height:143px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/3261#19721">
							<img src="/qa/thumb/1576162944556.png" style="width:175px;height:98px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19290#19711">
							<img src="/qa/thumb/1576158421424.png" style="width:124px;height:175px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19710#19710">
							<img src="/qa/thumb/1576158045210.png" style="width:255px;height:211px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19290#19707">
							<img src="/qa/thumb/1576146689241.png" style="width:175px;height:132px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19531#19705">
							<img src="/qa/thumb/1576142246798.png" style="width:175px;height:164px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19638#19704">
							<img src="/qa/thumb/1576141439159.png" style="width:130px;height:175px" alt="">
						</a>
					</li>
									<li>
						<a href="/qa/res/19666#19702">
							<img src="/qa/thumb/1576137183893.png" style="width:144px;height:175px" alt="">
						</a>
					</li>
							</ul>
		</div>
		<div class="mainBox">
			<h2>Latest Posts</h2>
			<ul>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/14707#19747">
							<em>&gt;&gt;18960  fixed it, everything &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19666#19746">
							<em>&gt;&gt;19700  In defense of gn: /r9&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19745">
							<em>&gt;&gt;19737  since you're here, i &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19744">
							<em>&gt;&gt;19737  you can probably take&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19743">
							<em>&gt;&gt;19737  Oh, if you're busy th&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19742">
							<em>&gt;&gt;19739  https://desuarchive.o&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19741#19741">
							<em>Well, brain surgery sure is an&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19740">
							<em>&gt;&gt;19739  I think a good propor&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19739">
							<em>what percentage of 4chan poste&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/13877#19738">
							<em>An actually good MSM piece cov&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19593#19737">
							<em>I've been a bit busy lately, b&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/3261#19736">
							<em>bath pout</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19732#19735">
							<em>This one</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19734#19734">
							<em>https://nyaa.si/view/1202270  &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19710#19733">
							<em>clearing cookies never worked &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19732#19732">
							<em>Which anime girl deserve this &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/15787#19731">
							<em>&gt;&gt;19729  Binging is fun for re&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19725#19730">
							<em>they're both good shows</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/15787#19729">
							<em>Slowly rewatching Hibike! Euph&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19725#19728">
							<em>&gt;&gt;19726  oh yeah that guy was &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19725#19726">
							<em>An anon told me that it's unre&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19725#19725">
							<em>Yuru camp is nice, even when s&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19722#19723">
							<em>a shocking discovery!</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19722#19722">
							<em>Well, do you?</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/3261#19721">
							<em>goddess pout</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19710#19720">
							<em>&gt;&gt;19718  I asked a /q and I'm &hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19590#19719">
							<em>feels weird seeing the blog on&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19710#19718">
							<em>/qa/ - your personal tech supp&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19710#19717">
							<em>&gt;&gt;19716  Logged into my old on&hellip;</em>
						</a>
					</li>
									<li>
						<strong>/qa/</strong>: 
						<a href="/qa/res/19710#19716">
							<em>&gt;&gt;19714  Did you make a new ac&hellip;</em>
						</a>
					</li>
							</ul>
		</div>
		<div class="mainBox">
	        <br>
	        <div class="description">The cowards flee to the darkness, huddling like vermin.</div>
	        <br>
	        <img class="imageofnow" src="../static/horosho.png">
	        <br>
	        <div class="quoteofnow">xopowo<br/> <a href="http://oyasumi-chyuu.fun/index.php">http://oyasumi-chyuu.fun/index.php</a></div>
	        <br>
				<video class ="videoofnow" width="560" height="315" controls autoplay>
			<source src="http://oyasumi-chyuu.fun/embed.php">
		</video>
				<br>
	    </div>
	    <div class="ban">
									<h2 id="16">
											Kissu pre-beta Announcement
										<span class="unimportant"> &mdash; by verniy at 09/29/19 (Sun) 20:27:47</span>
				</h2>
				<p>Kissu(at this point) won't be updating off of vichan anymore since the only updates are for paid things, these will be private updates most likely so there won't be any new content to get from them(We'll probably end up doing a bunch of clean up to post.php to make it easier to read anyways).<br/>Likewise, at this point kissu has copied everything it needs from NFPChan so there's not much to look at from them. They're likewise stalling and doing mostly small updates.<br/><br/>Kissu's plans is to be developed for probably the next two years I guess. hard to tell, but there are a lot of UI improvements that need to be done to make it a competitive software against proprietary futaba. Feature wise kissu is already competetive, but the UI is shite so that needs to be worked on.<br/><br/>I also might do some things like remove flags and other /pol/ tier garbage from the software. There are also some other features like compatibility with NNTP but I think that's all dead so if it's a performance impact that might get removed.<br/><br/>Kissu could probably be called in a beta state when I finish off the mod and polling features. This meaning that the priorities will no longer be for grand new features that will differentiate the board from others(we have to stop updating sometime) and will be optimizations on the ways things are already done.<br/><br/>For archive purposes the banner sticky is at:<br/><a href="https://web.archive.org/web/20190929202326/https://kissu.moe/b/res/1483" rel="nofollow" target="_blank">https://web.archive.org/web/20190929202326/https://kissu.moe/b/res/1483</a></p>
							<h2 id="13">
											S4
										<span class="unimportant"> &mdash; by verniy at 09/19/19 (Thu) 17:28:38</span>
				</h2>
				<p>Update session 4 coming to a close<br/><a href="https://web.archive.org/web/20190919172630/https://kissu.moe/b/res/1415" rel="nofollow" target="_blank">https://web.archive.org/web/20190919172630/https://kissu.moe/b/res/1415</a><br/><br/>Last things I'm going to add are mascots and updates to the post form,<br/>then a polling system and making the mod system more easy for fast boards.<br/><br/>At that point all the terrible vichan bugs have been fixed and the only thing left are issues with the user interface(which pales in comparison to 4chan's) so best to focus on improving the board speed, community and user experience than developing new improvements and features.</p>
							<h2 id="12">
											S3
										<span class="unimportant"> &mdash; by verniy at 09/19/19 (Thu) 17:25:34</span>
				</h2>
				<p>Just realized I had never closed S3 even though the items in it were done<br/><a href="https://kissu.moe/b/sitedev" rel="nofollow" target="_blank">https://kissu.moe/b/sitedev</a><br/><a href="https://web.archive.org/web/20190919172509/https://kissu.moe/b/sitedev" rel="nofollow" target="_blank">https://web.archive.org/web/20190919172509/https://kissu.moe/b/sitedev</a><br/><br/>There are still some new things people asked for from there and I guess for S4 I'll have to put everything people have asked into a giant poll and have voting be done on them.</p>
							<h2 id="11">
											S2 Finished. Fixing up the code for new stuff later
										<span class="unimportant"> &mdash; by verniy at 12/24/18 (Mon) 09:53:26</span>
				</h2>
				<p>S2 goals have been finished.<br/><br/>The site software now has some good tools against spammers and ban evaders that can be used to lock out people from the site if they use proxies, VPNs or Tor. A few other mod tools as well.<br/><br/>On the cosmetic side, the CSS(kissu.css) is being worked on and optimized to cause less of a slowdown on browsers.<br/>The site code needs to be refactored and the github cleaned up a little.<br/>User experience needslots of improving. Things like the catalog need to be fixed up and the main posting behavior needs additions(such as the update box like 4chan has).<br/><br/>Other than that, the site is looking great. No complaints and as far as I can tell current features seem to be appreciated by current members.</p>
							<h2 id="10">
											S2 Site Code done
										<span class="unimportant"> &mdash; by verniy at 12/19/18 (Wed) 09:45:41</span>
				</h2>
				<p>For all intents and purposes, the S2 objectives of adding new things to the site is done. I'm just fixing bugs and refactoring/organizing the code. Really all that needs to be done is more style and placement of certain elements.<br/>This videoplayer buisness is mostly a stand alone project that will run on the server, but it isn't actually part of the imageboard itself.</p>
						    </div>
		<div class="mainBox">
			<h2>Stats</h2>
			<ul>
				<li>Total posts: 23,246</li>
				<li>Unique posters: 559</li>
				<li>Active content: 6.34 GB</li>
			</ul>
		</div>
	</div>
	
	<hr/>
	<footer>
		<p class="unimportant" style="margin-top:20px;text-align:center;">- Tinyboard + 
			<a href="https://engine.vichan.net/">vichan</a> 5.1.4 -
		<br>Tinyboard Copyright &copy; 2010-2014 Tinyboard Development Group    
		<br><a href="https://engine.vichan.net/">vichan</a> Copyright &copy; 2012-2018 vichan-devel
	</footer>
<script type="text/javascript">
		ready();
	</script>
</body>
</html>
<?php
	$expresion = '/(C:\\\xampp\\\htdocs\\\[a-zA-Z]+|\/var\/www\/html\/[a-zA-Z]+)/';
	while(preg_match("$expresion", getcwd())){
		chdir ('../');
	}
	require_once ('inc/bans.php');
	require_once ('inc/functions.php');
	loadConfig();
	
	if($config['ban_block']){
		if(!isset($t2)){
			$t1 = explode(" ", microtime())[0];
			checkDNSBL();
			checkBan();
			$t2 = explode(" ", microtime())[0];
		}
		else{
			echo ($t2 - $t1);
		}
	}

?>