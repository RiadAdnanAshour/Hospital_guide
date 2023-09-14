<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة المدن</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url(asset("asset/css/all.min.css")) }}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/normalized.css")) }}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/styleDepatmentAndCity.css")) }}">
</head>
<body class="bg-gray-100">
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="fas fa-city mr-2"></i> قائمة المدن</h2>
                <a class="btn btn-outline-primary" href="{{ route('home2') }}">
                    <i class="fas fa-chevron-circle-left mr-2"></i> رجوع
                </a>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-lg-12">
            @can('person-create')
                <div class="d-flex justify-content-end mb-2">
                    <a class="btn btn-success" href="{{ route('city.create') }}">
                        <i class="fas fa-plus mr-1"></i> إضافة مدينة جديدة
                    </a>
                </div>
            @endcan

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>الرقم</th>
                    <th>اسم المدينة</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->cityName }}</td>

                        <td>
                            <form onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا المدينة؟')" action="{{ route('city.destroy', $city->id) }}" method="POST">
                                @can('person-edit')
                                    <a class="btn btn-primary" href="{{ route('city.edit', $city->id) }}">
                                        <i class="fas fa-edit mr-1"></i> تعديل
                                    </a>
                                @endcan
                                @csrf

                                @method('DELETE')
                                @can('person-edit')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt mr-1"></i> حذف
                                    </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
