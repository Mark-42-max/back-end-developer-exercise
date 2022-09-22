<x-layout>

    <section class="wrapper style1 align-center">
        <div class="inner">
            <header>
                <h1>{{$post->title}}</h1>
                <p>Published {{$post->created_at->diffForHumans()}}</p>
                <h4>By <a href="/?authors={{$post->author->username}}">{{$post->author->name}}</a> from <a href="/?category={{$post->category->slug}}">{{$post->category->name}}</a></h4>
                <a href="/" class="button big wide smooth-scroll-middle">Back to Home</a>
            </header>
            <div class="index align-left">

                <!-- Text -->
                <section>
                    <div>
                        <img src="/images/pic01.jpg" alt="pic01" class="style1"/>
                    </div>
                    <div class="content" style="padding-left: 3rem; overflow-y: scroll; height: 70vw">

                        <p>
                            {{$post->body}}
                        </p>

                    </div>
                </section>
            </div>
        </div>
    </section>

    <x-gallery :relate="$relatedPosts"/>

    <x-footer />
</x-layout>
