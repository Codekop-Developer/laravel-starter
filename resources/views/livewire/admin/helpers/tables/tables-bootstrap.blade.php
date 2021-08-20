<div class="card css-rounded">
    <div class="card-body p-0">
        <div class="table-responsive css-rounded">
            <table class="table table-striped table-hover table-md table-bordered w-100" id="example1">
                <thead>
                    <tr class="bg-primary">
                        @foreach($arrayColumn as $column => $val)
                            <th class="align-middle text-nowrap border-top-0">
                                <a href="javascript:void(0)" 
                                    class="btn-block text-white font-weight-bold" 
                                    wire:click="sortByTable(1, '{{ $val }}')" 
                                    style="text-decoration: none;">
                                    {{ $column }}
                                    @if($sortField == $val)
                                        <i class="fa fa-angle-{{ $sortBy == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        @if($action == 'active') 
                            <th class="text-white">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @forelse($tables as $key => $r)
                    <tr @if($loop->even) style="background:#f5f5f5;" @endif>
                        @foreach($arrayColumn as $column => $val)
                            @if($val == 'id')
                                <td>
                                    @if($sortBy == 'desc')
                                        {{ $tables->firstItem() + $key }}
                                    @else 
                                        {{ $tables->lastItem() - $key }}
                                    @endif
                                </td>
                            @else
                                <td>
                                    @if(isset($custom_record))
                                        @foreach($custom_record as $k => $html)
                                            @if($k == $val)
                                                @php 
                                                    if(preg_match('/\[row::([A-Za-z\/]+)\]/', $html, $m))
                                                    {
                                                        $v = $m[1];
                                                        // $html = str_replace($m[0], $r->$v, $html);
                                                        $html = str_replace($m[0], $r->$v, $html);
                                                    }else{
                                                        $html = $html;
                                                    }

                                                    // avatar dir 
                                                    if(preg_match('/\[avatar::([A-Za-z\/]+)\]/', $html, $m))
                                                    {
                                                        $v = $m[1];
                                                        $html = str_replace($m[0], url_avatar($r->$v), $html);
                                                    }else{
                                                        $html = $html;
                                                    }

                                                    // image dir
                                                    if(preg_match('/\[imgdir::([A-Za-z\/]+)\]/', $html, $m))
                                                    {
                                                        $dir = $m[1];
                                                        $html = str_replace($m[0], '', $html);
                                                    }else{
                                                        $dir = '';
                                                        $html = $html;
                                                    }

                                                    if(preg_match('/\[img::([A-Za-z\/]+)\]/', $html, $m))
                                                    {
                                                        $v = $m[1];
                                                        $html = str_replace($m[0], url_images($dir, $r->$v), $html);
                                                    }else{
                                                        $html = $html;
                                                    }

                                                    echo $html;
                                                @endphp
                                            @else 
                                                {{ $r->$val }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $r->$val }}
                                    @endif
                                </td> 
                            @endif
                        @endforeach
                        @if($action == 'active') 
                            <td>
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" 
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu dropleft">
                                        @if($modal_active == 'active')
                                            <a href="javascript:void(0)" class="dropdown-item" 
                                                data-toggle="modal" wire:click="edit({{ $r->id }})"
                                                data-target="#modelDetail">Detail</a>
                                            <a href="javascript:void(0)" class="dropdown-item" 
                                                data-toggle="modal" wire:click="edit({{ $r->id }})"
                                                data-target="#modelUpdate">Edit</a>
                                        @else 
                                            <a class="dropdown-item" href="{{ url($url.'/show/'.$r->id) }}">Detail</a>
                                            <a class="dropdown-item" href="{{ url($url.'/edit/'.$r->id) }}">Edit</a>
                                        @endif
                                        @if(Request::url())
                                            @if($r->id == '1')
                                                {{-- no action --}}
                                            @else 
                                                <a class="dropdown-item" 
                                                    wire:click="delete_confirm({{$r->id}})" 
                                                    data-toggle="modal" 
                                                    data-target="#deleteModal"
                                                    href="javascript:void(0)"
                                                    data-id="${row.id}">Delete</a>
                                            @endif
                                        @else 
                                            <a class="dropdown-item" 
                                                wire:click="delete_confirm({{$r->id}})" 
                                                data-toggle="modal" 
                                                data-target="#deleteModal"
                                                href="javascript:void(0)"
                                                data-id="${row.id}">Delete</a>
                                        @endif
                                        
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty 
                    <tr>
                        <td colspan="{{count($arrayColumn)}}">No data found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div class="container">
                @if($tables->count() > 0)
                    <div class="row">
                        <div class="col-sm-2">
                            <select wire:model="paginate" class="form-control sm w-auto" name="" id="">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select> 
                        </div>
                        <div class="col-sm-7 d-flex justify-content-center">
                            {{ $tables->links() }}
                        </div>
                        <div class="col-sm-3">
                            <p class="pt-1 text-right">
                                Result 1 - {{ $tables->count() }} 
                                of {{ $tables->total() }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="clearfix pb-1"></div>
        </div>
    </div>
</div>

@if($action == 'active')
    @if($modal_active == 'active')
        @if(!empty($view_modal_update))
            @include('livewire.admin.helpers.modals.update',[
                'view_modal_update' => $view_modal_update
            ])
        @endif
        @if(!empty($view_modal_detail))
            @include('livewire.admin.helpers.modals.detail',[
                'view_modal_detail' => $view_modal_detail
            ])
        @endif
    @endif
    @include('livewire.admin.helpers.modals.delete')
@endif