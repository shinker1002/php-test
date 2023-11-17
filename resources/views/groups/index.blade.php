{{-- layout 으로 --}}
@extends('groups.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Group List</h2>

    <a href="{{route("groups.create")}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>


    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">GroupName</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
        {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력해줍니다. --}}
        @foreach ($groups as $key => $group)
            <tr>
                <td>{{$group->id}}</td>
                <td>{{$group->groupName}}</td>
                <td>
                    <a href="{{route("groups.edit", $group)}}">Edit</a>
                    <form action="{{route('groups.destroy', $group->id)}}" method="post" style="display:inline-block;">
                        {{-- delete method와 csrf 처리필요 --}}
                        @method('delete')
                        @csrf
                        <input onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- 라라벨 기본 지원 페이지네이션 --}}
@endsection