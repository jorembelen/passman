<div>


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">

        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <button type="button" class="btn btn-outline-primary btn-sm" wire:click.prevent="add">Add Account</button>
            </ol>
        </div>
    </div>
    <!-- row -->


    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Accounts List</h4>
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
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Notes</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->username }}</td>
                                    <td>{{ $account->notes }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-info shadow btn-xs sharp mr-1" wire:click.prevent="{{ $account->require_password == 1 ? 'show' : 'view' }}('{{ $account->id }}')"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" wire:click.prevent="{{ $account->require_password == 1 ? 'editWithPass' : 'edit' }}('{{ $account->id }}')"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp" wire:click.prevent="alertConfirm('{{ $account->id }}')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $accounts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.includes.modal')

</div>


@push('copy-js')
<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
        document.execCommand('view');
        document.execCommand('edit');
    }
</script>
@endpush
