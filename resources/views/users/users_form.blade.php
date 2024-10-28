@extends('layout.users_layout')
@section('user_layout')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">

    <form action="{{ route('formsCreate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="day" name="day">
        <input type="hidden" id="month" name="month">
        <input type="hidden" id="year" name="year">

        <div class="mb-3 col-md-3">
            <label for="writeAt" class="form-label">เขียนที่<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="writeAt" name="writeAt" placeholder="โปรดระบุ" required>
        </div>

        @php
        // สร้างอาร์เรย์ชื่อเดือนในภาษาไทย
            $months = [
            1 => 'มกราคม',
            2 => 'กุมภาพันธ์',
            3 => 'มีนาคม',
            4 => 'เมษายน',
            5 => 'พฤษภาคม',
            6 => 'มิถุนายน',
            7 => 'กรกฎาคม',
            8 => 'สิงหาคม',
            9 => 'กันยายน',
            10 => 'ตุลาคม',
            11 => 'พฤศจิกายน',
            12 => 'ธันวาคม',
            ];
        @endphp

        <p>{{ date('j', strtotime(now())) }} {{ $months[date('n', strtotime(now()))] }} พ.ศ.{{ date('Y') + 543 }}</p>

        <br>

        <h5>ข้าพเจ้า</h5>

        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="salutation" class="form-label">คำนำหน้า<span class="text-danger">*</span></label>
                <select class="form-select" id="salutation" name="salutation">
                    <option selected>นาย</option>
                    <option>นาง</option>
                    <option>นางสาว</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="fullname" class="form-label">ชื่อ - สกุล<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ชื่อ - นามสกุล" required>
            </div>
            <div class="col-md-1 mb-3">
                <label for="age" class="form-label">อายุ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="age" name="age" placeholder="โปรดระบุ" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="occupation" class="form-label">อาชีพ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="โปรดระบุ" required>
            </div>
        </div>

        <br>

        <h5>ที่อยู่</h5>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="houseNo" class="form-label">บ้านเลขที่<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="houseNo" name="houseNo" placeholder="โปรดระบุ" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="villageNo" class="form-label">หมู่ที่<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="villageNo" name="villageNo" placeholder="โปรดระบุ" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="alley" class="form-label">ตรอก/ซอย<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alley" name="alley" placeholder="โปรดระบุ">
            </div>
            <div class="col-md-2 mb-3">
                <label for="road" class="form-label">ถนน<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="road" name="road" placeholder="โปรดระบุ">
            </div>
            <div class="col-md-2 mb-3">
                <label for="subDistrict" class="form-label">แขวง/ตำบล<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="subDistrict" name="subDistrict" placeholder="โปรดระบุ" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="district" class="form-label">เขต/อำเภอ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="district" name="district" placeholder="โปรดระบุ" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="province" class="form-label">จังหวัด<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="province" name="province" placeholder="โปรดระบุ" required>
            </div>
            <div class="mb-3 col-md-3">
                <label for="phone" class="form-label">โทรศัพท์<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="โปรดระบุ" required maxlength="15">
            </div>
        </div>

        <br>

        <div class="mb-3 col-md-4">
            <label for="complaintName" class="form-label">ยื่นคําร้องต่อ<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="complaintName" name="complaintName" placeholder="โปรดระบุ" required>
        </div>
        <div class="mb-3 col-md-7">
            <label for="complaintDetails" class="form-label">เนื่องจาก<span class="text-danger">*</span></label>
            <textarea class="form-control" id="complaintDetails" name="complaintDetails" rows="3" placeholder="โปรดระบุ" required></textarea>
        </div>
{{--
        <br>

        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="documentNumber" class="form-label">จำนวนเอกสาร<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="documentNumber" name="documentNumber" placeholder="โปรดระบุ" required oninput="updateFileInputs()">
            </div>
        </div>

        <div class="col-md-4" id="fileInputsContainer">
            <label for="fileUpload" class="form-label">ไฟล์แนบ</label>
            <div id="fileInputs">
                <!-- Inputs for file uploads will be added here -->
            </div>
        </div>

        <script>
            function updateFileInputs() {
                const container = document.getElementById('fileInputs');
                const documentNumber = document.getElementById('documentNumber').value;

                container.innerHTML = '';

                for (let i = 0; i < documentNumber; i++) {
                    const fileInput = document.createElement('input');
                    fileInput.type = 'file';
                    fileInput.className = 'form-control mb-2';
                    fileInput.name = `fileUpload[]`;
                    fileInput.id = `fileUpload-${i + 1}`;
                    container.appendChild(fileInput);
                }
            }
        </script> --}}

        <br>

        <div class="text-end">
            <button type="reset" class="btn btn-secondary">เคลียร์ข้อมูล</button>
            <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
        </div>
        <br>
    </form>

</div>
</div>

<script>
    // Get current date
    const currentDate = new Date();

    // Set hidden input values
    document.getElementById('day').value = currentDate.getDate(); // วัน
    document.getElementById('month').value = currentDate.getMonth() + 1; // เดือน (January is 0)
    document.getElementById('year').value = currentDate.getFullYear(); // ปี

</script>
@endsection
