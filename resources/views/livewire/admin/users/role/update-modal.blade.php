<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        {{ alertmodal_form() }}
        {{ alerterror_form($errors) }}
        <form>
            <div class="form-group">
                <label for="">Name role</label>
                <input type="text" class="form-control @error("name_role") is-invalid @enderror" 
                    value="{{old("name_role")}}" 
                    name="name_role" 
                    wire:model="name_role" 
                    id="name_role" 
                    placeholder="Name role">
                @error("name_role")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <input type="hidden" wire:model="pk_id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
    </div>
</div>