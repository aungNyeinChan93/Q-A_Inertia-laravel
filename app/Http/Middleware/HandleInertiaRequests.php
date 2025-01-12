<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth.user' => fn() => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'image')
                : null,
            'flash' => [
                'message' => fn() => $request->session()->get('message'),
                'success'=>fn()=>$request->session()->get('success'),
                'fail'=>fn()=>$request->session()->get('fail'),
            ],
            'tag'=>fn()=> Tag::query()->get(['name','slug']),
        ]);
    }
}
