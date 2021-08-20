<div>
    {{-- The Master doesn't talk, he acts. --}}
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-sm-12">
            {{ alertbs_form() }}
            {{ alerterror_form($errors) }}
            <div class="row">
                <div class="col-sm-8">
                    <div class="card css-rounded">
                        <div class="card-header bg-primary text-white card-header-rounded">
                            <i class="fa fa-user-circle mr-2"></i> {{ auth()->user()->name }} 
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" 
                                                class="form-control @error("name") is-invalid @enderror" 
                                                name="name" wire:model="name"  id="name" 
                                                placeholder="Name">
                                            @error("name")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">E-mail</label>
                                            <input type="email" 
                                                class="form-control @error("email") is-invalid @enderror" 
                                                name="email" wire:model="email"  id="email" 
                                                placeholder="E-mail">
                                            @error("email")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control @error("phone") is-invalid @enderror" name="phone" wire:model="phone"  id="phone" placeholder="Phone">
                                            @error("phone")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Roles</label>
                                                @php $rol = DB::table('users_role')->get(); @endphp
                                                @if(auth()->user()->roles == 1)
                                                    <select class="form-control"  wire:model="roles">
                                                        <option>- {{ __('action.option_select')}} -</option>
                                                        @foreach($rol as $val)
                                                            <option value="{{ $val->id }}"
                                                                {{$roles == $val->id ? 'selected' : ''}}>
                                                                {{ $val->name_role }}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    @foreach($rol as $val)
                                                        @if($roles == $val->id)
                                                            <input type="text" readonly class="form-control" value="{{ $val->name_role }}">
                                                        @endif
                                                    @endforeach
                                                @endif  
                                                @error("roles")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Active</label>
                                                @if(auth()->user()->roles == 1)
                                                    <select class="form-control" wire:model="active">
                                                        <option>- {{ __('action.option_select')}} -</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Non Active</option>
                                                            <option value="3">Banned</option>
                                                    </select>
                                                @else 
                                                    @php 
                                                        if($active == 1){ $ac = 'Active'; }
                                                        if($active == 2){ $ac = 'Non Active'; }
                                                        if($active == 0){ $ac = 'Banned'; }
                                                    @endphp
                                                    <input type="text" readonly class="form-control" value="{{$ac}}">
                                                @endif
                                                @error("active")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
        
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" 
                                                class="form-control @error("password") is-invalid @enderror" 
                                                name="password" wire:model="password" 
                                                id="password" placeholder="Password">
                                            @error("password")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control @error("address") is-invalid @enderror" name="address" 
                                                style="height: 120px;"
                                                wire:model="address"  id="address" 
                                                placeholder="Address"></textarea>
                                            @error("address")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer card-footer-rounded d-flex flex-row-reverse">
                            <button type="button" wire:click.prevent="update()" class="btn btn-primary btn-md">
                                <i class="fa fa-save mr-1" aria-hidden="true"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card css-rounded">
                        <div class="card-header bg-primary text-white card-header-rounded">
                            <i class="fa fa-image mr-2"></i> Photos
                        </div>
                        <div class="card-body p-0">
                            <img src="{{url_avatar($avatar)}}" class="img-fluid" alt="{{$name}}">
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="upload" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" accept="image/*" wire:model="avatar_upload" 
                                        class="form-control  @error("avatar_upload") is-invalid @enderror" id="customFile">
                                    @error("avatar_upload")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save mr-1" aria-hidden="true"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
