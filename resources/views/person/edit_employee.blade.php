<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تعديل موظف</title>
    <link rel="stylesheet" href="{{ url(asset("asset/css/bootstrap.min.css")) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url(asset("asset/css/all.min.css")) }}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/normalized.css")) }}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/styleEdit.css")) }}">

</head>

<body>
<div class="container mt-2">
    <div class="animated-bg">
        <h2>مرحبًا بك في مشفى الأوروبي</h2>
    </div>
    <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="fas fa-user-edit mr-2"></i> تعديل موظف</h2>
                <a class="btn btn-outline-primary" href="{{ route('home2') }}">
                    <i class="fas fa-chevron-circle-left mr-2"></i> رجوع
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('person.update', $person->id) }}" method="POST" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        <div class="row mt-3">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="personName"><strong><i class="fas fa-user mr-1"></i> الاسم الشخصي:</strong></label>
                    <input type="text" id="personName" name="personName" class="form-control"
                           value="{{ $person->P_Name }}" placeholder="الاسم الشخصي">
                </div>

                <div class="form-group">
                    <label for="Position"><strong><i class="fas fa-briefcase mr-1"></i> الوظيفة:</strong></label>
                    <input type="text" id="Position" name="Position" class="form-control"
                           value="{{ $person->Position }}" placeholder="الوظيفة">
                </div>

                <div class="form-group">
                    <label for="mobile"><strong><i class="fas fa-mobile-alt mr-1"></i> رقم الجوال:</strong></label>
                    <input type="number" id="mobile" name="mobile" class="form-control"
                           value="{{ $person->Jawwal1 }}" placeholder="رقم الجوال">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Section"><strong><i class="fas fa-layer-group mr-1"></i> القسم:</strong></label>
                    <select name="Section" id="Section" class="form-control">
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}" @if($dept->id == $person->dept_id) selected @endif>
                                {{ $dept->Dept_Name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="city"><strong><i class="fas fa-city mr-1"></i> المدينة:</strong></label>
                    <select name="city_id" id="city" class="form-control">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @if($city->id == $person->city_id) selected @endif>
                                {{ $city->cityName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="telephone"><strong><i class="fas fa-phone mr-1"></i> رقم التلفون:</strong></label>
                    <input type="number" id="telephone" name="telephone" class="form-control"
                           value="{{ $person->Phone1 }}" placeholder="رقم التلفون">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-2"></i> حفظ التعديلات
                </button>
            </div>
        </div>

    </form>
</div>
</body>

</html>
