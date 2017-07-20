@foreach ($tag->tagToBlog as $listed_blog)
    <tr data-toggle="modal" data-target="#myModal{{ $listed_blog->id }}">
        <td class="table-text"><div>{{ $listed_blog->title }}</div></td>
    </tr>
    <!-- Modal -->
    <div id="myModal{{ $listed_blog->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ $listed_blog->title }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ $listed_blog->content }}</p>
                    @foreach ($listed_blog->blogToTag as $added_tag)
                        <button class="btn btn-default">{{ $added_tag->name }}</button>
                    @endforeach<br><br>

                     <form action="{{ url('add/'.$listed_blog->id) }} "method="POST">
                        {{ csrf_field() }}
                        <select name="tagChoice">
                            @foreach ($listed_blog->blogToTag as $tag)
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



