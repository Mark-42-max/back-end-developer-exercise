

<x-layout >

<!-- Wrapper -->
<div id="wrapper" class="divided">

    <!-- One -->
    <section class="banner onload-image-fade-in onload-content-fade-right style2 fullscreen orient-center content-align-center image-position-center">
        <div class="content">
            <h1>Travel Blogs</h1>
            <p class="major">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dolorem explicabo ipsam laudantium nemo nulla voluptas voluptate. Consectetur consequatur consequuntur doloremque eveniet fugit modi saepe similique. A aliquam aut beatae cumque et ipsam iure labore laborum, maxime minima modi nesciunt quos, sapiente sit totam, veritatis vitae. Doloribus fugiat nesciunt repudiandae?</p>
            <ul class="actions spotlight style1" style="width: 110%">
                <li><a href="#first" class="button big wide smooth-scroll-middle">Get Started</a></li>
                <li><a href="#" class="button big wide smooth-scroll-middle">Sign In</a></li>
                <li><a href="#" class="button big wide smooth-scroll-middle">Sign Up</a></li>
            </ul>

            @if(!Request::is('/') || Request::exists('category') || Request::exists('author') || Request::exists('search'))
                <a href="/" class="button big wide smooth-scroll-middle">Back to Home</a>
            @endif
        </div>
        <div class="content" style="margin-left: 3rem">
            <form method="GET" action="#">
                <fieldset>
                    <legend>WHAT ARE YOU LOOKING FOR?</legend>
                    <form method="GET" action="#">

                        @if(request('category'))
                            <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                        <input type="text" name="search" placeholder="Find something"
                               class="bg-transparent placeholder-black font-semibold text-sm" value="{{request('search')}}">
                    </form>
                </fieldset>
            </form>
            <h4>After search press enter to get search results. You can also select category filter</h4>
            <div class="suggestion-wrap">
                <div x-data="{show: false}" @click.away="show = false">
                    <button @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold inline-flex">
                        {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </button>

                    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display: none">

                        @foreach($categories as $category)
                            <a href="?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">{{ucwords($category->name)}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="image">
            <img src="/images/banner.jpg" alt="" />
        </div>
    </section>

    <?php $i=0; ?>

    @if($posts->count())
        @foreach($posts as $post)

            @if($i%2 == 0)
                <x-even-section :post="$post" />
            @else
                <x-odd-section :post="$post" />
            @endif
            <?php $i++; ?>
        @endforeach

        {{$posts->links()}}
    @else
        <div style="width: 100%; height: 70vh;display: flex; flex-direction: column; justify-content: center; align-items: center">
            <img src="/images/empty.jpg" alt="" style="width: 30%; height: 50%">
            <h2>No posts like that yet</h2>
        </div>
    @endif

    <x-footer />

</div>
</x-layout>
