<x-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-target="#modal-user-create" data-bs-toggle="modal">
                        <i class="bi bi-person-plus mr-1"></i> Create new user
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>User type</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User Subscriptions</th>
                            <th>Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($sn = 1)
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $sn++ }}</th>
                                <td>
                                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                                </td>
                                <td>
                                    @admin($user)
                                        <small class="badge rounded-pill bg-success ml-2 text-light">Admin</small>
                                    @else
                                        <small class="badge rounded-pill bg-secondary ml-2 text-light">Member</small>
                                    @endadmin
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.subscriptions.index', $user) }}" class="btn btn-primary rounded-pill">View</a>
                                </td>
                                <td>
                                    <form action="{{ route("users.update" , $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="delete" value="delete">
                                        <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('One last chance!\n\nAre you sure you want to delete your Account?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-user-create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right col-md-6">
            <div class="modal-content p-3" style="min-width: 350px !important;">

                <form action="{{ route('users.store') }}" method="POST" class="x-submit" data-then="reload">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel"> Create User account</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <hr class="my-3">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Full Name</label>
                            <input class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <script>
                                document.querySelector('#gender').value = "{{ old('gender') }}";
                            </script>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="type">User Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="1">Member</option>
                                <option value="2">Admin</option>
                            </select>
                            <script>
                                document.querySelector('#type').value = "{{ old('type') }}";
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
