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
                    @include($loc_view)
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