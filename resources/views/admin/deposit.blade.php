<x-app-layout>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">All User Deposit Details</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Users Deposit Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>

                                            <th>NO.</th>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Trans_Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersWithDeposits as $user)
                                            @foreach ($user->deposits as $deposit)
                                                <tr>

                                                    <td><strong>{{ $deposit->id }}</strong></td>
                                                    <td>
                                                        <div class="d-flex align-items-center"> <span
                                                                class="w-space-no">{{ $deposit->user->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $deposit->user->email }}</td>
                                                    <td>{{ $deposit->amount }}</td>
                                                    <td>
                                                        <img src="/storage/images/{{$deposit->image}}"
                                                             width="50" height="50">

                                                    </td>


                                                    <td>

                                                        <form method="POST" action="{{ route('admin.status', $deposit->id) }}" id="statusForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" onchange="submitForm()">
                                                                <option value="Pending" {{ strcasecmp($deposit->status, 'Pending') == 0 ? 'selected' : '' }}>Pending</option>
                                                                <option value="Approved" {{ strcasecmp($deposit->status, 'Approved') == 0 ? 'selected' : '' }}>Approved</option>
                                                            </select>
                                                        </form>

                                                        <script>
                                                            function submitForm() {
                                                                document.getElementById("statusForm").submit();
                                                            }
                                                        </script>

                                                    </td>

                                                    <td>{{ $deposit->transaction_id }}</td>

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
