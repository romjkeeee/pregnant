<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CheckList extends BaseModel
{
    protected $fillable = ['name', 'image'];

    /**
     * @param UploadedFile|null $image
     */
    public function setImageAttribute(UploadedFile $image = null)
    {
        if ($image) {
            if (isset($this->attributes['image']) && Storage::disk('publicUpload')->exists($this->attributes['image'])) {
                Storage::disk('publicUpload')->delete($this->attributes['image']);
            }
            $this->attributes['image'] = Storage::disk('publicUpload')->put('images/check-lists', $image);
        }
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(CheckListTask::class, 'list_id', 'id');
    }
}
