<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CheckListTask extends BaseModel
{
    protected $fillable = ['list_id', 'name'];

    protected $appends = ['selected'];

    /**
     * @return bool
     */
    public function getSelectedAttribute(): bool
    {
        return !!$this->patient->count();
    }

    /**
     * @return HasOne
     */
    public function list(): HasOne
    {
        return $this->hasOne(CheckList::class, 'id', 'list_id');
    }

    /**
     * @return BelongsToMany
     */
    public function patient(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'patient_tasks', 'task_id', 'patient_id')->where('user_id', auth()->id());
    }
}
