<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\CheckListTaskTranslate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CheckListTask extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = CheckListTaskTranslate::class;
    protected $translatedForeignKey = 'task_id';

    protected $fillable = ['list_id'];

    protected $appends = ['selected', 'remembers_last'];

    /**
     * @return bool
     */
    public function getSelectedAttribute(): bool
    {
        return !!$this->patient->count();
    }

    public function getRemembersLastAttribute()
    {
        return $this->relations['remember'][count($this->relations['remember']) - 1];
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
        return $this->belongsToMany(Patient::class, 'patient_tasks', 'task_id', 'patient_id');
    }

    public function remember(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'patient_task_remembers', 'task_id', 'patient_id')->select('remember','date');
    }



}
