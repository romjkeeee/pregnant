<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\Admin\UserRequest;
use App\Region;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
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
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.users.create', [
            'page_title' => 'Создание пользователя',
            'regions'    => Region::query()->get(),
            'cities'     => City::query()->get(),
        ]);
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::query()->create($request->validated());
        if ($request->file('image')) {
            $user->image = 'storage/'.$request->file('image')->store('user');
            $user->update();
        }
        return redirect()->route('admin.users.index')->with('success', 'Пользователь создан!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
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
        if ($request->file('image')) {
            $user = User::query()->where('id',$id)->first();
            $user->image = 'storage/'.$request->file('image')->store('user');
            $user->update();
        }
        return back()->with('success', 'Сохранено!');
    }

}
