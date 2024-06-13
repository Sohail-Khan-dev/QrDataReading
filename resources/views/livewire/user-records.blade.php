<div>
    <style>
        .table-container {
            width: 100%;
            overflow-x: auto;
            max-height: 600px; /* Set the desired height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        table {
            width: auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 4px 6px;
            border: 1px solid #ccc;
            white-space: nowrap;
        }
        .table-container thead th {
            position: sticky;
            top: 0;
            background: #f8f9fa; /* Background color for the header */
            z-index: 1; /* Ensure the header is above the table body */
        }
        th {
            background-color: #f2f2f2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }
        .table-container th, .table-container td {
            padding: 8px 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .table-container tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for better readability */
        }
    </style>

    <div class="border p-3 bg-light rounded-lg shadow-lg">
        <div class="d-flex justify-content-center align-items-center">
            <!-- Search By ID Section -->
            <!-- <div class="d-flex flex-column align-items-center">
                <label class="form-label fw-bold" for="searchById">Search By ID</label>
                <div class="d-flex gap-3 align-items-center w-100">
                    <input wire:model.defer="searchById" class="form-control" id="searchById" type="text" placeholder="Search ID here">
                    <button wire:click="searchRecord" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div>

             Search By Certificate Number Section
            <div class="d-flex flex-column align-items-center">
                <label class="form-label fw-bold" for="searchByCertificate">Search By Certificate Number</label>
                <div class="d-flex gap-3 align-items-center w-100">
                    <input wire:model.defer="searchByCertificate" class="form-control" id="searchByCertificate" type="text" placeholder="Search Certificate Number here">
                    <button wire:click="searchRecord" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div> -->

            <!-- Add New Record Button -->
            <div class="mt-3">
                <button wire:click="openModal" class="btn btn-success">
                    Add New Record
                </button>
            </div>
        </div>
    </div>
    <!-- Modal for Adding New Record -->
    @if ($isOpen)
<div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">شهادة صحية سنوية</h5>
                <button type="button" class="close px-2" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent="save">
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="honesty">الامانة</label>
                        <input dir="rtl" wire:model.defer="honesty" class="form-control" id="honesty" type="text" placeholder="الامانة">
                        @error('honesty') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="municipal">البلدية</label>
                        <input dir="rtl" wire:model.defer="municipal" class="form-control" id="municipal" type="text" placeholder="البلدية">
                        @error('municipal') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="id_number">رقم الهوية </label>
                        <input dir="rtl" wire:model.defer="id_number" class="form-control" id="id_number" type="number" placeholder="رقم الهوية">
                        @error('id_number') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="name">الاسم</label>
                        <input dir="rtl" wire:model.defer="name" class="form-control" id="name" type="text" placeholder="الاسم">
                        @error('name') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="sex">الجنس</label>
                        <input dir="rtl" wire:model.defer="sex" class="form-control" id="sex" type="text" placeholder="الجنس">
                        @error('sex') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="nationality">الجنسية</label>
                        <input dir="rtl" wire:model.defer="nationality" class="form-control" id="nationality" type="text" placeholder="الجنسية">
                        @error('nationality') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="health_certificate_number">رقم الشهادة الصحية</label>
                        <input dir="rtl" wire:model.defer="health_certificate_number" class="form-control" id="health_certificate_number" type="number" placeholder="رقم الشهادة الصحية">
                        @error('health_certificate_number') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="occupation">المهنة</label>
                        <input dir="rtl" wire:model.defer="occupation" class="form-control" id="occupation" type="text" placeholder="المهنة">
                        @error('occupation') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="licence_number">رقم الرخصة</label>
                        <input dir="rtl" wire:model.defer="licence_number" class="form-control" id="licence_number" type="text" placeholder="رقم الرخصة">
                        @error('licence_number') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="facility_name">اسم المنشآة</label>
                        <input dir="rtl" wire:model.defer="facility_name" class="form-control" id="facility_name" type="text" placeholder="اسم المنشآة">
                        @error('facility_name') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="facility_no">رقم المنشأة</label>
                        <input dir="rtl" wire:model.defer="facility_no" class="form-control" id="facility_no" type="number" placeholder="رقم المنشأة">
                        @error('facility_no') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="type_of_edu">نوع البرنامج التثقيفى</label>
                        <input dir="rtl" wire:model.defer="type_of_edu" class="form-control" id="type_of_edu" type="text" placeholder="نوع البرنامج التثقيفى">
                        @error('type_of_edu') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="end_date_edu">تاريخ انتهاء البرنامج التثقيفى</label>
                        <input dir="rtl" wire:model.defer="end_date_edu" class="form-control" id="end_date_edu" type="date">
                        @error('end_date_edu') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
              
                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="image">تحميل صورة</label>
                        <input dir="rtl" wire:model.defer="image" class="form-control" id="image" type="file">
                        @error('image') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="issue_date_hc_H">تاريخ إصدار الشهادة الصحية هجري</label>
                        <input dir="rtl" wire:model.defer="issue_date_hc_H" class="form-control" id="issue_date_hc_H" type="date">
                        @error('issue_date_hc_H') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="issue_date_hc_AD">تاريخ إصدار الشهادة الصحية ميلادي</label>
                        <input dir="rtl" wire:model.defer="issue_date_hc_AD" class="form-control" id="issue_date_hc_AD" type="date">
                        @error('issue_date_hc_AD') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="end_date_hc_H">تاريخ نهاية الشهادة الصحية هجري</label>
                        <input dir="rtl" wire:model.defer="end_date_hc_H" class="form-control" id="end_date_hc_H" type="date">
                        @error('end_date_hc_H') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label dir="rtl" class="form-label fw-bold" for="end_date_hc_AD">تاريخ نهاية الشهادة الصحية ميلادي</label>
                        <input dir="rtl" wire:model.defer="end_date_hc_AD" class="form-control" id="end_date_hc_AD" type="date">
                        @error('end_date_hc_AD') <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" wire:click="save">Save</button>
                        <button type="button" wire:click="closeModal" class="btn btn-secondary">Cancel</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endif




    <div class="mt-5 table-container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <!-- <th> See Details </th> -->
                    <!-- <th class="px-4 py-2">الامانة</th> -->
                    <!-- <th class="px-4 py-2">البلدية</th> -->
                    <th class="px-4 py-2">الاسم</th>
                    <th class="px-4 py-2"> رقم الهوية </th>
                    <!-- <th class="px-4 py-2"> الجنس</th> -->
                    <th class="px-4 py-2"> الجنسية</th>
                    <th class="px-4 py-2"> رقم الشهادة الصحية</th>
                    <!-- <th class="px-4 py-2"> المهنة</th> -->
                    <!-- <th class="px-4 py-2"> تاريخ إصدار الشهادة الصحية هجري </th>
                    <th class="px-4 py-2"> تاريخ إصدار الشهادة الصحية ميلادي  </th>
                    <th class="px-4 py-2"> تاريخ نهاية الشهادة الصحية هجري</th>
                    <th class="px-4 py-2"> تاريخ نهاية الشهادة الصحية ميلادي</th>
                    <th class="px-4 py-2"> نوع البرنامج التثقيفى</th>
                    <th class="px-4 py-2"> تاريخ انتهاء البرنامج التثقيفى</th> -->
                    <!-- <th class="px-4 py-2"> رقم الرخصة</th> -->
                    <!-- <th class="px-4 py-2"> اسم المنشآة</th>
                    <th class="px-4 py-2"> رقم المنشأة </th> -->
                    <th class="px-4 py-2">صورة</th>
                    <th class="px-4 py-2">qrcode</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recoreds as $record)
                <tr>
                    <!-- <td>
                        <button wire:click="showRecord({{$record->id}})" class=" m-4 btn-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Details <span>{{$record->id}}</span>
                        </button>
                    </td> -->
                    <!-- <td> {{$record->honesty}} </td> -->
                    <!-- <td> {{$record->municipal}} </td> -->
                    <td> {{$record->name}} </td>
                    <td> {{$record->id_number}} </td>
                    <!-- <td> {{$record->sex}} </td> -->
                    <td> {{$record->nationality}} </td>
                    <td> {{$record->health_certificate_number}} </td>
                    <!-- <td> {{$record->occupation}} </td> -->
                    <!-- <td> {{$record->issue_date_hc_H}} </td>
                        <td> {{$record->issue_date_hc_AD}} </td>
                        <td> {{$record->end_date_hc_H}} </td>
                        <td> {{$record->end_date_hc_AD}} </td>
                        <td> {{$record->type_of_edu}} </td>
                        <td> {{$record->end_date_edu}} </td> -->
                    <!-- <td> {{$record->licence_number}} </td> -->
                    <!-- <td> {{$record->facility_name}} </td>
                    <td> {{$record->facility_no}} </td> -->
                    <td>
                        @if ($record->image_path)
                            <img src="{{ asset('storage/' . $record->image_path) }}" alt="Image" width="100">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <img src="{{ asset('storage/qrcodes/' . $record->id . '.png') }}" alt="Image" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
