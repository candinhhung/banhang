<?php

namespace App\Http\Controllers;

use App\Component\MenuRecusive;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $menuRecusive;
    public function __construct(MenuRecusive $menuRecusive)
    {
        $this->menuRecusive = $menuRecusive;
    }
    public function index()
    {
        $menu = Menu::paginate(5);
        return view('menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menu.add',compact('optionSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Menu::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::where('id',$id)->first();
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('menu.edit',compact('optionSelect','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Menu::where('id',$id)->update(['name' => $request->name,'parent_id' => $request->parent_id]);
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
    }
}
