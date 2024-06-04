<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="d-md-flex align-items-center">
                <div class="page-titles mb-2">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">User Profile</a>
                        </li>
                    </ol>
                </div>
                <div class="ms-auto mb-3">
                    <a href="javascript:void();" class="btn btn-primary btn-rounded add-staff" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Update Profile </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 col-xxl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-sm-flex d-block text-center text-sm-start pb-4 mb-4 border-bottom">
                                <img alt="image" class="rounded me-sm-4 me-0" width="130"
                                    src="images/avatar/1.jpg" />
                                <div class="media-body align-items-center">
                                    <div class="d-sm-flex d-block justify-content-between my-3 my-sm-0">
                                        <div>
                                            <h3 class="fs-22 text-black font-w600 mb-0">
                                                Cive Slauw
                                            </h3>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="media align-items-start">
                                        <span class="p-3 border border-primary-light rounded-circle me-3">
                                            <svg width="22" height="22" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path
                                                        d="M27.5716 13.4285C27.5716 22.4285 16.0001 30.1428 16.0001 30.1428C16.0001 30.1428 4.42871 22.4285 4.42871 13.4285C4.42871 10.3596 5.64784 7.41637 7.8179 5.24631C9.98797 3.07625 12.9312 1.85712 16.0001 1.85712C19.0691 1.85712 22.0123 3.07625 24.1824 5.24631C26.3524 7.41637 27.5716 10.3596 27.5716 13.4285Z"
                                                        stroke="#2BC155" stroke-width="3" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M16.0002 17.2857C18.1305 17.2857 19.8574 15.5588 19.8574 13.4286C19.8574 11.2983 18.1305 9.57141 16.0002 9.57141C13.87 9.57141 12.1431 11.2983 12.1431 13.4286C12.1431 15.5588 13.87 17.2857 16.0002 17.2857Z"
                                                        stroke="#2BC155" stroke-width="3" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="30.8571" height="30.8571" fill="white"
                                                            transform="translate(0.571533 0.571411)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <span class="d-block text-black font-w600 mb-1">Address</span>
                                            <p>
                                                795 Folsom Ave, Suite 600 San Francisco,
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-md-0 mb-3">
                                    <div class="media">
                                        <span class="p-3 border border-primary-light rounded-circle me-3">
                                            <svg width="22" height="22" viewBox="0 0 31 31" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M28.2884 21.7563V25.6138C28.2898 25.9719 28.2165 26.3264 28.073 26.6545C27.9296 26.9826 27.7191 27.2771 27.4553 27.5192C27.1914 27.7613 26.8798 27.9456 26.5406 28.0604C26.2014 28.1751 25.8419 28.2177 25.4853 28.1855C21.5285 27.7555 17.7278 26.4035 14.3885 24.238C11.2817 22.2638 8.64771 19.6297 6.67352 16.523C4.50043 13.1685 3.14808 9.34928 2.72601 5.37477C2.69388 5.0192 2.73614 4.66083 2.8501 4.32248C2.96405 3.98413 3.14721 3.67322 3.38792 3.40953C3.62862 3.14585 3.92159 2.93517 4.24817 2.79092C4.57475 2.64667 4.9278 2.57199 5.28482 2.57166H9.14232C9.76634 2.56552 10.3713 2.78649 10.8445 3.1934C11.3176 3.60031 11.6267 4.16538 11.714 4.78329C11.8768 6.01778 12.1788 7.22988 12.6141 8.39648C12.7871 8.85671 12.8245 9.35689 12.722 9.83775C12.6194 10.3186 12.3812 10.76 12.0354 11.1096L10.4024 12.7426C12.2329 15.9617 14.8983 18.6271 18.1174 20.4576L19.7504 18.8246C20.1001 18.4789 20.5414 18.2406 21.0223 18.1381C21.5031 18.0355 22.0033 18.073 22.4636 18.246C23.6302 18.6813 24.8423 18.9832 26.0767 19.1461C26.7014 19.2342 27.2718 19.5488 27.6796 20.0301C28.0874 20.5113 28.304 21.1257 28.2884 21.7563Z"
                                                    stroke="#2BC155" stroke-width="3" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <span class="d-block text-dark font-w600 mb-1">Phone</span>
                                            <p class="mb-0 font-w600">+00 123 456 7680</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="media">
                                        <span class="p-3 border border-primary-light rounded-circle me-3">
                                            <svg width="22" height="22" viewBox="0 0 31 31" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.14344 5.14331H25.7168C27.1312 5.14331 28.2884 6.30056 28.2884 7.71498V23.145C28.2884 24.5594 27.1312 25.7166 25.7168 25.7166H5.14344C3.72903 25.7166 2.57178 24.5594 2.57178 23.145V7.71498C2.57178 6.30056 3.72903 5.14331 5.14344 5.14331Z"
                                                    stroke="#2BC155" stroke-width="3" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M28.2884 7.71503L15.4301 16.7159L2.57178 7.71503"
                                                    stroke="#2BC155" stroke-width="3" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <span class="d-block text-black font-w600 mb-1">Email</span>
                                            <p class="mb-0 font-w600" >info@examle.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
                    <form>
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="name1" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="name2"
                                        placeholder="Last Name" />
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nationality:</label>
                                    <input type="text" value="12:00" class="form-control " />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Address:  </label>
                                    <input size="16" type="time" value="12:00" class="form-control" />
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="col-form-label">Mobile No:</label>
                                    <input type="text" class="form-control" id="moblie1"
                                        placeholder="Mobile" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label  for="formFileSm" class="col-form-label form-label ">Profile Image</label>
                                    <input class="form-control form-control-sm" id="formFileSm"
                                        type="file" name="image" />
                                </div>

                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button class="btn btn-primary">
                        Update Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
</x-app-layout>
