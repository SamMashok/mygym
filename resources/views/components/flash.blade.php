@if (session()->has('message'))
    <div class="mt-3">
        <p  id="alert" class='px-5 h5 text-center alert alert-success' style="display:none; position: fixed; right: 0.5%; z-index: 3;">
            {{ session('message') }}
        </p>
    </div>
    <script>
        $(document).ready(function () {
            $("#alert").slideDown();

            $("#alert").click(function (){
                $(this).hide(500);
            })
        });
    </script>
@endif
