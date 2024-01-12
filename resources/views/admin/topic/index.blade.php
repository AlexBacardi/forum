@extends('admin.layouts.adminPanel')
@section('title', 'Темы')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <p class="fs-4">Темы</p>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Название</th>
                                <th scope="col" class="text-center">Ответы</th>
                                <th scope="col" class="text-center">Статус</th>
                                <th scope="col">Дата публикации</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @if (count($category->topics) > 0)
                                    <tr class="fw-medium">
                                        <td colspan="5">{{$category->title}}</td>
                                    </tr>
                                @endif
                                    @foreach ($category->topics as $topic)
                                        <tr>
                                            <td>{{ $topic->id }}</td>
                                            <td><a href="{{route('categories.topics.show', ['category' => $category->id, 'topic' => $topic->id])}}" class="nav-link">{{ $topic->title }}</a></td>
                                            <td class="text-center">{{ $topic->comments()->count() }}</td>
                                            <td class="text-center text-{{ $topic->is_published ? 'success' : 'danger' }}">{{$statusPublish[$topic->is_published] }}</td>
                                            <td>{{ $topic->published_at }}</td>
                                        </tr>
                                    @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
