@extends('lucaborghy.blogkit.app')
@section('content')
    @if(isset($post))
        <h3>Edit : </h3>
        {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'patch']) !!}
    @else
        <h3>Add New Post : </h3>
        {!! Form::open(['route' => 'post.store']) !!}
    @endif
        <div class="form-inline">
            <div class="form-group">
                {!! Form::text('title',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit($submit, ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <hr>
    <h4>Posts list : </h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                        {!! Form::open(['route' => ['post.destroy', $post->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('post.edit', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
