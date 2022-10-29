<x-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Subscriptions</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Subscriptions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        @admin
                            <th>Name</th>
                        @endadmin
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                @admin
                                    <td>
                                        <a href="{{ route('users.subscriptions.index', $subscription->user) }}" class="">
                                            {{ $subscription->user->name }}
                                        </a>
                                    </td>
                                @endadmin
                                <td>{{ $subscription->date }}</td>
                                <td>{{ $subscription->amount }}</td>
                                @paid($subscription)
                                    <td>
                                        <small class="badge bg-success ml-2 text-light">Fully Paid</small>
                                    </td>
                                    <td>
                                        <small><a href="{{ route('users.subscriptions.show', [$subscription->user, $subscription]) }}" class="btn btn-primary rounded-0 ml-5">View Receipt</a></small>
                                    </td>
                                @else
                                    <td>
                                        <small class="badge bg-warning ml-2 text-light">pending</small>
                                    </td>
                                    <td>
                                        <small><a href="" class="btn btn-warning rounded-0 ml-5">Retry Payment</a></small>
                                    </td>
                                @endpaid
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @unlessadmin
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Subscription Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Renew Subscription</h6>
                    </div>
                    <div class="card-body">
                        <form class="container" method="POST" action="{{ route('users.subscriptions.store', $subscription->user) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label h6" for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date" value="" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label h6" for="amount">Amount</label>
                                <select class="form-control" name="amount" id="amount" required>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary rounded-0">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endadmin
</x-layout>

