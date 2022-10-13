@if (session()->has('message'))
    <div class="mt-3">
        <p  id="alert" class='px-5 h5 text-center alert alert-success' style="display:none; position: fixed; right: 0.5%; z-index: 3;">
            {{ session('message') }} <span id="alert-x" aria-hidden="true">×</span>
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
