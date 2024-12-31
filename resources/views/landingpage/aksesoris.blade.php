@extends('layouts_lp.main')

@section('container')
<style>
    .pagination-wrapper {
        text-align: right;
    }
    
    .pagination {
        display: inline-block;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 8px 16px;
        margin: 0 4px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #007bff;
    }
    
    .pagination a:hover {
        background-color: #f8f9fa;
    }
    
    .pagination .active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
    
    .icon {
        display: inline-block;
        padding: 8px;
        margin-right: 5px;
        font-size: 18px;
        color: #333;
        border: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .icon:hover {
        color: #007bff;
    }

    .icon i {
        font-size: 20px;
    }

    .icon i:hover {
        color: #007bff;
    }
</style>
    
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image: url({{ asset('assets_lp/images/img_bg_2.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Aksesoris</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-product">
    <div class="container">

        <div class="row">
            @foreach ($aksesoris as $produk)
                <div class="col-md-4 text-center animate-box">
                    <div class="product">
                        <div class="product-grid" style="background-image:url({{ asset('storage/' . $produk->images) }});">
                            <div class="inner">
                                <form id="cart-form-{{ $produk->id }}" action="/aksesoris/cart" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="accessory_id" value="{{ $produk->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="status" value="cart">
                                </form>
                                <p>
                                    @can('pelanggan')
                                    <a href="javascript:void(0)" class="icon" onclick="submitCartForm({{ $produk->id }})">
                                        <i class="icon-shopping-cart"></i>
                                    </a>
                                    @else
                                    <a href="/login" class="icon"><i class="icon-shopping-cart"></i></a>
                                    @endcan
                                    <a href="/aksesoris-detail/{{ $produk->id }}" class="icon"><i class="icon-eye"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                        <h3><a href="/aksesoris-detail/{{ $produk->id }}">{{ $produk->name }}</a></h3>
                            <span class="price">Rp {{ number_format($produk->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="pagination-wrapper mt-4">
            {{ $aksesoris->links() }}
        </div>
    </div>
</div>
<script>
    function submitCartForm(productId) {
        var form = document.getElementById('cart-form-' + productId);
        if (form) {
            form.submit();
        }
    }
</script>
@endsection
