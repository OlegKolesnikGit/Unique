@extends('manager.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список категорий</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('categories.create') }}">
                    <button type="button" class="btn btn-primary mb-5">Добавить категорию</button>
                </a>
                @if (count($categories))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Slug</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td style="width:260px;">
                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                           class="btn btn-primary float-left mr-1 mb-1">
                                            <i class="fa fa-pen"></i> Изменить
                                        </a>
                                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                              method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Подтвердите удаление')"><i
                                                    class="fa fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links('vendor/pagination.bootstrap-4') }}
                @else
                    <h4>Список категорий пуст! Добавьте хотя бы одну категорию.</h4>
                @endif
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection


