@extends('layouts.app')
@section('javascript')
<script src="/js/confirm.js"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        メモ編集
        <form id="delete-form" action="{{route('destroy')}}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{$edit_memo[0]['id']}}" />
            <i class="fas fa-trash me-3" onclick="deleteHandle(event);"></i>
        </form>
    </div>
    <form class="card-body my-card-body" action="{{route('update')}}" method="POST">
        @csrf
        <input type="hidden" name="memo_id" value="{{$edit_memo[0]['id']}}" />
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力">
            {{$edit_memo[0]['content']}}
            </textarea>
        </div>
        @error('content')
        <div class='alert alert-danger mt-2 mb-2'>メモ内容を入力してください</div>
        @enderror
        @foreach($tags as $tag)
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" class="form-check-input" name="tags[]" id="{{$tag['id']}}" value="{{$tag['id']}}" {{in_array($tag['id'], $include_tags) ? 'checked' : ''}}>
            <label for="{{$tag['id']}}" class="form-check-label">
                {{$tag['name']}}
            </label>
        </div>
        @endforeach
        <input type="text" class="form-control w-50 mt-3 mb-2" name="new_tag" placeholder="新しいタグを入力">
        <button type="submit" class="btn btn-primary mt-3">更新</button>
    </form>
</div>
@endsection
