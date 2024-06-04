<x-app-layout>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">All Users And Their Withdrawal
                            Details</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ALL USERS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>

                                            <th>NO.</th>
                                            <th>Name</th>
                                            <th>Coin Name</th>
                                            <th>Network</th>
                                            <th>Address</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Trans_Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersWithWithdrawals as $user)
                                            @foreach ($user->withdrawals as $withdrawal)
                                                <tr>

                                                    <td><strong>{{ $withdrawal->id }}</strong></td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><span
                                                                class="w-space-no">{{ $withdrawal->user->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $withdrawal->name }} </td>
                                                    <td>{{ $withdrawal->network }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-success me-1"></i>
                                                            {{ $withdrawal->address }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $withdrawal->amount }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.withdrawals', $withdrawal->id) }}"
                                                            id="statusForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" onchange="submitForm()">
                                                                <option value="Pending"
                                                                    {{ strcasecmp($withdrawal->status, 'Pending') == 0 ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="Approved"
                                                                    {{ strcasecmp($withdrawal->status, 'Approved') == 0 ? 'selected' : '' }}>
                                                                    Approved</option>
                                                            </select>
                                                        </form>

                                                        <script>
                                                            function submitForm() {
                                                                document.getElementById("statusForm").submit();
                                                            }
                                                        </script>
                                                    </td>
                                                    <td>{{ $withdrawal->transaction_id }}</td>

                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="#"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
