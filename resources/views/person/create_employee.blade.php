<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>إضافة موظف</title>
    <link rel="stylesheet" href="{{ url(asset("asset/css/bootstrap.min.css")) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url(asset("asset/css/all.min.css"))}}">
    <link rel="stylesheet" href="{{url(asset("asset/css/normalized.css"))}}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/styleEdit.css")) }}">
</head>

<style>

</style>
</head>
<body>

<div class="container mt-4">
    <div class="animated-bg">
        <h2>مرحبًا بك في مشفى الأوروبي</h2>
    </div><br>

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="mb-0"><i class="fas fa-user-plus mr-2"></i> إضافة موظف</h2>
            <a class="btn btn-outline-primary" href="{{ route('home2') }}">
                <i class="fas fa-chevron-circle-left mr-2 fa-lg"></i> رجوع
            </a>
        </div>
    </div>

    <form action="{{ route('person.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row mt-3">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="personName"><strong><i class="fas fa-user mr-1 "></i>الاسم الشخصي</strong></label>
                    <input type="text" id="personName" name="personName" class="form-control"
                           placeholder="الاسم الشخصي">
                </div>

                <div class="form-group">
                    <label for="Position"><strong><i class="fas fa-briefcase mr-1"></i>الوظيفة</strong></label>
                    <input type="text" id="Position" name="Position" class="form-control" placeholder="الوظيفة">
                </div>

                <div class="form-group">
                    <label for="mobile"><strong><i class="fas fa-mobile-alt mr-1"></i>رقم الجوال</strong></label>
                    <input type="number" id="mobile" name="mobile" class="form-control" placeholder="رقم الجوال">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Section"><strong><i class="fas fa-layer-group mr-1"></i>القسم</strong></label>
                    <select name="Section" class="form-control" id="Section">
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->Dept_Name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="city"><strong><i class="fas fa-city mr-1"></i>المدينة</strong></label>
                    <select name="city_id" class="form-control" id="city">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="telephone"><strong><i class="fas fa-phone mr-1"></i>رقم التلفون</strong></label>
                    <input type="number" id="telephone" name="telephone" class="form-control"
                           placeholder="رقم التلفون">
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save mr-2"></i> حفظ
                </button>
            </div>
        </div>

    </form>
</div>


</body>


</html>
