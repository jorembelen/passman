<div>

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">

        </div>

    </div>
    <!-- row -->


    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper">
                        <div  class="dataTables_filter">
                            <label>Search:<input type="search" wire:model.debounce.500ms="query" autocomplete="false"></label>
                        </div>
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Date Registered</th>
                                    <th>Total Accounts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        {{ $user->accounts()->count() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
