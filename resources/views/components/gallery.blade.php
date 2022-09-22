@props(['relate'])

<!-- Gallery -->
<div class="gallery style2 medium lightbox onscroll-fade-in">

    @foreach($relate as $related)
        <article>
            <a href="/images/gallery/fulls/01.jpg" class="image">
                <img src="/images/gallery/thumbs/01.jpg" alt="" />
            </a>
            <div class="caption">
                <h3>{{$related->title}}</h3>
                <p>{{$related->excerpt}}</p>
                <ul class="actions fixed">
                    <li><span class="button small">Details</span></li>
                </ul>
            </div>
        </article>
    @endforeach
</div>
