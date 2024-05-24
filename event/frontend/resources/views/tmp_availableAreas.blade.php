<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Silir</title>
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <div class="col-md-12">
        <div class="form-group">
            <label for="area">Choose Area :</label>
            <div class="row">
                @foreach ($availableAreas['data'] as $area)
                    @if ($area['id_area'] == 1)
                        <div class="col-md-3">
                            <div class="checkbox-container">
                                <input type="checkbox" id="checkbox1" name="id_area[]" value="1">
                                <label for="checkbox1">Area A</label>
                            </div>
                            <img src="image/areaA.jpeg" style="max-width: 100%; height: 200px;">
                        </div>
                    @endif
                    @if ($area['id_area'] == 2)
                        <div class="col-md-3">
                            <div class="checkbox-container">
                                <input type="checkbox" id="checkbox2" name="id_area[]" value="2">
                                <label for="checkbox2">Area B</label>
                            </div>
                            <img src="image/areaB.jpeg" style="max-width: 100%; height: 200px;">
                        </div>
                    @endif
                    @if ($area['id_area'] == 3)
                        <div class="col-md-3">
                            <div class="checkbox-container">
                                <input type="checkbox" id="checkbox3" name="id_area[]" value="3">
                                <label for="checkbox3">Area C</label>
                            </div>
                            <img src="image/AreaC.jpeg" style="max-width: 100%; height: 200px;">
                        </div>
                    @endif
                    @if ($area['id_area'] == 4)
                        <div class="col-md-3">
                            <div class="checkbox-container">
                                <input type="checkbox" id="checkbox4" name="id_area[]" value="4">
                                <label for="checkbox4">Area D</label>
                            </div>
                            <img src="image/AreaD.jpg" style="max-width: 100%; height: 200px;">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
