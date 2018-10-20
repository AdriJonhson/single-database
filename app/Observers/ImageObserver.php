<?php

namespace App\Observers;

use App\Image;
use App\Tenant;

class ImageObserver
{
    private $tenant;

    public function __construct()
    {
        $this->tenant = Tenant::where('name', request()->tenant)->first();
    }
    /**
     * Handle the image "created" event.
     *
     * @param  \App\Image  $image
     * @return void
     */
    public function created(Image $image)
    {
        //
    }

    /**
     * Handle the image "updated" event.
     *
     * @param  \App\Image  $image
     * @return void
     */
    public function updated(Image $image)
    {
        //
    }

    /**
     * Handle the image "deleted" event.
     *
     * @param  \App\Image  $image
     * @return void
     */
    public function deleted(Image $image)
    {
        //
    }

    /**
     * Handle the image "restored" event.
     *
     * @param  \App\Image  $image
     * @return void
     */
    public function restored(Image $image)
    {
        //
    }

    /**
     * Handle the image "force deleted" event.
     *
     * @param  \App\Image  $image
     * @return void
     */
    public function forceDeleted(Image $image)
    {
        //
    }

    public function creating(Image $image)
    {
        $image->tenant_id = $this->tenant->id;
    }
}
