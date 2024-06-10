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

            </div>
            <div class="row">
                @foreach ($investments as $investment)
                    <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body product-grid-card">
                                <div class="new-arrival-product">
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Plan</h4>
                                        <span class="price">{{ $investment->plan }}</span><br><br>
                                        <h4>Minimum Amount</h4>
                                        <span class="price">${{ $investment->min }}</span><br><br>
                                        <h4>Maximum Amount</h4>
                                        <span class="price">${{ $investment->max }}</span><br><br>
                                        <h4>Duration</h4>
                                        <span class="price">${{ $investment->duration }}</span><br><br>
                                        <h4>Percentage</h4>
                                        <span class="price">{{ $investment->percentage }}</span><br><br>
                                        <form action="{{ route('investments.invest', $investment->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="text-center">
                                                <button class="btn btn-dark light text-center">Invest</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
        <script>
            @if(session('success'))
                toastr.success("{{ session('success') }}", 'Success');
            @endif

            @if(session('error'))
                toastr.error("{{ session('error') }}", 'Error');
            @endif
        </script>
</x-app-layout>
{{--  --}}
