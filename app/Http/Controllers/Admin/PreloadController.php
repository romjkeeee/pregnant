<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\CheckList;
use App\City;
use App\Clinic;
use App\Doctor;
use App\Lang;
use App\Region;
use App\Specialization;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PreloadController extends Controller
{
    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function users(Request $request)
    {
        return response(User::query()->where(function (Builder $user) use ($request) {
            if ($request->get('search')) {
                $user->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                    ->orWhere('last_name', 'LIKE', "%{$request->get('search')}%")
                    ->orWhere('second_name', 'LIKE', "%{$request->get('search')}%")
                    ->orWhere('phone', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (User $user) {
            return ['id' => $user->id, 'text' => $user->fullName];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function clinics(Request $request)
    {
        return response(Clinic::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (Clinic $clinic) {
            return ['id' => $clinic->id, 'text' => $clinic->name];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function doctors(Request $request)
    {
        return response(Doctor::query()->orderBy('id', 'desc')->get()->map(function (Doctor $doctor) {
            return ['id' => $doctor->id, 'text' => $doctor->user->fullName ?? "#{$doctor->id}"];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function specializations(Request $request)
    {
        return response(Specialization::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (Specialization $specialization) {
            return ['id' => $specialization->id, 'text' => $specialization->name];
        }));
    }


    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function checkList(Request $request)
    {
        return response(CheckList::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (CheckList $list) {
            return ['id' => $list->id, 'text' => $list->name];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function regions(Request $request)
    {
        return response(Region::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (Region $item) {
            return ['id' => $item->id, 'text' => $item->name];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function cities(Request $request)
    {
        return response(City::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (City $item) {
            return ['id' => $item->id, 'text' => $item->name];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function langs(Request $request)
    {
        return response(Lang::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (City $item) {
            return ['id' => $item->id, 'text' => $item->name];
        }));
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function article_category(Request $request)
    {
        return response(ArticleCategory::query()->where(function (Builder $builder) use ($request) {
            if ($request->get('search')) {
                $builder->where('title', 'LIKE', "%{$request->get('search')}%");
            }
        })->orderBy('id', 'desc')->get()->map(function (ArticleCategory $item) {
            return ['id' => $item->id, 'text' => $item->title];
        }));
    }
}
