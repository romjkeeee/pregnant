<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait StoreImageTrait
{
    /**
     * laravel storage disk
     *
     * @var string $storeDisc
     */
    public $storeDisc = 'publicUpload';

    /**
     * root store folder
     *
     * @var string $storeFolder
     */
    public $storeFolder = 'images';

    /**
     * @param string $name
     * @return string
     */
    private function __folder(string $name): string
    {
        return $this->storeFolder . '/' . collect(explode('\\', get_class($this)))->last() . '/' . $name;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setAttribute($name, $value)
    {
        in_array($name, $this->image) ? $this->store($value, $name) : parent::setAttribute($name, $value);
    }

    /**
     * @param UploadedFile $image
     * @param string $name
     */
    private function store(UploadedFile $image, string $name): void
    {
        if (isset($this->attributes[$name]) && Storage::disk($this->storeDisc)->exists($this->attributes[$name])) {
            Storage::disk($this->storeDisc)->delete($this->attributes[$name]);
        }
        $this->attributes[$name] = Storage::disk($this->storeDisc)->put($this->__folder($name), $image);
    }
}
