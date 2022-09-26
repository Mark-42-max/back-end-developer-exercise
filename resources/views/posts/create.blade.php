<x-layout>
    <section class="wrapper style1 align-center">
        <div class="inner medium">
            <h2>Create Post</h2>
        <form method="post" action="/admin/posts/make" enctype="multipart/form-data">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="font-size: 1rem; color: red; text-align: left">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                {{csrf_field()}}

                <div class="fields">
                    <div class="field ">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{old('title')}}" />
                    </div>
                    <div class="field">
                        <label for="excerpt">Excerpt</label>
                        <input type="text" name="excerpt" id="excerpt" value="" />
                    </div>
                    <div class="field">
                        <label for="body">Body</label>
                        <textarea id="body" name="body" rows="4" cols="50" maxlength="200" >
                            Write here...
                        </textarea>
                    </div>
                    <div class="field">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" />
                    </div>
                    <div class="field">
                        <label for="Categories">Categories</label>
                        <select name="category_id" id="categories">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <ul class="actions special">
                    <li><input type="submit" name="submit" id="submit" value="Make Post" /></li>
                </ul>
            </form>

        </div>
    </section>
</x-layout>
