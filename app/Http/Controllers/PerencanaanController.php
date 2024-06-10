<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Perencanaan;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Perencanaans\{StorePerencanaanRequest, UpdatePerencanaanRequest};


class PerencanaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:perencanaan view')->only('index', 'show');
        $this->middleware('permission:perencanaan create')->only('create', 'store');
        $this->middleware('permission:perencanaan edit')->only('edit', 'update');
        $this->middleware('permission:perencanaan delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
    {
        if (request()->ajax()) {
            $perencanaans = Perencanaan::query();

            return Datatables::of($perencanaans)

                ->addColumn('dokumen', function ($row) {
                    if ($row->dokumen == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/dokumens/' . $row->dokumen);
                })

                ->addColumn('action', 'perencanaans.include.action')
                ->toJson();
        }

        return view('perencanaans.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('perencanaans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StorePerencanaanRequest $request): \Illuminate\Http\RedirectResponse
    // {
    //     $attr = $request->validated();

    // 	$attr['rencana_lelang'] = $request->rencana_lelang ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_lelang)->toDateTimeString() : null;
    // 	$attr['rencana_kontrak'] = $request->rencana_kontrak ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_kontrak)->toDateTimeString() : null;
    // 	$attr['rencana_pengadaan'] = $request->rencana_pengadaan ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_pengadaan)->toDateTimeString() : null;

    //     if ($request->file('dokumen') && $request->file('dokumen')->isValid()) {

    //         $path = storage_path('app/public/uploads/dokumens/');
    //         $filename = $request->file('dokumen')->hashName();

    //         if (!file_exists($path)) {
    //             mkdir($path, 0777, true);
    //         }

    //         Image::make($request->file('dokumen')->getRealPath())->resize(500, 500, function ($constraint) {
    //             $constraint->upsize();
    // 			$constraint->aspectRatio();
    //         })->save($path . $filename);

    //         $attr['dokumen'] = $filename;
    //     }

    //     Perencanaan::create($attr);

    //     return to_route('perencanaans.index')->with('success', __('The perencanaan was created successfully.'));
    // }

    public function store(StorePerencanaanRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->validated();
        
        $attr['rencana_lelang'] = $request->rencana_lelang ? Carbon::createFromFormat('Y-m', $request->rencana_lelang)->toDateTimeString() : null;
        $attr['rencana_kontrak'] = $request->rencana_kontrak ? Carbon::createFromFormat('Y-m', $request->rencana_kontrak)->toDateTimeString() : null;
        $attr['rencana_pengadaan'] = $request->rencana_pengadaan ? Carbon::createFromFormat('Y-m', $request->rencana_pengadaan)->toDateTimeString() : null;

        $uploadedFiles = $request->file('dokumen');
        $filenames = [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                if ($file->isValid()) {
                    $path = storage_path('app/public/uploads/dokumens/');
                    // $path = public_path('uploads/dokumens/');
                    $filename = $file->hashName();

                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }

                    $file->move($path, $filename); // Pindahkan file ke directory

                    $filenames[] = $filename;
                }
            }
        }

        // Gabungkan nama file dengan separator "|"
        $attr['dokumen'] = implode('|', $filenames);

        Perencanaan::create($attr);

        return redirect()->route('perencanaans.index')->with('success', __('The perencanaan was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Perencanaan $perencanaan): \Illuminate\Contracts\View\View
    {
        return view('perencanaans.show', compact('perencanaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perencanaan $perencanaan): \Illuminate\Contracts\View\View
    {
        return view('perencanaans.edit', compact('perencanaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerencanaanRequest $request, Perencanaan $perencanaan): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->validated();

        $attr['rencana_lelang'] = $request->rencana_lelang ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_lelang)->toDateTimeString() : null;
        $attr['rencana_kontrak'] = $request->rencana_kontrak ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_kontrak)->toDateTimeString() : null;
        $attr['rencana_pengadaan'] = $request->rencana_pengadaan ? \Carbon\Carbon::createFromFormat('Y-m', $request->rencana_pengadaan)->toDateTimeString() : null;

        if ($request->file('dokumen') && $request->file('dokumen')->isValid()) {

            $path = storage_path('app/public/uploads/dokumens/');
            
            // $path = public_path('uploads/dokumens/');
            $filename = $request->file('dokumen')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('dokumen')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old dokumen from storage
            if ($perencanaan->dokumen != null && file_exists($path . $perencanaan->dokumen)) {
                unlink($path . $perencanaan->dokumen);
            }

            $attr['dokumen'] = $filename;
        }

        $perencanaan->update($attr);

        return to_route('perencanaans.index')->with('success', __('The perencanaan was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perencanaan $perencanaan): \Illuminate\Http\RedirectResponse
    {
        try {
            $path = storage_path('app/public/uploads/dokumens/');

            if ($perencanaan->dokumen != null && file_exists($path . $perencanaan->dokumen)) {
                unlink($path . $perencanaan->dokumen);
            }

            $perencanaan->delete();

            return to_route('perencanaans.index')->with('success', __('The perencanaan was deleted successfully.'));
        } catch (\Throwable $th) {
            return to_route('perencanaans.index')->with('error', __("The perencanaan can't be deleted because it's related to another table."));
        }
    }
}
