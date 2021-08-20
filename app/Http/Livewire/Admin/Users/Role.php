<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Role extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $paginate    = 10;
    public $search      = "";
    public $filter      = "";
    public $sortField   = 'id';
    public $sortBy      = 'desc';
    public $updateMode  = false;
    public $deleteMode  = false;
    public $pk_id       = "";

    public $users_role_id = "";
    public $name_role = "";
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
            $tables = DB::table('users_role')->where('name_role','like',$search)
                        ->orderBy($this->sortField, $this->sortBy)
                        ->paginate($this->paginate);

        }else{
            $tables = DB::table('users_role')->orderBy($this->sortField, $this->sortBy)
                        ->paginate($this->paginate);

        }

        $arrayColumn = [
                'No'        => 'id',
                'Name Role' => 'name_role',
                'Created At'=> 'created_at'
            ];

        $arraySearch = 'Name Role';

        $data = [
                'tables'        => $tables,
                'arrayColumn'   => $arrayColumn,
                'arraySearch'   => $arraySearch,
            ];

        return view('livewire.admin.users.role', $data);
    }

    public function resetInputFields()
    {
        $this->name_role = "";
        $this->created_at = "";
        $this->updated_at = "";
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $users_role = DB::table('users_role')->where("id", $id)->first();
        $this->name_role = $users_role->name_role;
        $this->created_at = $users_role->created_at;
        $this->updated_at = $users_role->updated_at;
        $this->pk_id = $users_role->id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            "name_role" => ["required"],
        ]);

        DB::table('users_role')->insert([
            "name_role"  => $this->name_role,
            "created_at" => date('Y-m-d H:i:s'),
        ]);

        $this->resetInputFields();
        $this->alert('success', __('action.success_create'), alertsweet('success'));
    }

    public function update()
    {        
        $this->validate([
            "name_role" => ["required"],
        ]);

        $id = $this->pk_id;
        DB::table('users_role')->where('id', (int)$id)->update([
            "name_role"  => $this->name_role,
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        $this->alert('success', __('action.success_update'), alertsweet('success'));
    }

    public function delete_confirm($id)
    {
        $this->deleteMode = true;
        $this->pk_id      = $id;
    }

    public function delete($id)
    {
        if($id){
            DB::table('users_role')->where("id",$id)->delete();
            $this->alert('success', __('action.success_delete'), alertsweet('success'));
        }
        $this->deleteMode = false;
    }
}
