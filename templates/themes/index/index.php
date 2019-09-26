
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>{{ settings.title }}</title>
	<link rel="stylesheet" media="screen" href="{{ config.url_stylesheet }}"/>
	<link rel="stylesheet" media="screen" href="{{ config.root }}{{ settings.css }}"/>
	{% if config.url_favicon %}<link rel="shortcut icon" href="{{ config.url_favicon }}" />{% endif %}
	{% if config.default_stylesheet.1 != '' %}<link rel="stylesheet" type="text/css" id="stylesheet" href="{{ config.uri_stylesheets }}{{ config.default_stylesheet.1 }}">{% endif %}
	{% if config.font_awesome %}<link rel="stylesheet" href="{{ config.root }}{{ config.font_awesome_css }}">{% endif %}
	{% include 'header.html' %}
</head>
<body>
{% include 'checkban.php' %}
{{ boardlist.top }}
	<header>
	    <img class="icon" src="{{ settings.icon }}">
		<h1>{{ settings.title }}</h1>
		<div class="subtitle">{{ settings.subtitle }}</div>
	</header>
	{% if config.url_banner_list %}<img class="board_image" src="{{ random(config.url_banner_list|split(',')) }}" {% if config.banner_width or config.banner_height %}style="{% if config.banner_width %}width:{{ config.banner_width }}px{% endif %};{% if config.banner_width %}height:{{ config.banner_height }}px{% endif %}" {% endif %}alt="" />{% endif %}
	
	<div class="box-wrap">
	    <!--<fieldset>
		<legend>Boards</legend>
		<ul>
			{% for board in boards %}
				<li class="boardlinksurl">
					<a href="{{ config.board_path|sprintf(board.uri) }}">
						{{ board.title|e }}
					</a>
				</li>
			{% endfor %}
		</ul>
	    </fieldset>-->
	    <br>

	    <h1>Recent Images</h1>
		<div class="box image">
			<ul>
				{% for post in recent_images %}
					<li>
						<a href="{{ post.link }}">
							<img src="{{ post.src }}" style="width:{{ post.thumbwidth }}px;height:{{ post.thumbheight }}px" alt="">
						</a>
					</li>
				{% endfor %}
			</ul>
		</div>
		<div class="mainBox">
			<h2>Latest Posts</h2>
			<ul>
				{% for post in recent_posts %}
					<li>
						<strong>{{ post.board_name }}</strong>: 
						<a href="{{ post.link }}">
							{{ post.snippet }}
						</a>
					</li>
				{% endfor %}
			</ul>
		</div>
		<div class="mainBox">
	        <br>
	        <div class="description">{{ settings.description }}</div>
	        <br>
	        <img class="imageofnow" src="{{ settings.imageofnow }}">
	        <br>
	        <div class="quoteofnow">{{ settings.quoteofnow }}</div>
	        <br>
	        <iframe class ="videoofnow" width="560" height="315" src="{{ settings.videoofnow }}"></iframe>
	        <br>
	    </div>
	    <div class="ban">
		{% if news|count == 0 %}
			<p style="text-align:center" class="unimportant">(No news to show.)</p>
		{% else %}
			{% for entry in news %}
				<h2 id="{{ entry.id }}">
					{% if entry.subject %}
						{{ entry.subject }}
					{% else %}
						<em>no subject</em>
					{% endif %}
					<span class="unimportant"> &mdash; by {{ entry.name }} at {{ entry.time|date(config.post_date, config.timezone) }}</span>
				</h2>
				<p>{{ entry.body }}</p>
			{% endfor %}
		{% endif %}
	    </div>
		<div class="mainBox">
			<h2>Stats</h2>
			<ul>
				<li>Total posts: {{ stats.total_posts }}</li>
				<li>Unique posters: {{ stats.unique_posters }}</li>
				<li>Active content: {{ stats.active_content|filesize }}</li>
			</ul>
		</div>
	</div>
	
	<hr/>
	<footer>
		<p class="unimportant" style="margin-top:20px;text-align:center;">- Tinyboard + 
			<a href="https://engine.vichan.net/">vichan</a> {{ config.version }} -
		<br>Tinyboard Copyright &copy; 2010-2014 Tinyboard Development Group    
		<br><a href="https://engine.vichan.net/">vichan</a> Copyright &copy; 2012-2018 vichan-devel
	</footer>
</body>
</html>
{% include 'checkban.php' %}
