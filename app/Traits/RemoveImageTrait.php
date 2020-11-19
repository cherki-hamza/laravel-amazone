<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait RemoveImageTrait
{

    // function to remove old Image from public path
    function RemoveImage($oldFilename)
    {
        File::delete([
            public_path($oldFilename)
        ]);

    }

}


