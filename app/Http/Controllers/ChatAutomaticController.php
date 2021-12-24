<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatAutomaticRequest;
use App\Models\ChatAutomatic;
use App\Models\PreTest;

class ChatAutomaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chatautomatic = ChatAutomatic::all();
        return view('pages.admin.chatAutomatic.index', compact(['chatautomatic']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.chatAutomatic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChatAutomaticRequest $request)
    {
        $validated = $request->validated();

        $chatautomatic = ChatAutomatic::create(array_merge($validated,
            [
                'chat' => $request->chat,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('chatautomatic.index')
            ->with('success', 'Chat Otomatis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chatautomatic = ChatAutomatic::where('id', $id);
        return view('pages.admin.chatautomatic.show', compact('chatautomatic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chatautomatic = ChatAutomatic::where('id', $id)->first();
        return view('pages.admin.chatautomatic.edit', compact('chatautomatic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChatAutomaticRequest $request, $id)
    {
        $validated = $request->validated();

        $chatAutomatic = ChatAutomatic::where('id', $id)->update(array_merge($validated,
            [
                'chat' => $request->chat,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('chatautomatic.index')
            ->with('success', 'Chat Otomatis berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ChatAutomatic::where('id', $id)->delete();
        return redirect()->route('chatautomatic.index')
            -> with('success', 'Chat otomatis berhasil dihapus');
    }
}
