<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
@dump(\Illuminate\Support\Facades\Auth::check())
        @dump($data)
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">status_response</th>
                        <th scope="col">admin_email</th>
                        <th scope="col">start_live</th>
                        <th scope="col">end_live</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Ответ да</th>
                        <th scope="col">Ответ нет</th>
                        <th scope="col">Комментарий на нет</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($data); $i++)
{{--                        @foreach($data[$i] as $val)--}}
                            <tr>
                                <th scope="row">{{ $data[$i]->id }}</th>
                                <td>{{ $data[$i]->status_response }}</td>
                                <td>{{ $data[$i]->admin_email }}</td>
                                <td>{{ $data[$i]->start_live }}</td>
                                <td>{{ $data[$i]->end_live }}</td>
                                <td>{{ $data[$i]->created_at }}</td>
                                <form action="{{ route('responseTrue') }}" method="get">
                                    <input type="hidden" name="id" value="{{ $data[$i]->id }}">
                                    <input type="hidden" name="id_user" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                    <td><button name="btn" value="btnYes">Ответ да</button></td>
                                </form>
                                <form action="{{ route('responseFalse') }}" method="get">
                                    <input type="hidden" name="id" value="{{ $data[$i]->id }}">
                                    <input type="hidden" name="id_user" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                    <td><button name="btn" value="btnNo">Ответ нет</button></td>
                                    <td><input name="comment" type="text"></td>
                                </form>

                            </tr>
{{--                        @endforeach--}}

                    @endfor

                    </tbody>
                </table>


            </div>
        </div>
    </div>

</body>
</html>
