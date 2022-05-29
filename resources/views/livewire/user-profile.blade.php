<div>


    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img avatar="{{ auth()->user()->name }}"  alt="{{ auth()->user()->name }}" class="rounded-circle"/>
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                <p>{{ auth()->user()->role_id == 1 ? 'Admin' : 'User' }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                <p>Email</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div> --}}

</div>
