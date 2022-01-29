@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
    <form class="card-body my-card-body" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
        </div>
        @error('content')
        <div class='alert alert-danger mt-2 mb-2'>メモ内容を入力してください</div>
        @enderror
        @foreach($tags as $tag)
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" class="form-check-input" name="tags[]" id="{{$tag['id']}}" value="{{$tag['id']}}">
            <label for="{{$tag['id']}}" class="form-check-label">
                {{$tag['name']}}
            </label>
        </div>
        @endforeach
        <input type="text" class="form-control w-50 mt-3 mb-2" name="new_tag" placeholder="新しいタグを入力">
        <button type="submit" class="btn btn-primary mt-3">保存</button>
    </form>
</div>
@endsection
