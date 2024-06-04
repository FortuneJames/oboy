<x-app-layout>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center">
                <div class="page-titles mb-2">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">All Payments Plans</a>
                        </li>
                    </ol>
                </div>
                <div class="ms-auto mb-3">
                    <a href="javascript:void();" class="btn btn-primary btn-rounded add-staff" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Update Payment </a>
                </div>
            </div>
            <div class="row">
                @foreach ($payments as $payment)
                    <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">

                        <div class="card">
                            <div class="card-body product-grid-card">
                                <div class="new-arrival-product">

                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{ $payment->name }}</h4>
                                        <h4>{{ $payment->network }}</h4>

                                        <span class="price">{{ $payment->address }}</span>
                                    </div>
                                    <form method="POST" action="{{ route('admin.delete', ['id' => $payment->id]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">
                                                Delete
                                            </button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.payments') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name1"
                                        placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Address:</label>
                                    <input type="text" name="address" class="form-control" id="name2"
                                        placeholder="Address" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Network:</label>
                                    <input type="text" name="network" class="form-control" id="name2"
                                        placeholder="Network" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button class="btn btn-primary" type="submit">
                                Create Payment
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
