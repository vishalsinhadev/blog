@extends('layouts.app')

@section('header')
<div class="barner-area white">
    <div class="area-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="barner-text mt50">
                    <h1>Blog</h1>
                    <ul class="breadcrumb no-bg mb0">
                        <li><a href="{{ route('site.index') }}">Home</a></li>
                        <li class="active"><a href="{{ route('blog.guest') }}">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="content-area section-padding" id="news">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            	@if($posts == null)
                    <h3 class="meta-item center-block">{{__('web.NO_POSTS')}}</h3>
                @else
                    @each('blog::post.item',$posts,'post')
                    @if($posts->lastPage() > 1)
                        <div class="post-pagination mb50">
                        	{{ $posts->links() }}
                        </div>
                    @endif
                @endif
                
<!--                 <div class="post-pagination mb50"> -->
<!--                     <ul> -->
<!--                         <li><a href="#"><i class="ti-angle-left"></i></a></li> -->
<!--                         <li class="active"><a href="#">2</a></li> -->
<!--                         <li><a href="#">...</a></li> -->
<!--                         <li><a href="#">6</a></li> -->
<!--                         <li><a href="#">7</a></li> -->
<!--                         <li><a href="#"><i class="ti-angle-right"></i></a></li> -->
<!--                     </ul> -->
<!--                 </div> -->
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="widget-alt widgets-area">
<!--                     <div class="single-widgets widget_search"> -->
<!--                         <h4>Search</h4> -->
<!--                         <form action="#" class="search-form"> -->
<!--                             <input type="search" name="search" placeholder="Search.."> -->
<!--                             <button type="submit"><i class="fa fa-search"></i></button> -->
<!--                         </form> -->
<!--                     </div> -->
                    <div class="single-widgets widget_post_with_thumb">
                        <h4>Recent Post</h4>
                        <ul>
                        	@foreach($randomPosts as $recentPost)
                            	<li><img src="assets/img/blog/thumb-4.jpg" alt="" class="alignleft">
                            		<a href="{{ route('blog.guest-view',['slug' => $recentPost->slug]) }}">{{ $recentPost->title }}</a> 
                            		<span class="post-date">
                            			<i class="fa fa-calendar-o"></i>
                            			{{ date('M d Y', strtotime($recentPost->created_at)) }}
                            		</span>
                            	</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single-widgets widget_post_share">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="{{ config('social_link.facebook') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="single-widgets widget_categories">
                        <h4>Categories</h4>
                        <ul>
                        	@foreach($categories as $category)
                            	<li><a href="#">{{ $category->name }} <!-- <span>5</span> --></a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!--<div class="single-widgets widget_tab">
    
                    </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection