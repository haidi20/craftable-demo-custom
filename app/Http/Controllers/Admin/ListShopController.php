<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\ListShop\IndexListShop;
use App\Http\Requests\Admin\ListShop\StoreListShop;
use App\Http\Requests\Admin\ListShop\UpdateListShop;
use App\Http\Requests\Admin\ListShop\DestroyListShop;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\ListShop;
use Illuminate\Support\Facades\DB;

class ListShopController extends Controller
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
     * @param  IndexListShop $request
     * @return Response|array
     */
    public function index(IndexListShop $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ListShop::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_shop', 'address'],

            // set columns to searchIn
            ['id', 'name_shop', 'address']
        );

        if ($request->ajax()) {
            if($request->has('bulk')){
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.list-shop.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.list-shop.create');

        return view('admin.list-shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreListShop $request
     * @return Response|array
     */
    public function store(StoreListShop $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the ListShop
        $listShop = ListShop::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/list-shops'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/list-shops');
    }

    /**
     * Display the specified resource.
     *
     * @param  ListShop $listShop
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(ListShop $listShop)
    {
        $this->authorize('admin.list-shop.show', $listShop);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ListShop $listShop
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(ListShop $listShop)
    {
        $this->authorize('admin.list-shop.edit', $listShop);


        return view('admin.list-shop.edit', [
            'listShop' => $listShop,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateListShop $request
     * @param  ListShop $listShop
     * @return Response|array
     */
    public function update(UpdateListShop $request, ListShop $listShop)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ListShop
        $listShop->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/list-shops'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/list-shops');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyListShop $request
     * @param  ListShop $listShop
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyListShop $request, ListShop $listShop)
    {
        $listShop->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
    * Remove the specified resources from storage.
    *
    * @param  DestroyListShop $request
    * @return  Response|bool
    * @throws  \Exception
    */
    public function bulkDestroy(DestroyListShop $request) : Response
    {
        DB::transaction(function () use ($request){
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(function($bulkChunk){
                    ListShop::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
            });
        });

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
    
    }
