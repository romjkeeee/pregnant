<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\Admin\UserRequest;
use App\Region;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.users.index', [
            'page_title' => 'Пользователи',
            'search'     => $request->get('search'),
            'items'      => User::query()->with(['patient', 'doctor'])->where(function (Builder $user) use ($request) {
                if ($request->get('search')) {
                    $user->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                        ->orWhere('phone', 'LIKE', "%{$request->get('search')}%");
                }
            })->paginate(20)
        ]);
    }

    public function edit($id)
    {
        return view('admin.users.store', [
            'page_title' => 'Редактирование пользователя',
            'instance'   => User::query()->findOrFail($id),
            'regions'    => Region::query()->get(),
            'cities'     => City::query()->get(),
        ]);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, $id): RedirectResponse
    {
        User::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Изменено!');
    }
}
