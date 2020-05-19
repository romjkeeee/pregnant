<?php

namespace App;


class Duration extends BaseModel {

	protected $table = 'durations';
	public $timestamps = false;

    public function duration_articles()
    {
        return $this->hasMany(DurationArticles::class, 'duration_id', 'id');
    }
}
