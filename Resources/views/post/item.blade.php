<div class="single-post-item format-standard mb50">
    <div class="post-social-share-and-like-count">
        <div class="like-count">
            <a href="#"><i class="fa fa-heart-o"></i></a>
            <p>3.1K</p>
        </div>
        {!! Share::page(route('blog.guest-view', ['slug' => $post->slug]))
            			->facebook($post->title)
                    	->twitter($post->title)
                    	->linkedin($post->title)
                    	->whatsapp() !!}
<!--             <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li> -->
<!--             <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> -->
<!--             <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li> -->
<!--             <li><a class="soundcloud" href="#"><i class="fa fa-soundcloud"></i></a></li> -->
        
    </div>
    @if($post->cover_img)
        <div class="post-media">
            <a href="{{ route('blog.guest-view', ['slug' => $post->slug]) }}"><img src="{{ $post->cover_img }}" alt=""></a>
        </div>
    @endif
    <div class="post-details">
        <div class="post-top-meta">
            <div class="post-author">
                <a href="#"><img src="{{ asset('assets/img/mavenoutline-user.jpg') }}" alt=""></a>
                <a class="font18" href="#">{{ $post->user->name }}</a>
            </div>
            <div class="meta-comment-tag">
                <ul>
<!--                     <li><i class="fa fa-comments-o"></i><a href="#">2k Comments</a></li> -->
                    <li><i class="fa fa-tags"></i>
                    	@foreach($post->tags as $tag)
                            <a href="#">{{ $tag->name }}</a>,
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        <h2 class="post-title"><a title="{{ $post->title }}" href="{{ route('blog.guest-view', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
        @if($post->content)
        <div class="post-description">
            {!! $post->content !!}
        </div>
    	@endif
        <div class="post-date-and-category">
            <ul>
                <li><i class="fa fa-calendar"></i> <a href="#">{{ date('d F,Y', strtotime($post->created_at)) }}</a></li>
<!--                 <li><i class="fa fa-bookmark-o"></i> <a href="#">Home Design</a>,<a href="#">Business</a></li> -->
            </ul>
        </div>
    </div>
</div>