<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersLog extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $paginate    = 10;
    public $search      = "";
    public $filter      = "";
    public $sortField   = 'id';
    public $sortBy      = 'desc';


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
            $tables = DB::table('users_log')->where('status','like',$search)
                        ->orWhere('email','like',$search)
                        ->orderBy($this->sortField, $this->sortBy)
                        ->paginate($this->paginate);

        }else{
            $tables = DB::table('users_log')->orderBy($this->sortField, $this->sortBy)
                        ->paginate($this->paginate);

        }

        $arrayColumn = [
                'No'        => 'id',
                'IP'        => 'ip',
                'Location'  => 'location',
                'Browser'   => 'browser',
                'Status'    => 'status',
                'E-mail'    => 'email',
                'Created At'=> 'created_at'
            ];

        $arraySearch = 'E-mail & Status';

        $data = [
                'tables'        => $tables,
                'arrayColumn'   => $arrayColumn,
                'arraySearch'   => $arraySearch,
            ];

        return view('livewire.admin.users.users-log', $data);
    }
}
