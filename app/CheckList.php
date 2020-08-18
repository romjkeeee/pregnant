<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\CheckListTranslate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CheckList extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = CheckListTranslate::class;
    protected $translatedForeignKey = 'list_id';

    protected $fillable = ['image'];
    protected $appends = ['image_path'];

    /**
     * @return string|null
     */
    public function getImagePathAttribute(): ?string
    {
        return $this->image ? asset($this->image) : null;
    }

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

    public function remember(): BelongsToMany
    {
        return $this->belongsToMany(CheckListTask::class, 'patient_task_remembers', 'task_id', 'list_id');
    }
}
