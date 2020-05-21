<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DestroyRequest;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * @param DestroyRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(DestroyRequest $request): RedirectResponse
    {
        $request->model::query()->findOrFail($request->get('id'))->delete();

        return back()->with('success', 'Запись удалена!');
    }
}
