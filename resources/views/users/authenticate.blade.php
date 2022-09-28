<x-layout>
    <form method="post" action="/register/oauth/verify">
        @csrf

        <input type="hidden" name="id" value="{{ $id }}" />
        <div class="form-group">
            <label for="otp">Please check the mail you entered and paste the code</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="Paste the code" aria-describedby="emailHelp">
        </div>
            <li><input type="submit" name="submit" id="submit" value="Submit" /></li>
    </form>

    <script>
        window.onload = function() {
            console.log("otp: " + {{ $otp }});
        };
    </script>
</x-layout>
