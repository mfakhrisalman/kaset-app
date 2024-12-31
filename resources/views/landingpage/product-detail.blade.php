@extends('layouts_lp.main')

@section('container')
<div id="fh5co-about">
    <div class="container">
        <div class="about-content">
            <div class="row animate-box">
                <div class="col-md-4">
                    <img class="img-responsive" src="{{ asset('storage/' . $game->images) }}" alt="about">
                </div>
                <div class="col-md-8">
                    <div class="desc">
                        <h2>{{ $game->name }}</h2>
                        <hr>    
                        <h3>Rp {{ number_format($game->price, 0, ',', '.') }}</h3>

                        <!-- Product quantity controls -->
                        <div class="product-quantity mb-3">
                            <form id="cart-form-{{ $game->id }}" action="/product/cart/detail" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $game->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="status" value="cart">
                                <input type="hidden" name="quantity" id="quantity-input" value="1">
                            </form>
                            <button class="btn btn-secondary btn-sm" id="decrease">-</button>
                            <input type="text" id="quantity" class="form-control d-inline-block text-center" value="1" readonly>
                            <button class="btn btn-secondary btn-sm" id="increase">+</button>
                            @can('pelanggan')
                            <a href="javascript:void(0)" class="btn btn-primary btn-outline btn-lg" onclick="submitCartForm({{ $game->id }})">Tambah Ke Keranjang</a>
                            @else
                            <a href="/login" class="btn btn-primary btn-outline btn-lg" onclick="submitCartForm({{ $game->id }})">Tambah Ke Keranjang</a>
                            @endcan

                        </div>

                    </div>
                </div>
                <div class="desc col-md-12 mt-4">
                    <h3>Deskripsi</h3>
                    <p>{{ $game->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-quantity {
        display: flex;
        align-items: center;
        margin-bottom: 40px;
    }
    .product-quantity button {
        width: 40px;
        height: 40px;
        font-size: 20px;
        border-radius: 0;
        text-align: center;
        padding: inherit;
        margin-top: 4px;
    }

    .product-quantity input {
        width: 60px;
        height: 40px;
        text-align: center;
        border-radius: 0;
        margin: 0 5px;
        font-size: 16px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quantityInput = document.getElementById('quantity');
        var quantityHiddenInput = document.getElementById('quantity-input');
        var decreaseButton = document.getElementById('decrease');
        var increaseButton = document.getElementById('increase');

        decreaseButton.addEventListener('click', function () {
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                quantityHiddenInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', function () {
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            quantityHiddenInput.value = currentValue + 1;
        });
    });
</script>
<script>
    function submitCartForm(productId) {
        var form = document.getElementById('cart-form-' + productId);
        if (form) {
            form.submit();
        }
    }
</script>
@endsection
