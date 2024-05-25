<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post3;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class Post3Controller extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $post3 = Post3::all();

        //render view with posts
        return view('Post3.index')->with('Post3',$post3);
    }
    public function view_pdf()
    {
        $post3 = Post3::all();
        $pdf = Pdf::loadView('pdf.Post3', ['Post3' => $post3]);
        return $pdf->download('Post3.pdf');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('Post3.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'idpegawai'      => 'required|min:1',
            'tglizin'   => 'required|min:1',
            'keterangan'    => 'required|min:1'
        ]);

        //create post
        Post3::create([
            'idpegawai'      => $request->idpegawai,
            'tglizin'   => $request->tglizin,
            'keterangan'    => $request->keterangan
        ]);

        //redirect to index
        return redirect()->route('Post3.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post3 = Post3::findOrFail($id);

        //render view with post
        return view('Post3.show', compact('Post3'));
    }
  
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post3 = Post3::findOrFail($id);

        //render view with post
        return view('Post3.edit', compact('Post3'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'idpegawai'      => 'required|min:1',
            'tglizin'   => 'required|min:1',
            'keterangan'    => 'required|min:1'
        ]);

        //get post by ID
        $post3 = Post3::findOrFail($id);

            //update post without image
        $post3->update([
            'idpegawai'      => $request->idpegawai,
            'tglizin'   => $request->tglizin,
            'keterangan'    => $request->keterangan
        ]);

        //redirect to index
        return redirect()->route('Post3.index')->with(['success' => 'Data Berhasil Di Ubah!']);
    }
        /**
     * destroy
     *
     * @param  mixed $post3
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post3 = Post3::findOrFail($id);

        //delete post
        $post3->delete();

        //redirect to index
        return redirect()->route('Post3.index')->with(['success' => 'Data Berhasil Di Hapus!']);
    }
}