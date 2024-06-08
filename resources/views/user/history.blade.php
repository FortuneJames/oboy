{{-- <x-app-layout>
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Deposit Transactions</a>
                    </li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Trans_id</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customers">
                                        @foreach ($deposits as $deposit)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">

                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">{{ $deposit->user->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2">
                                                    <a
                                                        href="mailto:cadena@example.com">{{ $deposit->transaction_id }}</a>
                                                </td>
                                                <td class="py-2">
                                                    <a href="tel:3172737814">{{ $deposit->amount }}</a>
                                                </td>
                                                <td class="py-2 pl-5">
                                                    {{ $deposit->status }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                Content body end
            ***********************************-->

</x-app-layout>
 --}}

<x-app-layout>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Investment History</a>
                    </li>
                </ol>
            </div>

            <!-- Flash Messages for Success or Error -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Invested Amount</th>
                                            <th>Return Amount</th>
                                            <th>Status</th>
                                            <th>Invested At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $history)
                                            <tr>
                                                <td>{{ $history->plan }}</td>
                                                <td>${{ $history->amount }}</td>
                                                <td>${{ $history->return_amount }}</td>
                                                <td>{{ ucfirst($history->status) }}</td>
                                                <td>{{ $history->invested_at }}</td>
                                                <td>
                                                    @if ($history->status === 'active')
                                                        <form action="{{ route('investments.unstake', $history->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('POST')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to unstake this investment?');">Unstake</button>
                                                        </form>
                                                    @else
                                                        <span>N/A</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</x-app-layout>
