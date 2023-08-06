<x-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Subscriptions</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if($subscriptions->isEmpty() && user()->isMember())
            <div class="card-body">
                <div class="text-center py-3">
                    <img src="{{ asset("img/sub.png") }}" width="150" alt="">
                    <h4 class="mt-3">Ready to make your first Subscription?</h4>
                     <br>
                    <p>Click button below to Subscribe.</p>

                    <p class="mt-3">
                        <a href="#date" class="btn btn-success">Subscribe</a>
                    </p>
                </div>
            </div>
        @else
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
                                            @subscriptionRoute
                                                <a href="{{ route('users.show', $subscription->user) }}" class="">
                                                    {{ $subscription->user->name }}
                                                </a>
                                            @else
                                                <a href="{{ route('users.subscriptions.index', $subscription->user) }}" class="">
                                                    {{ $subscription->user->name }}
                                                </a>
                                            @endsubscriptionRoute
                                        </td>
                                    @endadmin
                                    <td>{{ $subscription->date }}</td>
                                    <td>{{ $subscription->amount }}</td>
                                    @paid($subscription)
                                        <td>
                                            <small class="badge bg-success ml-2 text-light">Successful</small>
                                        </td>
                                        <td>
                                            <small><a href="{{ route('subscriptions.show', $subscription) }}" class="btn btn-primary rounded-0 ml-5">View Receipt</a></small>
                                        </td>
                                    @else
                                        <td>
                                            <small class="badge bg-warning ml-2 text-light">pending</small>
                                        </td>
                                        <td>
                                            <small>
                                                <form action="{{ route("api.subscriptions.show", $subscription) }}" method="POST" class="x-submit" data-then="reload">
                                                    <button type="submit" class="btn btn-warning rounded-0 ml-5">
                                                        Retry Payment
                                                    </button>
                                                </form>
                                            </small>
                                        </td>
                                    @endpaid
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
    @subscriptionRoute
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Subscription Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Subscribe here</h6>
                    </div>
                    <div class="card-body">
                        <form class="container x-submit" method="POST" action="{{ route('api.users.subscriptions.store', $user) }}" data-then="reload">
                            <div class="mb-3">
                                <label class="form-label h6" for="date">date</label>
                                <input type="date" class="form-control" name="date" id="date" value="" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label h6" for="amount">amount</label>
                                <select class="form-control" name="amount" id="amount" required>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary rounded-0">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsubscriptionRoute

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack({data}) {

            let handler = PaystackPop.setup({
                key: @js(config('services.paystack.pk')), // Replace with your public key
                email: data.subscription.user.email,
                amount: data.subscription.amount * 100,
                ref: data.subscription.reference, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"

                onClose: function(){
                    swal({
                        title: "Something went wrong.",
                        icon: "warning",
                        buttons: {
                            tryAgain: {
                                text: "Try Again",
                                value: "try_again",
                            },
                            contactSupport: {
                                text: "Cancel",
                                value: "cancel",
                            },
                        },
                        dangerMode: true,
                    }).then((value) => {
                        switch (value) {
                            case "try_again":
                                payWithPaystack({data});
                                break;
                            case "cancel":
                                location.reload();
                                break;
                            default:
                                location.reload();
                        }
                    });
                },
                callback: function(response){
                    swal({
                        title: "Subscription Successful.",
                        icon: "success",
                        buttons: "OK",
                    });
                    setTimeout(() => location.reload(), 3000);
                }
            });
            handler.openIframe();
        }
    </script>
</x-layout>

