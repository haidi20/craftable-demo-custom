<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUser\DestroyAdminUser;
use App\Http\Requests\Admin\AdminUser\IndexAdminUser;
use App\Http\Requests\Admin\AdminUser\StoreAdminUser;
use App\Http\Requests\Admin\AdminUser\UpdateAdminUser;
use Brackets\AdminAuth\Activation\Facades\Activation;
use Brackets\AdminAuth\Models\AdminUser;
use Brackets\AdminAuth\Services\ActivationService;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class AdminUsersController extends Controller
{

    /**
     * Guard used for admin user
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * AdminUsersController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->guard = config('admin-auth.defaults.guard');
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdminUser $request
     * @return Response|array
     */
    public function index(IndexAdminUser $request)
    {
        // create and AdminListing instance for a specific model and
        // $data = AdminListing::create(AdminUser::class)->processRequestAndGet(
        //     // pass the request with params
        //     $request,

        //     // set columns to query
        //     ['id', 'first_name', 'last_name', 'email', 'activated', 'forbidden', 'language'],

        //     // set columns to searchIn
        //     ['id', 'first_name', 'last_name', 'email', 'language']
        // );

        $data = AdminUser::where('first_name', 'like', '%'.request('search').'%')->paginate(request('paginate', 5));

        if ($request->ajax()) {
            return ['data' => $data, 'activation' => Config::get('admin-auth.activation_enabled')];
        }


        return view('admin.admin-user.index', ['data' => $data, 'activation' => Config::get('admin-auth.activation_enabled')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.admin-user.create');

        return view('admin.admin-user.create', [
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdminUser $request
     * @return Response|array
     */
    public function store(StoreAdminUser $request)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Store the AdminUser
        $adminUser = AdminUser::create($sanitized);

        // But we do have a roles, so we need to attach the roles to the adminUser
        $adminUser->roles()->sync(collect($request->input('roles', []))->map->id->toArray());

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param AdminUser $adminUser
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return void
     */
    public function show(AdminUser $adminUser)
    {
        $this->authorize('admin.admin-user.show', $adminUser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdminUser $adminUser
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return Response
     */
    public function edit(AdminUser $adminUser)
    {
        $this->authorize('admin.admin-user.edit', $adminUser);

        $adminUser->load('roles');

        return view('admin.admin-user.edit', [
            'adminUser' => $adminUser,
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::where('guard_name', $this->guard)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminUser $request
     * @param AdminUser $adminUser
     * @return Response|array
     */
    public function update(UpdateAdminUser $request, AdminUser $adminUser)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Update changed values AdminUser
        $adminUser->update($sanitized);

        // But we do have a roles, so we need to attach the roles to the adminUser
        if ($request->input('roles')) {
            $adminUser->roles()->sync(collect($request->input('roles', []))->map->id->toArray());
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdminUser $request
     * @param AdminUser $adminUser
     * @throws \Exception
     * @return Response|bool
     */
    public function destroy(DestroyAdminUser $request, AdminUser $adminUser)
    {
        $adminUser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    // public function destroy(DestroyArticle $request, Article $article)
    // {
    //     $article->delete();

    //     if ($request->ajax()) {
    //         return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    //     }

    //     return redirect()->back();
    // }

    /**
     * Resend activation e-mail
     *
     * @param \Illuminate\Http\Request $request
     * @param ActivationService $activationService
     * @param AdminUser $adminUser
     * @return array|\Illuminate\Http\Response
     */
    public function resendActivationEmail(Request $request, ActivationService $activationService, AdminUser $adminUser)
    {
        if (Config::get('admin-auth.activation_enabled')) {
            $response = $activationService->handle($adminUser);
            if ($response == Activation::ACTIVATION_LINK_SENT) {
                if ($request->ajax()) {
                    return ['message' => trans('brackets/admin-ui::admin.operation.succeeded')];
                }

                return redirect()->back();
            } else {
                if ($request->ajax()) {
                    abort(409, trans('brackets/admin-ui::admin.operation.failed'));
                }

                return redirect()->back();
            }
        } else {
            if ($request->ajax()) {
                abort(400, trans('brackets/admin-ui::admin.operation.not_allowed'));
            }

            return redirect()->back();
        }
    }
}
