<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>إضافة قسم</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url(asset("asset/css/all.min.css")) }}">
    <link rel="stylesheet" href="{{ url(asset("asset/css/normalized.css")) }}">

</head>
<body class="bg-gray-100">
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="fas fa-layer-group mr-2"></i> إضافة قسم</h2>
                <a class="btn btn-outline-primary" href="{{ route('dept.index') }}">
                    <i class="fas fa-chevron-circle-left mr-2"></i> رجوع
                </a>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('dept.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Dept_Name"><strong><i class="fas fa-building mr-1"></i> اسم القسم</strong></label>
                    <input type="text" name="Dept_Name" class="form-control" placeholder="اسم القسم">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i> إرسال
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
