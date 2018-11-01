@extends('layouts.template')

@section('title', 'Blog Admin Panel')

@section('content')

    <div class="nav navbar-nav pull-right">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </div>

    <h1>Admin Panel</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">Create New Blog Post</a>

    <br><br><br>

    <table class="table">
        <thead>
            <th>id</th>
            <th>title</th>
            <th>body</th>
            <th>edit</th>
            <th>delete</th>
        </thead>

        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td><a href="{{ route('posts.edit', ['id'=>$post->id]) }}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{ route('posts.destroy', ['id'=>$post->id]) }}" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">

                            <input class="btn btn-danger" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection