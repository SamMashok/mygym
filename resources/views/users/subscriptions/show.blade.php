<x-layout>

    <div class="mb-4">
        <!-- Card -->
        <div class="row">
            <!-- Card Body -->
            <div class="col-md-8 offset-md-2">
                <!-- Subscription Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Subscription Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Member</th>
                                <td>{{ $subscription->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Amount paid</th>
                                <td>1000</td>
                            </tr>
                            <tr>
                                <th>Transaction ID</th>
                                <td>{{ $subscription->reference }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>Successful</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    <button class="shadow shadow-sm btn btn-outline-primary">Print</button>
                    <button class="shadow shadow-sm btn btn-primary ml-4">Share</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>

