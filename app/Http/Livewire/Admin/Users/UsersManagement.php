<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $paginate    = 10;
    public $search      = "";
    public $filter      = "";
    public $sortField   = 'id';
    public $sortBy      = 'desc';
    public $pk_id       = "";

    public $name = "";
    public $email = "";
    public $password = "";
    public $avatar = "";
    public $phone = "";
    public $address = "";
    public $roles = "";
    public $active = "";
    public $created_at = "";
    public $updated_at = "";

    public function sortByTable($id, $column)
    {
        $this->sortField = $column;
        if($this->sortBy == 'desc'){ $this->sortBy  = 'asc'; }else{ $this->sortBy  = 'desc'; }
    }

    public function render()
    {
        if(!empty($this->search))
        {
            $search = '%'.$this->search.'%';
            $tables = DB::table('users')
                        ->leftJoin('users_role','users.roles','=','users_role.id')
                        ->select('users_role.name_role','users.*')
                        ->whereRaw('users.email like ? or users.name like ? or users.phone like ?', [
                                $search, $search, $search
                            ])->orderBy($this->sortField, $this->sortBy)
                            ->paginate($this->paginate);

        }else{
            $tables = DB::table('users')
                        ->leftJoin('users_role','users.roles','=','users_role.id')
                        ->select('users_role.name_role','users.*')
                        ->orderBy($this->sortField, $this->sortBy)
                        ->paginate($this->paginate);

        }

        $arrayColumn = [
                'No'        => 'id',
                'Avatar'    => 'avatar',
                'E-mail'    => 'email',
                'Name'      => 'name',
                'Phone'     => 'phone',
                'Roles'     => 'name_role',
                'Active'    => 'active',
            ];

        $arraySearch = 'E-mail, Name & Phone';

        $data = [
                'tables'        => $tables,
                'arrayColumn'   => $arrayColumn,
                'arraySearch'   => $arraySearch,
            ];

        return view('livewire.admin.users.users-management', $data);
    }

    public function resetInputFields()
    {
        $this->name = "";
        $this->email = "";
        $this->email_verified_at = "";
        $this->password = "";
        $this->avatar = "";
        $this->phone = "";
        $this->address = "";
        $this->roles = "";
        $this->active = "";
        $this->remember_token = "";
        $this->created_at = "";
        $this->updated_at = "";
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $users = User::where("id",$id)->first();
        $this->name = $users->name;
        $this->email = $users->email;
        $this->password = "";
        $this->avatar = $users->avatar;
        $this->phone = $users->phone;
        $this->address = $users->address;
        $this->roles = $users->roles;
        $this->active = $users->active;
        $this->created_at = $users->created_at;
        $this->updated_at = $users->updated_at;
        $this->pk_id = $users->id;
    }

    public function delete_confirm($id)
    {
        $this->deleteMode = true;
        $this->pk_id = $id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            "name" => ["required"],
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "password" => ['required', 'string', 'min:8'],
            "roles" => ["required"],
            "active" => ["required"],
        ]);

        User::insert([
            "name"  => $this->name,
            "email"  => $this->email,
            "password"  => Hash::make($this->password),
            "roles"  => $this->roles,
            "active"  => $this->active,
            "created_at"  => date('Y-m-d H:i:s'),
        ]);
        $this->resetInputFields();
        $this->alert('success', __('action.success_create'), alertsweet('success'));
    }

    public function update()
    {        
        $this->validate([
            "name" => ["required"],
            "email" => ['required', 'string', 'email'],
            "roles" => ["required"],
            "active" => ["required"],
        ]);

        $id = $this->pk_id;
        $edit = User::findOrFail((int)$id);
        $edit->name = $this->name;

        if($edit->email == $this->email) {
            $edit->email = $this->email;
        }else{
            $this->validate([
                "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $edit->email = $this->email;
        }

        if(!empty($this->password)) {
            $this->validate([
                "password" => ['required', 'string', 'min:8'],
            ]);
            $edit->password = Hash::make($this->password);
        }

        $edit->phone = $this->phone;
        $edit->address = $this->address;
        $edit->roles = $this->roles;
        $edit->active = $this->active;
        $edit->updated_at = date('Y-m-d H:i:s');
        $edit->save();

        $this->alert('success', __('action.success_update'), alertsweet('success'));
    }

    public function delete($id)
    {
        if($id){
            User::where("id",$id)->delete();
            $this->alert('success', __('action.success_delete'), alertsweet('success'));
        }

        $this->deleteMode = false;
    }
}