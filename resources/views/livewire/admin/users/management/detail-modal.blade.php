<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Detail Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="d-flex justify-content-center mb-3">
            <img src="{{url_avatar($avatar)}}" 
                style="width:200px;"
                class="rounded-circle" alt="{{$name}}">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td scope="row">Name</td>
                        <td>:</td>
                        <td>{{$name}}</td>
                    </tr>
                    <tr>
                        <td scope="row">E-mail</td>
                        <td>:</td>
                        <td>{{$email}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Phone</td>
                        <td>:</td>
                        <td>{{$phone}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Address</td>
                        <td>:</td>
                        <td>{{$address}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Roles</td>
                        <td>:</td>
                        <td>
                            @php $rol = DB::table('users_role')->get(); @endphp
                            @foreach($rol as $val)
                                @if($roles == $val->id)
                                    {{ $val->name_role }}
                                @endif
                            @endforeach    
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Active</td>
                        <td>:</td>
                        <td>
                            @php 
                                if($active == 1){ $ac = 'Active'; }
                                if($active == 2){ $ac = 'Non Active'; }
                                if($active == 0){ $ac = 'Banned'; }
                            @endphp
                            {{ $ac }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Created At</td>
                        <td>:</td>
                        <td>{{$created_at}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Updated At</td>
                        <td>:</td>
                        <td>{{$updated_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>