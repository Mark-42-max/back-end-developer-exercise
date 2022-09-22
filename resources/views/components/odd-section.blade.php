@props(['post'])


<section class="spotlight onscroll-image-fade-in style2 orient-right content-align-left image-position-center" id="first">
    <div class="content">
        <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
        <p>{{$post->excerpt}}</p>
        <p>Published {{$post->created_at->diffForHumans()}} by <a href="/?authors={{$post->author->username}}">{{$post->author->name}}</a> from <a href="?category={{$post->category->slug}}">{{$post->category->name}}</a></p>
        <ul class="actions stacked">
            <li><a href="/posts/{{$post->slug}}" class="button">Learn More</a></li>
        </ul>
    </div>
    <div class="image">
        <img src="/images/spotlight01.jpg" alt="">
    </div>
</section>
