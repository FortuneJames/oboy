<x-app-layout>
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
                                                            {{-- <div class="avatar avatar-xl me-2">
                                                                <img class="rounded-circle img-fluid"
                                                                    src="/images/avatar/1.png" alt=""
                                                                    width="30" />
                                                            </div> --}}
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
{{--  --}}
