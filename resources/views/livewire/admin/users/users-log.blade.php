<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-sm-12">
            {{ alertbs_form() }}
            <div class="clearfix"></div>
            @include('livewire.admin.helpers.tables.search-bootstrap',[
                    'arraySearch'       => $arraySearch,
                    'url'               => 'log-login',
                    'action'            => 'none',
                    'modal_active'      => 'none',
                    'url_create'        => 'users/create',
                    'html_button'       => '',
                    'name_active'       => '',
                    'view_modal_create' => ''
                ])
            <div class="clearfix"></div>
            @include('livewire.admin.helpers.tables.tables-bootstrap',[
                    'tables'            => $tables,
                    'url'               => 'log-login',
                    'arrayColumn'       => $arrayColumn,
                    'action'            => 'none',
                    'custom_action'     => 'none',
                    'modal_active'      => 'none',
                    'view_modal_detail' => '',
                    'view_modal_update' => ''
                ])
        </div>
    </div>
</div>
