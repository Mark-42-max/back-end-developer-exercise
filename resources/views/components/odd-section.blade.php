@props(['post'])


<section class="spotlight onscroll-image-fade-in style2 orient-right content-align-left image-position-center" id="first">
    <div class="content">
        <h2>{{$post->title}}</h2>
        <p>{{$post->excerpt}}</p>
        <p>Published {{$post->created_at->diffForHumans()}}</p>
        <ul class="actions stacked">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </div>
    <div class="image">
        <img src="images/spotlight01.jpg" alt="">
    </div>
</section>
