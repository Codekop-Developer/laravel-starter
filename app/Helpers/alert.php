<?php 
function alertbs_form(){
    // echo '<div id="notif">';
    if(session('success')) {
        echo '<div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                '.session('success').'
                </div>';
    }
    if(session('failed')) {
        echo '<div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                '.session('failed').'
                </div>';
    }
    // echo '</div>';
}

function alerterror_form($errors = 0){
    if (count($errors) > 0){
        echo '<div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Whoops!</strong> There were some problems with your input.
                <!--<ul>';
                foreach ($errors->all() as $error){
                echo' <li>'.$error.'</li>';
                }
                echo '</ul>-->
            </div>';
    }
}
function alertmodal_form(){
    if(session('success_modal')) {
        echo '<div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                '.session('success_modal').'
                </div>';
    }
    if(session('failed_modal')) {
        echo '<div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                '.session('failed_modal').'
                </div>';
    }
}

function alertsweet($status)
{
    if($status == 'success') {
        return  [
            'position' =>  'top-end', 
            'timer' =>  5000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  true, 
            'showConfirmButton' =>  false, 
        ];
    }

    if($status == 'update') {
        return  [
            'position' =>  'top-end', 
            'timer' =>  5000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  true, 
            'showConfirmButton' =>  false, 
        ];
    }
}