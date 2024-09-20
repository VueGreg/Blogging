<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="comments.js"></script>

        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}
            
            /* Set gray background color and 100% height */
            .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            }
            
            /* Set black background color, white text and some padding */
            footer {
            background-color: #555;
            color: white;
            padding: 15px;
            }
            
            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;} 
            }
        </style>
    </head>


    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                <h4>John's Blog</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="#section2">Friends</a></li>
                    <li><a href="#section3">Family</a></li>
                    <li><a href="#section3">Photos</a></li>
                </ul><br>
                <form class="input-group" action="/search" method="post">
                    @csrf
                    <input type="text" name="search" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </form>
        </div>

        <div class="col-sm-9" style="background-color: white; padding: 5rem">
            <a href="#" style="text-decoration: none; color:#555">
            @foreach ($posts as $post)
                <h4><small>POSTS</small></h4>
                <hr>
                <h2>{{ $post->title }}</h2>
                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $post->user->name }}, {{ $post->updated_at }}</h5>
                @foreach ($post->tags as $tag)
                    <h5><span class="label label-danger">{{ $tag->name }}</span></h5>
                @endforeach
                <p>{{ $post->text }}</p>
                <ul>
                @foreach ($post->comments as $comment)
                    <li class="row" style="list-style: none">
                        <div class="col-sm-10">
                            <div style="display: flex; justify-content: space-between">
                                <h4>{{ $comment->user->name }}<small style="padding-left: 3rem">{{ $comment->updated_at }}</small></h4>

                                <div>
                                    <form class="btn btn-primary" action="/comment/{{ $comment->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" value="Delete" style="background-color: inherit; border: none">
                                    </form>

                                    <div class="btn btn-warning" id="edit" 
                                        onclick="document.getElementById('commentEdit').value = '{{ $comment->text }}';
                                                document.getElementById('submit').style.display = 'none';
                                                document.getElementById('modify').style.display = 'block';
                                                document.getElementById('modify').action = '/comment/{{ $comment->id }}';
                                                document.getElementById('modifyValue').value = {{ $comment->post_id }};
                                            "
                                        >
                                        <input type="button" value="Edit" style="background-color: inherit; border: none">
                                    </div>
                                </div>
                            </div>
                            <p>{{ $comment->text }}</p>
                            <br>
                        </div>
                    </li>
                @endforeach
                </ul>
            <br><br>

            <div id='form'>
                <h4>Leave a Comment:</h4>
                <form role="form" action="/comment" method="post" id="submit">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="3" required></textarea>
                        <input type="hidden" name="post" value="{{ $post->id }}">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

                <form role="form" method="post" style="display: none" id="modify">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <textarea class="form-control" name="comment" id="commentEdit" rows="3" required></textarea>
                        <input type="hidden" name="post" id="modifyValue">
                    </div>
                    <button type="submit" class="btn btn-success">Modify</button>
                </form>
            </div>
            <br><br>
            @endforeach
            </a>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>
    </body>

</html>
