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
                    @if($val == 'avatar')
                        <img src="{{ url_avatar($r->avatar) }}" class="rounded-circle" style="width:50px">
                    @elseif($val == 'active')
                        <span class="badge {{$r->active == '1' ? 'badge-success' : '' }}
                            {{ $r->active == '2' ? 'badge-warning' : '' }} 
                            {{ $r->active == '0' ? 'badge-danger' : '' }}">
                            {!! $r->active == '1' ? '<i class="fa fa-check mr-1"></i> Active' : '' !!}
                            {!! $r->active == '2' ? '<i class="fa fa-ban mr-1"></i> Banned' : '' !!} 
                            {!! $r->active == '0' ? '<i class="fa fa-times mr-1"></i> Non Active' : '' !!}
                        </span>
                    @else 
                        {{ $r->$val == '' ? '-' : $r->$val }}
                    @endif
                </td> 
            @endif
        @endforeach 
        <td>
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                </button>
                <div class="dropdown-menu dropleft">
                    <a href="javascript:void(0)" class="dropdown-item" 
                        data-toggle="modal" wire:click="edit({{ $r->id }})"
                        data-target="#modelDetail">Detail</a>
                    <a href="javascript:void(0)" class="dropdown-item" 
                        data-toggle="modal" wire:click="edit({{ $r->id }})"
                        data-target="#modelUpdate">Edit</a>
                    @if($r->id == '1')

                    @else
                    <a class="dropdown-item" 
                        wire:click="delete_confirm({{$r->id}})" 
                        data-toggle="modal" data-target="#deleteModal"
                        href="javascript:void(0)"
                        data-id="${row.id}">Delete</a>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@empty 
    <tr>
        <td colspan="{{count($arrayColumn)}}">No data found.</td>
    </tr>
@endforelse