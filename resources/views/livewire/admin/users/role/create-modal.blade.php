<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form wire:submit.prevent="store()">
        <div class="modal-body">
            {{ alertmodal_form() }}
            {{ alerterror_form($errors) }}
            <div class="form-group">
                <label for="">Name role</label>
                <input type="text" class="form-control @error("name_role") is-invalid @enderror" 
                    value="{{old("name_role")}}" 
                    name="name_role" 
                    wire:model="name_role" required 
                    id="name_role" 
                    placeholder="Name role">
                @error("name_role")
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