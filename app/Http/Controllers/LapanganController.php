<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Kategori;
use App\Lapangan;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \auth()->user();
        $lapangans = Lapangan::query()->with('waktus');
        if ($user['role'] === 'admin')
            $lapangans = $lapangans->paginate(10);
        else
            $lapangans = $lapangans->whereCreatedBy($user['id'])->paginate(10);

        return view('lapangan.index', ['lapangans' => $lapangans]);
    }

    public function nampilinGambar()
    {
        $lapangan = Lapangan::take(8)->get();
        return view('index', compact('lapangan'));
    }

    public function showGambar($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('detail', compact('lapangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $datas['slug'] = str_slug($request->nama_lapangan, "-");
        $datas['created_by'] = Auth::user()->id;
        if ($request->file('gambar')) {
            $file = Storage::disk('public')->put('gambar_lapangan', $request->gambar);
            $datas['gambar'] = $file;
        }
        $lapangans = Lapangan::create($datas);
        $lapangans->waktus()->attach($request->get('waktus'));
        return redirect(route('lapangans.create'))->with('status', 'Lapangan Added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lapangan $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Lapangan $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('lapangan.edit', compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->nama_lapangan, "-");
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('gambar_lapangan', 'public');
            $data['gambar'] = $file;
            Storage::delete('public' . $lapangan->gambar);
        }
        $lapangan->update($data);
        $lapangan->waktus()->sync($request->get('waktus'));
        return redirect()->back()->with('status', 'Lapangan Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lapangan $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->waktus()->detach();
        $lapangan->delete();
        $lapangan->forceDelete();
        return redirect(route('lapangans.index'))->with('status', 'udah kehapus bg');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $waktus = Waktu::where("waktu", "LIKE", "%$keyword%")->get();
        return $waktus;
    }

    public function ajaxSearchKategori(Request $request)
    {
        $keyword = $request->get('q');
        $waktus = Kategori::where("kategori", "LIKE", "%$keyword%")->get();
        return $waktus;
    }

    public function ajaxSearchJenis(Request $request)
    {
        $keyword = $request->get('q');
        $waktus = Jenis::where("jenis", "LIKE", "%$keyword%")->get();
        return $waktus;
    }
}
