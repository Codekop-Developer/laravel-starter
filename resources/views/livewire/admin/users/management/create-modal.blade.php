<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form wire:submit.prevent="store()">
        <div class="modal-body">
        {{ alertmodal_form() }}
        {{ alerterror_form($errors) }}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" required 
                    class="form-control @error("name") is-invalid @enderror" 
                    value="{{old("name")}}" name="name" wire:model="name" 
                    id="name" placeholder="Name">
                @error("name")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" required  
                    class="form-control @error("email") is-invalid @enderror" 
                    value="{{old("email")}}" name="email" 
                    wire:model="email"  id="email" placeholder="E-mail">
                @error("email")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" required class="form-control @error("password") is-invalid @enderror" value="{{old("password")}}" name="password" wire:model="password"  id="password" placeholder="Password">
                @error("password")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="">Roles</label>
                <select class="form-control @error("roles") is-invalid @enderror" required wire:model="roles">
                    <option>- {{ __('action.option_select')}} -</option>
                    @php $roles = DB::table('users_role')->get(); @endphp
                    @foreach($roles as $val)
                        <option value="{{ $val->id }}">{{ $val->name_role }}</option>
                    @endforeach
                </select>
                @error("roles")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="">Active</label>
                <select class="form-control @error("active") is-invalid @enderror" required wire:model="active">
                    <option>- {{ __('action.option_select')}} -</option>
                    <option value="1">Active</option>
                    <option value="0">Non Active</option>
                    <option value="3">Banned</option>
                </select>
                @error("active")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>