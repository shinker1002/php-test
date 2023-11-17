<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $group;

    public function __construct(group $group){

        $this->group = $group;
    }

    public function index()
    {

        $groups = Group::all();
        // produce/index.blade 에 $products 를 보내줍니다
        return view('groups.index', compact('groups'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Request 에 대한 유효성 검사입니다, 다양한 종류가 있기에 공식문서를 보시는 걸 추천드립니다.
        // 유효성에 걸린 에러는 errors 에 담깁니다.
        $request = $request->validate([
            'groupName' => 'required',
            'groupDescription' => 'required'
        ]);
        $this->group->create($request);
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request = $request->validate([
            'groupName' => 'required',
            'groupDescription' => 'required'
        ]);
        // $product는 수정할 모델 값이므로 바로 업데이트 해줍시다.
        $group->update($request);
        return redirect()->route('groups.index', $group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}
