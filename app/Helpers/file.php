<?php 
function url_avatar($file = null)
{
    if($file == '')
    {
        return asset('assets/img/avatar/avatar-1.png');
    }else{
        if(file_exists(storage_path('app/public/avatars/'.$file)))
        {
            return asset('storage/avatars/'.$file);
        }else{
            return asset('assets/img/avatar/avatar-1.png');
        }
    }
}

function cekavatar_unlink($file)
{
    if($file == '')
    {
        return '';
    }else{
        if(file_exists(storage_path('app/public/avatars/'.$file)))
        {
            return unlink(storage_path('app/public/avatars/'.$file));
        }else{
            return '';
        }
    }
}

function url_images($dir = null, $file = null)
{
    if($dir = null)
    {
        if($file == '')
        {
            return asset('assets/img/news/img01.jpg');
        }else{
            if(file_exists(storage_path('app/public/'.$file)))
            {
                return asset('storage/'.$file);
            }else{
                return asset('assets/img/news/img01.jpg');
            }
        }
    }else{
        if($dir == '' && $file == '')
        {
            return asset('assets/img/news/img01.jpg');
        }else{
            if(file_exists(storage_path('app/public/'.$dir.$file)))
            {
                return asset('storage/'.$dir.$file);
            }else{
                return asset('assets/img/news/img01.jpg');
            }
        }
    }
}

function cekimages_unlink($dir = null, $file = null)
{
    if($dir = null)
    {
        if($file == '')
        {
            return '';
        }else{
            if(file_exists(storage_path('app/public/'.$file)))
            {
                return unlink(storage_path('app/public/'.$file));
            }else{
                return '';
            }
        }
    }else{
        if($dir == '' && $file == '')
        {
            return '';
        }else{
            if(file_exists(storage_path('app/public/'.$file)))
            {
                return unlink(storage_path('app/public/'.$file));
            }else{
                return '';
            }
        }
    }
}

function deleteFolder($str) {
    //It it's a file.
    if (is_file($str)) {
        //Attempt to delete it.
        return unlink($str);
    }
    //If it's a directory.
    elseif (is_dir($str)) {
        //Get a list of the files in this directory.
        $scan = glob(rtrim($str,'/').'/*');
        //Loop through the list of files.
        foreach($scan as $index=>$path) {
            //Call our recursive function.
            deleteFolder($path);
        }
        //Remove the directory itself.
        return @rmdir($str);
    }
}
