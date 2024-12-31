@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Tambah Aksesoris</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="/dashboard"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="/accessories"><div class="text-tiny">Data Aksesoris</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">Tambah Aksesoris</div>
        </li>
    </ul>
</div>

<form action="/accessories" method="post" class="tf-section-1 form-add-product" enctype="multipart/form-data">
    @csrf
    <div class="wg-box">
        <fieldset class="name">
            <div class="body-title mb-10">Nama<span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" name="name" placeholder="Masukkan nama aksesoris" tabindex="0" value="" required="">
        </fieldset>
        <div class="gap22 cols">
            <fieldset class="price">
                <div class="body-title mb-10">Harga <span class="tf-color-1">*</span></div>
                <input class="mb-10" name="price" type="text" placeholder="Masukkan harga " tabindex="0" value="" required="">
            </fieldset>
            <fieldset class="stock">
                <div class="body-title mb-10">Stok <span class="tf-color-1">*</span></div>
                <input class="mb-10" name="stock" type="text" placeholder="Masukkan stok" tabindex="0" value="" required="">
            </fieldset>
        </div>
        <fieldset class="category">
            <div class="body-title mb-10">Kategori <span class="tf-color-1">*</span></div>
            <div class="select">
                <select name="category" class="">
                    <option value="" disabled selected>Pilih Kategori </option>
                    <option value="Controller">Controller</option>
                    <option value="VR">VR</option>
                </select>
            </div>
        </fieldset>
        <fieldset class="description">
            <div class="body-title mb-10">Deskripsi <span class="tf-color-1">*</span></div>
            <textarea class="mb-10" name="description" placeholder="Masukkan deskripsi" tabindex="0" required=""></textarea>
        </fieldset>
    </div>
    <div class="wg-box">
        <fieldset>
            <div class="body-title mb-10">Upload Gambar</div>
            <!-- Div for success message -->
            <div id="uploadSuccess" style="display:none; color: green;" class="mb-10">
                Image uploaded successfully!
            </div>
            <div class="upload-image mb-16" id="uploadArea" style="background-size: cover; background-position: center;">
                <div class="item up-load">
                    <label class="uploadfile" for="images">
                        <span class="icon">
                            <i class="icon-upload-cloud"></i>
                        </span>
                        <span class="text-tiny">Taruh gambar di sini  <span class="tf-color">klik untuk mencari</span></span>
                        <input type="file" id="images" name="images" required="">
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="cols gap10">
            <button class="tf-button w-full" type="submit">Tambah Aksesoris</button>
        </div>
    </div>
</form>

<script>
    document.getElementById('images').addEventListener('change', function(event) {
        var uploadArea = document.getElementById('uploadArea');
        var successMessage = document.getElementById('uploadSuccess');
        var file = event.target.files[0];
        
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                uploadArea.style.backgroundImage = 'url(' + e.target.result + ')';
            }
            reader.readAsDataURL(file);
            successMessage.style.display = 'block';
        } else {
            uploadArea.style.backgroundImage = 'none';
            successMessage.style.display = 'none';
        }
    });
</script>
@endsection
