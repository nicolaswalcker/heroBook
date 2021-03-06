<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Função que mostra os heróis na tela inicial
        $heroes = Hero::latest()->paginate();
        return view('heroes.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Função que redireciona para a página de criação do herói
        return view('heroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroRequest $request)
    {
        // Função onde o salvamento do herói acontece.

        $data = $request->all();

        // Função que verifica se a imagem do herói e válida
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes','public');
            
        }
        else {
            return redirect()->back()->withInput($request->all())->with('danger', 'Insira uma imagem!');
        }
        
        Hero::create($data);
        return redirect()->route('heroes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Função que exibe o herói individualmente
        if (!$hero = Hero::find($id)) {
            return redirect()->route('heroes.index');
        };

        return view('heroes.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Função que edita o herói individualmente
        if (!$hero = Hero::find($id)) {
            return redirect()->back();
        };

        return view('heroes.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(HeroRequest $request, $id)
    {
        // Função que cuida das atualizações feitas no herói
        if (!$hero = Hero::find($id)) {
            return redirect()->back();
        };

        $data = $request->all();

        // Verificação da imagem do herói
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes','public');
            
        }

        $hero->update($data);

        return redirect()
            ->route('heroes.index')
            ->with('message', "Estrutura do herói {$hero->name} alterada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Função que deleta um herói;
        if (!$hero = Hero::find($id)) {
            return redirect()->route('heroes.index');
        };

        if (Storage::exists($hero->image)) {
            Storage::delete($hero->image);
        };

        $hero->delete();
        return redirect()
            ->route('heroes.index')
            ->with('message', "Herói {$hero->name} dispensado de seus deveres heróicos!");
    }
    public function search(Request $request)
    {
        // Função que filtra os heróis pelos poderes;
        $filters = $request->except('_token');
        $heroes = Hero::where('powerups', 'LIKE', "%{$request->search}%")
            ->latest()
            ->paginate();

        return view('heroes.index', compact('heroes', 'filters'));
    }
}
