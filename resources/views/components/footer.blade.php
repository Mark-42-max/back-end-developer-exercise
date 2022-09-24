<!-- Seven -->
<section class="wrapper style1 align-center">
    <div class="inner medium">
        <h2>Get in touch</h2>
        <form method="post" action="/message">
            {{csrf_field()}}
            <div class="fields">
                <div class="field half">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="" />
                </div>

                @auth
                    <div class="field half">
                        <label for="email">Email</label>
                        <input readonly type="email" name="email" id="email" value="{{auth()->user()->email}}" />
                    </div>
                @else
                    <div class="field half">
                        <label for="email">Email</label>
                        <input readonly type="email" name="email" id="email" value="Please login to continue..." />
                    </div>
                @endauth
                <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="6"></textarea>
                </div>
            </div>
            <ul class="actions special">
                @auth
                    <li><input type="submit" name="submit" id="submit" value="Send Message" /></li>
                @else
                    <li><a href="/login" class="button big wide smooth-scroll-middle">Login to send message</a></li>
                @endauth
            </ul>
        </form>

    </div>

    <div id="newsletter" class="inner medium">
        <h2>Subscribe to our newsletter</h2>
        <form method="post" action="/newsletter">
            {{csrf_field()}}
            <div class="fields">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" />
                </div>
            </div>

            <ul class="actions special">
                <li><input type="submit" name="submit" id="submit" value="Subscribe" /></li>
            </ul>

            @error('email')
                <script>
                    swal("Error", "{{$message}}", "error");
                </script>
            @enderror
        </form>

    </div>
</section>

<!-- Footer -->
<footer class="wrapper style1 align-center">
    <div class="inner">
        <ul class="icons">
            <li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands style2 fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p>&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </div>
</footer>
