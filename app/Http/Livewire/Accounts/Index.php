<?php

namespace App\Http\Livewire\Accounts;

use App\Models\Account;
use App\Models\User;
use App\Rules\CheckPass;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public $name, $email, $username, $password, $acctId, $value, $require_password, $my_password, $notes;
    public $query = null;
    public $showPass = false;

    protected $messages = [
        'value.required' => 'Please select number of characters.'
    ];

    public function mount()
    {
        $this->query = null;
    }

    public function render()
    {
        $accounts = Account::search($this->query)
        ->whereuser_id(auth()->id())
        ->latest()
        ->paginate(10);

        return view('livewire.accounts.index', compact('accounts'))->extends('layouts.master');
    }

    public function add()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function show(Account $account)
    {
        $this->acctId = $account->id;
        $this->my_password = null;
        $this->dispatchBrowserEvent('show-viewPass-form');
    }

    public function editWithPass(Account $account)
    {
        $this->acctId = $account->id;
        $this->my_password = null;
        $this->dispatchBrowserEvent('show-viewEditPass-form');
    }

    public function enterpass(Account $account)
    {
        $this->validate([
            'my_password' => ['required', new CheckPass($this->my_password)],
        ]);
        $this->view($account);
        $this->dispatchBrowserEvent('hide-form');
    }

    public function enterEditPass(Account $account)
    {
        $this->validate([
            'my_password' => ['required', new CheckPass($this->my_password)],
        ]);
        $this->edit($account);
        $this->dispatchBrowserEvent('hide-form');
    }

    public function view(Account $account)
    {
        $this->dispatchBrowserEvent('show-info-form');
        $this->name = $account->name;
        $this->email = $account->email;
        $this->username = $account->username;
        $this->require_password = $account->require_password;
        $this->acctId = $account->id;
    }

    public function edit(Account $account)
    {
        $this->dispatchBrowserEvent('show-edit-form');
        $this->name = $account->name;
        $this->email = $account->email;
        $this->username = $account->username;
        $this->require_password = $account->require_password == 1 ? true : false;
        $this->acctId = $account->id;
    }

    public function update($acctId)
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'nullable|email|required_without:username',
            'username' => 'required_without:email',
            'password' => 'nullable',
            'notes' => 'nullable',
            'require_password' => 'required',
        ]);
        $account = Account::findOrFail($acctId);

        $data['password'] = $this->password ? Crypt::encryptString($this->password) : $account->password;
        $account->update($data);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Account was successfully updated.',
            'text' => '',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('hide-form');

    }

    public function generate()
    {
        $this->validate([
            'value' => 'required',
        ]);

        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.'0123456789!@#$%^&*';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i=0; $i < $this->value; $i++)
        $str .= $chars[random_int(0, $max)];

        $this->password = $str;
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'nullable|required_without:username|email',
            'username' => 'required_without:email',
            'password' => 'required',
            'notes' => 'nullable',
        ]);

        $user = User::findOrFail(auth()->id());
        DB::beginTransaction();
        if($user){
            if($this->require_password){
                $data['require_password'] = 1;
            }
            $data['password'] = Crypt::encryptString($this->password);

            $user->accounts()->create($data);
            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Account was successfully added.',
                'text' => '',
            ]);
            $this->resetInput();
            $this->dispatchBrowserEvent('hide-form');
        }else{
            DB::rollBack();
            return redirect()->back();
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->username = null;
        $this->password = null;
        $this->value = null;
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('hide-form');
        $this->resetInput();
        $this->showPass = false;
    }

    public function alertConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'text' => 'Are you sure? If deleted, you will not be able to recover this data!',
            'id' => $id
        ]);
    }

    public function delete(Account $account)
    {
        $account->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Account was successfully deleted.',
            'text' => '',
        ]);
        return back();
    }

    public function showPass($acctId)
    {
        $this->showPass = !$this->showPass;
        $account = Account::findOrFail($acctId);
        $this->password = Crypt::decryptString($account->password);

    }

}