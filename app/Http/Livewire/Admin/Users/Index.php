<?php
namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $users_id;
    public $name;
    public $email;
    public $password;
    public $avatar;
    public $avatar_upload;
    public $phone;
    public $address;
    public $roles;
    public $active;
    public $created_at;
    public $updated_at;

    public function render()
    {
        return view('livewire.admin.users.index');
    }

    public function update()
    {
        $this->validate([
            "name" => ["required"],
            "email" => ["required"],
        ]);

        $id = auth()->user()->id;
        $edit = User::findOrFail((int)$id);

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

        if(auth()->user()->role == 1) {
            $edit->roles = $this->roles;
            $edit->active = $this->active;
        }
        
        $edit->phone = $this->phone;
        $edit->address = $this->address;
        $edit->updated_at = date('Y-m-d H:i:s');
        $edit->save();

        $this->alert('success', __('action.success_update'), alertsweet('success'));
    }

    public function upload()
    {
        $edit = User::where("id",auth()->user()->id)->first();
        $this->validate([
            'avatar_upload' => 'required|image|max:1024', // 1MB Max
        ]);
        $name_avatar = md5($this->avatar_upload . microtime()).'.'.$this->avatar_upload->extension();

        cekavatar_unlink($edit->avatar);
        $this->avatar_upload->storeAs('public/avatars/', $name_avatar);

        $edit->avatar      = $name_avatar;
        $edit->updated_at  = date('Y-m-d H:i:s');

        $edit->save();
        $this->alert('success', __('action.success_update'), alertsweet('success'));
    }
}