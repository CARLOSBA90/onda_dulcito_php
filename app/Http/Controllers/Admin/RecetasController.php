<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Receta\BulkDestroyReceta;
use App\Http\Requests\Admin\Receta\DestroyReceta;
use App\Http\Requests\Admin\Receta\IndexReceta;
use App\Http\Requests\Admin\Receta\StoreReceta;
use App\Http\Requests\Admin\Receta\UpdateReceta;
use App\Models\Receta;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RecetasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReceta $request
     * @return array|Factory|View
     */
    public function index(IndexReceta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Receta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descripcion', 'publicar', 'activo'],

            // set columns to searchIn
            ['id', 'nombre', 'descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.receta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.receta.create');

        return view('admin.receta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReceta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReceta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Receta
        $recetum = Receta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/recetas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/recetas');
    }

    /**
     * Display the specified resource.
     *
     * @param Receta $recetum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Receta $recetum)
    {
        $this->authorize('admin.receta.show', $recetum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Receta $recetum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Receta $recetum)
    {
        $this->authorize('admin.receta.edit', $recetum);


        return view('admin.receta.edit', [
            'recetum' => $recetum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReceta $request
     * @param Receta $recetum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReceta $request, Receta $recetum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Receta
        $recetum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/recetas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/recetas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReceta $request
     * @param Receta $recetum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReceta $request, Receta $recetum)
    {
        $recetum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReceta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReceta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Receta::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
