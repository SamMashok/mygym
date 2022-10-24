
<x-layout>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="mb-4">
        <div class="card bg-primary">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg" id="div-avatar">
                                    <img src="{{ $user->photo }}" class="rounded-circle mb-1"
                                         height="150px" width="150px" style="object-fit: cover; object-position: 50% 20%;">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <h4 class="mt-1 mb-1 text-white">{{ $user->name }}</h4>
                                    @admin($user)
                                        <p class="font-13 text-white-50">
                                            Admin
                                        </p>
                                    @else
                                        <p class="font-13 text-white-50">
                                            Member
                                        </p>
                                    @endadmin
                                    <ul class="mb-0 list-inline text-light">
                                        <li class="list-inline-item me-3">
                                            <h5 class="mb-1">Email</h5>
                                            <p class="mb-0 font-13 text-white-50">{{ $user->email }}</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-1">Username</h5>
                                            <p class="mb-0 font-13 text-white-50">{{ $user->username }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-sm-4">
                        <div class="text-center mt-sm-0 mt-3 text-sm-end">

                            <form action="{{ route('photos.update', $user) }}" id="form-photo"  method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <label for="photo" class="btn btn-light">
                                    <i class="mdi mdi-account-edit me-1"></i> Change Photo
                                </label>
                                <input type="file" id="photo" name="photo" onchange="document.querySelector('#form-photo').submit()" style="display: none;"  accept="image/jpeg,image/png">
                            </form>

                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-body/ profile-user-box-->
        </div><!--end profile/ card -->
    </div> <!-- end col-->

    <div class="mb-4">
        <!-- Card -->
        <div class="row">
            <!-- Card Body -->
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="mb-4 mt-3">

                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="update-tab" data-bs-toggle="tab" data-bs-target="#update-tab-pane" role="tab" aria-controls="update-tab-pane" aria-selected="true">Edit Profile</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" role="tab" aria-controls="password-tab-pane" aria-selected="false">Reset Password</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced-tab-pane" role="tab" aria-controls="advanced-tab-pane" aria-selected="false">Advanced</button>
                                </li>

                            </ul>

                        </div>

                        <div class="py-2">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="update-tab-pane" role="tabpanel" aria-labelledby="update-tab" tabindex="0">

                                    <form class="container" action="{{ route("users.update", $user) }}" method="POST" id="update-form">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="email">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="gender">Gender</label>
                                                    <select class="form-control" name="gender" id="gender" required>
                                                        <option></option>
                                                        <option value="M">male</option>
                                                        <option value="F">female</option>
                                                    </select>

                                                    <script>
                                                        document.querySelector('#gender').value = "{{ old('gender', $user->gender) }}";
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary rounded-0 shadow-none">
                                                Update Profile
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">

                                    <form class="container" method="POST" action="{{ route("users.update", $user->id) }}"  id="pwd-form">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Repeat Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary rounded-0">Reset Password</button>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane fade container" id="advanced-tab-pane" role="tabpanel" aria-labelledby="advanced-tab" tabindex="0">
                                    @can('change-usertype', $user)
                                        <div class="card rounded-0 shadow-sm mb-5">
                                            <div class="card-body">
                                                <h5 class="card-title">Change User Type</h5>
                                                <p class="card-text">
                                                    Here you can change the User Status type by simply hitting the button below.
                                                </p>
                                                @admin($user)
                                                    <form action="{{ route("users.update" , $user) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="user_type" value="1">
                                                        <button type="submit" class="btn btn-warning rounded-0">
                                                            Dismiss As Admin
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route("users.update" , $user) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="user_type" value="2">
                                                        <button type="submit" class="btn btn-success rounded-0">
                                                            Make Admin
                                                        </button>
                                                    </form>
                                                @endadmin
                                            </div>
                                        </div>
                                    @endcan
                                    <div class="card rounded-0 shadow-sm mb-5">
                                        <div class="card-body">
                                            <h5 class="card-title">Delete Profile Photo</h5>
                                            <p class="card-text">
                                                This will delete the present profile photo and return to a default profile photo.
                                            </p>
                                            <form action="{{ route('photos.destroy', $user) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="deletePhoto" value="1">
                                                <button type="submit" class="btn btn-danger rounded-0" onclick="return confirm('One last chance!\n\nAre you sure you want to delete User Photo?')">
                                                    Delete Photo
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 shadow-sm mb-5">
                                        <div class="card-body">
                                            <h5 class="card-title">Delete Account</h5>
                                            <p class="card-text">
                                                Here you can terminate User membership from this system and the account will no longer exist. Be very sure you want to carry out this action before hitting the button below.
                                            </p>
                                            <form action="{{ route("users.update" , $user) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="delete" value="delete">
                                                <button type="submit" class="btn btn-danger rounded-0" onclick="return confirm('One last chance!\n\nAre you sure you want to delete your Account?')">
                                                    Delete Account
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function showPasswordTab() {
                $("#update-tab-pane").removeClass("show");
                $("#update-tab-pane").removeClass("active");
                $("#update-tab").removeClass("active");
                $("#password-tab-pane").addClass("show");
                $("#password-tab-pane").addClass("active");
                $("#password-tab").addClass("active");
            }
            @error('password')
                showPasswordTab();
            @enderror
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</x-layout>
