<?PHP 
$href = Request::segment(1); 
if (in_array($href, ["berita","news"])) $bread = "news";
else if (in_array($href, ["agenda","events"])) $bread = "events";
else if (in_array($href, ["isu-terkini","current-issues"])) $bread = "issue";
else $bread = "page";
?>

@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)

@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2; ">
		<div class="container">
			<h1 class="main-title__primary">{{ $page->title }}</h1>
			<h3 class="main-title__secondary">{{ $page->description }}</h3>
		</div>
	</div>
	{!! Breadcrumbs::render($bread.'-detail', $page) !!}
	<div class="master-container">
		<div class="container">
			<div class="">
				<main class="col-xs-12  col-md-9" role="main">
					<article class="post tformat-standard hentry">
						@if ($page->featured=="1" && $page->featured_img != null)
						<a href="{{ url($href.$page->href) }}">
							<img src="{{ url('uploads/media/big_'.$page->featured_img) }}" alt="" class="img-responsive wp-post-image" alt="Project Image"/>	
						</a>
						@endif
						<div class="meta-data">
							<time datetime="{!! $page->created_at !!}" class="meta-data__date">{{ Helpers::indonesian_date($page->created_at, "l, d F Y","") }}</time>
							<span class="meta-data__author">By {!! $page->fullName !!}</span>
							<!--
							<span class="meta-data__categories"><a href="blog-single.html">Construction</a> &bull; <a href="blog-single.html">General Information</a></span>	
							<span class="meta-data__comments"><a href="blog-single.html">4 Comments</a></span>
							-->
						</div>
						<h1 class="hentry__title">{{ $page->title }}</h1>
						<div class="hentry__content">
							{!! $page->content !!}
						</div>
						<div class="clearfix"></div>
						<!-- Multi Page in One Post -->
						<!-- 
						<div id="comments">
							<h2 class="alternative-heading">Write a Comment</h2>
							<div id="respond" class="comment-respond">
								
								<form method="post" id="commentform" class="comment-form">
									<p class="comment-notes">
										<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
									</p>	
									<div class="row">
										<div class="col-xs-12 col-sm-6 form-group">
											<label for="author">First and Last name<span class="required theme-clr">*</span></label>
											<input id="author" name="author" type="text" value="" class="form-control" />
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 form-group">
											<label for="email">E-mail Address<span class="required theme-clr">*</span></label>
											<input id="email" name="email" type="email" value="" class="form-control" />
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 form-group">
											<label for="url">Website</label>
											<input id="url" name="url" type="url" value="" class="form-control"/>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 form-group">
											<label for="comment">Your comment<span class="theme-clr">*</span></label>
											<textarea id="comment" name="comment" class="form-control" rows="8"></textarea>
										</div>
									</div>	
									<p class="form-allowed-tags" id="form-allowed-tags">
										You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: 
										<code>
											&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;
											blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q 
											cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; 
										</code>
									</p>	
									<p class="form-submit">
										<input name="submit" type="submit" id="comments-submit-button" class="submit" value="Post Comment"/>
									</p>
								</form>
							</div><!-- #respond 
						</div>-->
					</article>
				</main>
				<div class="col-xs-12  col-md-3">
					<div class="sidebar">
						<div class="widget widget_recent_entries push-down-30">	
							<h4 class="sidebar__headings">Awesome Posts</h4>	
							<ul>
								@foreach ($postTerkini as $news)
								<li><a href="{{ url(Request::segment(1).'/'.$news->href) }}">{{ $news->title }}</a></li>
								@endforeach
							</ul>
						</div>
						
						<div class="widget widget_tag_cloud push-down-30">
							<h4 class="sidebar__headings">Tag Cloud</h4>
							<div class="tagcloud">
								@foreach ($tag as $tag)
									<a href="#" title="4 topics" style="font-size: {{ $font[array_rand($font)] }}pt;">{{ $tag }}</a>
								@endforeach
								<!--
								<a href="#" title="4 topics" style="font-size: 8pt;">Backyard</a>
								<a href="#" title="2 topics" style="font-size: 12pt;">Construction</a>
								-->
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop