<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /* html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        } */
    </style>
</head>

<body>
    <!-- <div class="flex-center position-ref full-height"> -->


    <div class="content">
        <div class="m-b-md">
            <div class="row p-3">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            Category
                        </div>

                        <div class="card-body">
                            <ul>
                                @foreach ($categories as $category)
                                <?php
                                $path = '';
                                ?>

                                <li class=""><a href="#">{{ $category->name }}</a>|{{$path}}</li>
                                <ul>
                                    @foreach ($category->childrenCategories as $childCategory)
                                    <?php
                                    // $parts  = explode('/', $path);
                                    // $path = array_pop($parts);
                                    // $path .= '/' . str_replace(' ', '-', $childCategory->parent['name']);
                                    $path .= '/' . str_replace(' ', '-', $childCategory->parent['name']);

                                    ?>



                                    @include('child_category', ['child_category' => $childCategory])

                                    @endforeach
                                   
                                </ul>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4">

                    <div class="card">
                        <div class="card-header">
                            Category
                        </div>
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="card-body">
                            <form class="form-inline" action="{{url('/categories')}}" method="post">
                                @csrf

                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="staticEmail2" class="sr-only">Category</label>

                                    <input type="text" name="name" class="form-control" id="inputPassword2" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Add</button>
                            </form>
                            <a href="#">Add Parent Category</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>