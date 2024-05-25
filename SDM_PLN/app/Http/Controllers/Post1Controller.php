<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post1;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class Post1Controller extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $post1 = post1::all();

        //render view with posts
        return view('post1.index')->with('post1',$post1);
    }
    public function view_pdf()
    {
        $post1 = Post1::all();
        $pdf = Pdf::loadView('pdf.Post1', ['Post1' => $post1]);
        return $pdf->download('Post1.pdf');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('post1.create');
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
            'tglmasuk'   => 'required|min:1',
            'jammasuk'    => 'required|min:1',
            'jampulang'     => 'required|min:1'
        ]);

        //create post
        post1::create([
            'idpegawai'      => $request->idpegawai,
            'tglmasuk'   => $request->tglmasuk,
            'jammasuk'    => $request->jammasuk,
            'jampulang'     => $request->jampulang
        ]);

        //redirect to index
        return redirect()->route('post1.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $post1 = post1::findOrFail($id);

        //render view with post
        return view('post1.show', compact('post1'));
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
        $post1 = post1::findOrFail($id);

        //render view with post
        return view('post1.edit', compact('post1'));
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
            'tglmasuk'   => 'required|min:1',
            'jammasuk'    => 'required|min:1',
            'jampulang'     => 'required|min:1'
        ]);

        //get post by ID
        $post1 = post1::findOrFail($id);

            //update post without image
        $post1->update([
            'idpegawai'      => $request->idpegawai,
            'tglmasuk'   => $request->tglmasuk,
            'jammasuk'    => $request->jammasuk,
            'jampulang'     => $request->jampulang
        ]);

        //redirect to index
        return redirect()->route('post1.index')->with(['success' => 'Data Berhasil Di Ubah!']);
    }
        /**
     * destroy
     *
     * @param  mixed $post1
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post1 = post1::findOrFail($id);

        //delete post
        $post1->delete();

        //redirect to index
        return redirect()->route('post1.index')->with(['success' => 'Data Berhasil Di Hapus!']);
    }
}