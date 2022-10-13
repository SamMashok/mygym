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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Edit Profile</th>
                            <th>Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($sn = 1)
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $sn++ }}</th>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('users.show', $user->id) }}">Edit</a></td>
                            <td><a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('One last chance!\n\nAre you sure you want to delete Account?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
