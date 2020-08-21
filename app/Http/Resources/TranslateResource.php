<?php

namespace App\Http\Resources;

use App\Translate;
use App\Translate\TranslateText;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Lang;

class TranslateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];

        $items = TranslateText::where('translate_id', $this->translate->translate_id)->get();

        foreach ($items as $item) {
            $data[Lang::find($item->lang_id)->code] = [
                $this->key.'_' => $item->text
            ];
        }

        return $data;
    }
}
