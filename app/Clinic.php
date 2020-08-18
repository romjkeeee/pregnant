<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\ClinicTranslate;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Clinic extends BaseModel
{
    use MultiLangTrait;

    const STATE = 'state';
    const PRIVATE = 'private';

    protected $translatedClass = ClinicTranslate::class;
    protected $translatedForeignKey = 'clinic_id';

    protected $fillable = ['region_id', 'city_id', 'rate', 'type', 'phone', 'lng', 'lat', 'image'];

    /**
     * @return HasOne
     */
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    /**
     * @return HasOne
     */
    public function translate(): HasOne
    {
        return $this->hasOne(ClinicTranslate::class, 'clinic_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    /**
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(ClinicDepartment::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(ClinicSchedule::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(ClinicPrice::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ClinicReview::class, 'clinic_id', 'id');
    }

    /**
     * @return array
     */
    public function getFullSchedulesAttribute(): array
    {
        return collect(trans('date.days'))->map(function ($name, $day) {
            return [
                'day'    => $name,
                'period' => ($this->schedules->where('day', $day)->first()->start ?? '~') . ' - ' . ($this->schedules->where('day', $day)->first()->end ?? '~')
            ];
        })->toArray();
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
            $this->attributes['image'] = Storage::disk('publicUpload')->put('images/clinics', $image);
        }
    }
}
