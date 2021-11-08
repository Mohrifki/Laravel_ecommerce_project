@extends('website.ecommerce.layouts.ecommerce')
@section('content')
    <div class="row" style="margin: 100px 0px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-2">
                                    <h3 class="text-uppercase">pos </h3>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" @keyup="search_product($event.target.value)" 
                                    placeholder="search Product" 
                                    class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <pagination :show-disabled = "true" :data="products" @pagination-change-page="get_latest_product">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4 mb-4" v-for="product in products.data" :key="product.id">
                                    <single-product-body 
                                        :product="product" 
                                        :add_product_to_pos_list= "add_product_to_pos_list">    
                                    </single-product-body>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>product</th>
                                                <th class="text-center">qty</th>
                                                <th class="text-right">price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="product in pos_product_list" :key= "product.id">
                                                <th>
                                                    <div class="d-flex">
                                                        <img :src="`/${product.image}`" style="height: 40px; padding-right: 5px;" alt="">
                                                        @{{ product.name }}
                                                    </div>
                                                </th>
                                                <td style="width: 145px;">
                                                    <div class="qty text-center">
                                                        <input
                                                        @change="update_pos_qty(product,$event.target.value)"
                                                        @keyup="update_pos_qty(product,$event.target.value)"
                                                            style="width: 50px" 
                                                            :value="product.qty" 
                                                            min="1"
                                                            type="number">
                                                        <i @click="update_pos_qty(product,1)" class="fa fa-recycle btn-sm btn-warning"></i>
                                                        <i @click="remove_pos_product(product)" class="fa fa-trash btn-sm btn-danger"></i>
                                                    </div>
                                                </td>
                                                <td style="width: 80px;" class="text-right"><h6>Rp.@{{ product.price * product.qty }}</h6></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-right">Total</th>
                                                <th class="text-right"><h6>Rp. @{{get_pos_total_price}}</h6></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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