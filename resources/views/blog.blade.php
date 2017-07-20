@extends('layouts.template')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <div class="col-sm-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Blogs
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody id="canvas">
                            @foreach ($blogs as $blog)
                                <tr data-toggle="modal" data-target="#myModal{{ $blog->id }}">
                                    <td class="table-text"><div>{{ $blog->title }}</div></td>
                                </tr>
                                <!-- Modal -->
                                <div id="myModal{{ $blog->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{ $blog->title }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $blog->content }}</p>
                                                @foreach ($blog->blogToTag as $added_tag)
                                                    <button class="btn btn-default">{{ $added_tag->name }}</button>
                                                @endforeach<br><br>

                                                <form action="{{ url('add/'.$blog->id) }} "method="POST">
                                                    {{ csrf_field() }}
                                                    <select name="tagChoice">
                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-btn fa-plus"></i>Add Tag
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tags
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td class="table-text"><button id="{{$tag->id}}" class="btn btn-primary" onclick="display(this.id)">{{ $tag->name }}</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>  

    <script>
        function display(id){
            $.get('getblogs/'+id,
                {
                },
                function (data){
                $('#canvas').html(data);
            });
        };
    </script>
@endsection


