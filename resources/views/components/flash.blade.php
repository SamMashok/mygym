@if (session()->has('message'))
    <div class="mt-3">
        <p  id="alert" class='px-5 h5 text-center alert alert-success' style="display:none; position: fixed; right: 0.5%; z-index: 3;">
            {{ session('message') }}
            <button class="rounded-circle btn btn-light" id="alert-x" aria-hidden="true">×</button>
        </p>
    </div>

    <script>
        $(document).ready(function() {
            $("#alert").slideDown("slow", hide);

            function hide()
            {
                setTimeout(() => $(this).slideUp("slow"), 5000);
            }

            $('#alert-x').click(function() {
                $("#alert").slideUp('slow');
            });

        });

    </script>

@endif
@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="mt-3">
            <p  id="error" class='px-5 h5 text-center alert alert-danger' style="display:none; position: fixed; right: 0.5%; z-index: 3;">
            {{ $error }}
                <button class="rounded-circle btn btn-light" id="error-x" aria-hidden="true">×</button>
            </p>
        </div>
    @endforeach


    <script>
        $(document).ready(function() {
            $("#error").slideDown("slow", hide);

            function hide()
            {
                setTimeout(() => $(this).slideUp("slow"), 5000);
            }

            $('#error-x').click(function() {
                $("#error").slideUp('slow');
            });

        });

    </script>
@endif
