@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
    <form class="card-body" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
        </div>
        <input type="text" class="form-control w-50 mt-3 mb-2" name="new_tag" placeholder="新しいタグを入力">
        <button type="submit" class="btn btn-primary mt-3">保存</button>
    </form>
</div>
@endsection
