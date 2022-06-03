<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @dump(\Illuminate\Support\Facades\Auth::check());
    <div class="container">
        <div class="row">

            <form action="{{ route('add') }}" method="GET">


                <div class="col-12 justify-content-center d-flex">
                    <div class="col-3">
                        <select onchange="function getOpt(e) {
                            document.getElementById('getOpt').value = e.selectedIndex;
                        }

                        getOpt(this)" class="form-select" aria-label="Default select example">
                            <option selected>Выбрать</option>
                            <option value="Ноутбук">Ноутбук</option>
                            <option value="Проектор">Проектор</option>
                        </select>
                        <input type="text" name="getOption" class="d-none" id="getOpt">
                    </div>

                </div>
                    <div class="col-12 d-flex justify-content-center mt-5">

                            <div class="col-3">
                                <input id="startDate" name="start" class="form-control" type="date" />
                            </div>
                        <div class="col-3 ms-5">
                            <input id="startDate" name="end" class="form-control" type="date" />
                        </div>
                    </div>

                <div class="col-12 justify-content-center d-flex mt-5">
                    <button type="submit">send</button>
                </div>




            </form>

        </div>
    </div>

</body>
</html>
