@extends('website.ecommerce.layouts.ecommerce')
@section('content')
    <div class="row" style="margin: 100px 0px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-uppercase">pos </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="product-wrapper bl">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="http://127.0.0.1:8000/contents/website/img/product/5.jpg" alt="" class="primary">
                                                <img src="http://127.0.0.1:8000/contents/website/img/product/6.jpg" alt="" class="secondary">
                                            </a>
                                            <div class="product-icon c-fff home3-hover-bg">
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Add to cart"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-comments"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Accumsan eli"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content home3-hover">
                                            <h3><a href="#">Name</a></h3>
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li> 
                                            </ul>
                                            <span>Rp. 70.0000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table table-bordered">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection


{{-- @extends('website.ecommerce.layouts.ecommerce')
@section('content')
    <div class="row" style="margin: 100px 0px;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <input-vue :value="12" :color1="'red'" :color2="'blue'" :color3="'green'"></input-vue>
                        <input-vue :value="13" :color1="'black'" :color2="'pink'" :color3="'gray'"></input-vue>
                        <input-vue :value="14" :color1="'yellow'" :color2="'purple'" :color3="'tomato'"></input-vue>
                    </div>
                    <div class="card-header">
                        <h5>Cart amount: @{{total_cart_product}}</h5>
                        <h5>Cart uniq product: @{{cart_products.length}}</h5>
                        <h5>Cart total: $ @{{cart_total_price}}</h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li v-for="(product,key) in products" style="border: 1px solid black; padding: 20px;" class="shadow shadow-sm my-4 d-block">
                                        <div>
                                            <p>@{{product.name}} - @{{product.price}}</p>
                                            <button type="button" @click="set_cart(product)" class="btn btn-sm btn-success">add to cart</button>
                                            <button type="button"  @click="set_modal_product(product)" data-toggle="modal" data-target="#productViewModal" class="btn btn-sm btn-warning">view product</button>
                                        </div>
                                        <div class="clerfix"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    {{-- @foreach ($collection as $key=>$item)
                                        <li></li>
                                    @endforeach
                                    <li v-for="(cart_product, index) in cart_products">
                                        <i class="fa fa-trash fa-2x btn btn-danger" @click="remove_cart(cart_product)"></i>
                                        @{{cart_product.name}} x @{{cart_product.qty}} = @{{cart_product.price * cart_product.qty}}
                                    </li>
                                </ul>
                            </div>
                            <div class="modal fade" id="productViewModal" tabindex="-1" aria-labelledby="productViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productViewModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img :src="'/'+modal_view_product.thumb_image" alt="">
                                            <h4>product name : @{{modal_view_product.name}}</h4>
                                            <h4>product price : @{{modal_view_product.price}}</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}