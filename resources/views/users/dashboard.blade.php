
<x-layout>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    @if(user()->subscriptions->isEmpty())
    
        <div class="card shadow mb-4"> 
            <div class="card-body">
                <div class="text-center py-3">
                    <img src="{{ asset("img/sub2.png") }}" width="150" alt="">
                    <h4 class="mt-3">Hey! {{ user()->username }}, you haven't made any subscriptions yet.</h4>
                     <br>
                    <p>Click the button below to make your first subscription.</p>

                    <p class="mt-3">
                        <a href="{{ route("users.subscriptions.index", user()) }}" class="btn btn-primary">Make first subscription</a>
                    </p>
                </div>
            </div>
        </div> 
    @endif           

   
    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-1">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total number of Subscriptions for this month</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $monthly_sub }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="ml-0">
                        <a href="{{ route("users.subscriptions.index", user()) }}" class="btn btn-sm btn-primary rounded-0 shadow-sm mt-3">
                            View all subscriptions
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total amount of Successful Subscriptions for this month </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                NGN{{ $tot_amount }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="ml-0">
                        <a href="{{ route("users.subscriptions.index", user()) }}" class="btn btn-sm btn-success rounded-0 shadow-sm mt-3">
                            View Statement
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
