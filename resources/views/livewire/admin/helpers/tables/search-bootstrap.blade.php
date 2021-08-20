<div class="row">
    <div class="col-sm-4">
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="search" class="form-control css-rounded" wire:model="search" 
                placeholder="Search : {{ $arraySearch }}">
        </div>
    </div>
    <div class="col-sm-8 d-flex flex-row-reverse">
        @if($action == 'active') 
            @if($modal_active == 'active')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-md mt-1 mb-3" 
                    data-toggle="modal" data-target="#modelCreate" 
                    wire:click.prevent="resetInputFields()">
                    <i class="fa fa-plus"></i> {{ $name_active }}
                </button>
            @else 
                @if($html_button == 'active')
                    {!! $html_button !!}
                @else   
                    <a href="{{ url($url_create) }}" 
                        wire:click.prevent="resetInputFields()" 
                        class="btn btn-primary btn-md mt-1 mb-3">
                        <i class="fa fa-plus"></i> {{ $name_active }}
                    </a>
                @endif
            @endif
        @else 
            {{-- no action --}}
        @endif
        <div wire:loading wire:target="search" class="mt-1 mb-3 mr-2">
            <i class="fa fa-cog fa-spin fa-2x text-info"></i>
        </div>
    </div>
</div>      
@if($action == 'active') 
@if($modal_active == 'active')
@if(!empty($view_modal_create))
    @include('livewire.admin.helpers.modals.create',[
        'view_modal_create' => $view_modal_create
    ])
@endif
@endif
@endif