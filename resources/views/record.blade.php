<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شهادة صحية سنوية</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <section class="bg-white shadow rounded p-5">
        <div class="text-center mb-5">
            <h2 class="text-primary font-weight-bold">شهادة صحية سنوية</h2>
        </div>
        <div class="text-center mb-4">
            @if ($record->image_path)
                <img src="{{ asset('storage/' . $record->image_path) }}" alt="Image" class="img-fluid rounded shadow" width="150">
            @else
                <p>No image</p>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">الامانة</label>
                <input type="text" class="form-control" value="{{$record->honesty}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">البلدية</label>
                <input type="text" class="form-control" value="{{$record->municipal}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">الاسم</label>
                <input type="text" class="form-control" value="{{$record->name}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">رقم الهوية</label>
                <input type="text" class="form-control" value="{{$record->id_number}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">الجنس</label>
                <input type="text" class="form-control" value="{{$record->sex}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">الجنسية</label>
                <input type="text" class="form-control" value="{{$record->nationality}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">رقم الشهادة الصحية</label>
                <input type="text" class="form-control" value="{{$record->health_certificate_number}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">المهنة</label>
                <input type="text" class="form-control" value="{{$record->occupation}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">تاريخ إصدار الشهادة الصحية هجري</label>
                <input type="text" class="form-control" value="{{$record->issue_date_hc_H}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">تاريخ إصدار الشهادة الصحية ميلادي</label>
                <input type="text" class="form-control" value="{{$record->issue_date_hc_AD}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">تاريخ نهاية الشهادة الصحية هجري</label>
                <input type="text" class="form-control" value="{{$record->end_date_hc_H}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">تاريخ نهاية الشهادة الصحية ميلادي</label>
                <input type="text" class="form-control" value="{{$record->end_date_hc_AD}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">نوع البرنامج التثقيفى</label>
                <input type="text" class="form-control" value="{{$record->type_of_edu}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">تاريخ انتهاء البرنامج التثقيفى</label>
                <input type="text" class="form-control" value="{{$record->end_date_edu}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">رقم الرخصة</label>
                <input type="text" class="form-control" value="{{$record->licence_number}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">اسم المنشآة</label>
                <input type="text" class="form-control" value="{{$record->facility_name}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">رقم المنشأة</label>
                <input type="text" class="form-control" value="{{$record->facility_no}}" readonly>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
