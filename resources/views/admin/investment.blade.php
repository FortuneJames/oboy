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
                            <a href="javascript:void(0)">All Investment Plans</a>
                        </li>
                    </ol>
                </div>
                <div class="ms-auto mb-3">
                    <a href="javascript:void();" class="btn btn-primary btn-rounded add-staff" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Update Investment </a>
                </div>
            </div>
            <div class="row">
                @foreach ($investments as $investment)
                    <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body product-grid-card">
                                <div class="new-arrival-product">
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Plan</h4>
                                        <span class="price">{{$investment->plan}}</span><br>
                                        <h4>Minimum Amount</h4>
                                        <span class="price">${{$investment->min}}</span><br>
                                        <h4>Maximum Amount</h4>
                                        <span class="price">${{$investment->max}}</span><br>
                                        <h4>Duration</h4>
                                        <span class="price">{{$investment->duration}}</span>
                                        <h4>Percentage</h4>
                                        <span class="price">{{$investment->percentage}}</span>
                                    </div>
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
                    <form method="POST" action="{{ route('admin.submit') }}">
                        @csrf
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Basic Plan:</label>
                                    <input type="text" class="form-control" name="plan" id="name1"
                                        placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Minimum:</label>
                                    <input type="text" class="form-control" name="min" id="name2"
                                        placeholder="min" />
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Maximum:</label>
                                    <input type="text" class="form-control" name="max" id="name2"
                                        placeholder="max" />
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Duration:</label>
                                    <input type="text" class="form-control" name="duration" id="name2"
                                        placeholder="duration" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Percentage:</label>
                                    <input type="text" class="form-control" name="percentage" id="name2"
                                        placeholder="percentage" />
                                </div>
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button class="btn btn-primary">
                                    create
                                </button>
                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
