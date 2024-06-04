<x-app-layout>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">


            <!-- row -->
            <div class="row">

            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#my-posts" data-bs-toggle="tab"
                                                class="nav-link active show">Withdrawal Method</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-posts" class="tab-pane fade active show">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Fill in your current details to avoid
                                                        financial lost !!</h4>
                                                    <form method="POST" action="{{ route('user.withdraws') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Enter Amount</label>
                                                                <input type="number" name="amount"
                                                                    placeholder="Amount" class="form-control"
                                                                    required />
                                                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-2">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control" placeholder="btc" />
                                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                            </div>

                                                            <div class="mb-3 col-md-2">
                                                                <label class="form-label">Network</label>
                                                                <input type="text" name="network"
                                                                    class="form-control"  placeholder="trc20"/>
                                                                <x-input-error :messages="$errors->get('network')" class="mt-2" />
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Address</label>
                                                                <input type="text" name="address"
                                                                    class="form-control" placeholder="sgtf345wfgvbfgew454wegsbf34t5" />
                                                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Withdraw</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Modal -->

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
