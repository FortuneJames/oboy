<x-app-layout>
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User Details</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">


                <div class="col-xl-9 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="post-details">

                                <div class="comment-respond" id="respond">
                                    <form class="comment-form" method="post"
                                        action="{{ route('admin.update', $user->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="profit" class="text-black font-w600">Balance<span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control"
                                                    placeholder="{{ $user->balance }}"
                                                        name="balance" id="profit">
                                                    <x-input-error :messages="$errors->get('balance')" class="mt-2" />

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="profit" class="text-black font-w600">Profit <span
                                                            class="required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control"
                                                        placeholder="{{ $user->profit }}"
                                                            name="profit" id="profit">
                                                        <x-input-error :messages="$errors->get('profit')" class="mt-2" />

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="profit" class="text-black font-w600">Bonus<span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control"
                                                       placeholder="{{ $user->profit }}"  name="bonus"
                                                        id="profit">
                                                    <x-input-error :messages="$errors->get('bonus')" class="mt-2" />

                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group">
                                                    <button class="submit btn btn-primary"
                                                        id="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
