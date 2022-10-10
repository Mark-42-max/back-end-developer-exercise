<x-layout>
    <?php $i=0; ?>

    <section class="spotlight onscroll-image-fade-in style3 iphone orient-right content-align-left image-position-center" id="first">
        <div class="content">
            <h2>{{$returnData['userData']->name}}</h2>
            <p>{{$returnData['userData']->email}}</p>
            <ul class="actions stacked">
                <li>Username: {{$returnData['userData']->username}}</li>
                <li>
                    Authorized:
                    @if($returnData['userData']->is_authorized == 0)
                        <span class="txt-danger">No</span>
                    @else
                        <span>Yes</span>
                    @endif
                </li>
                <li>
                    Admin:
                    @if($returnData['userData']->admin == 0)
                        <span class="txt-danger">No</span>
                    @else
                        <span>Yes</span>
                    @endif
                </li>
                <li>
                    @if($returnData['userData']->email == \Illuminate\Support\Facades\Auth::user()->email)
                        <a href="admin/posts/create" class="button">CREATE POST</a>
                    @endif
                </li>
            </ul>
        </div>
        <div class="image">
            <img src="images/userimage.jpg" alt="">
        </div>
    </section>

    @if($returnData['postDetails']->count())
        @foreach($returnData['postDetails'] as $post)

            @if($i%2 == 0)
                <x-even-section :post="$post" />
            @else
                <x-odd-section :post="$post" />
            @endif
                <?php $i++; ?>
        @endforeach
    @else
        <div style="width: 100%; height: 70vh;display: flex; flex-direction: column; justify-content: center; align-items: center">
            <img src="/images/empty.jpg" alt="" style="width: 30%; height: 50%">
            <h2>No posts like that yet</h2>
        </div>
    @endif
    <x-footer />
</x-layout>
