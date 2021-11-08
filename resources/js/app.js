/**
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

// import vuex
const { default: store } = require('./store/index');

Vue.component('productSingleBody', require('./components/productComponents/productSingleBody.vue').default);
Vue.component('productDetails', require('./components/productComponents/productDetails.vue').default);
// Vue.component('blogList', require('./components/propsByblog/blogList.vue').default);
// Vue.component('pagination', require('laravel-vue-pagination'));


if(document.getElementById('productlist')){
    const app = new Vue({
        el: "#productlist",
        store,
    });
}

// if(document.getElementById('app')) {
//     const app = new Vue({
//         el: "#app",
//         created: function(){
//             this.get_latest_product();
//         },
//         data: function(){
//             return {
//                 products: {},
//                 pos_product_list: [],
//             }
//         },
//         methods: {
//             get_latest_product: function(page=1){
//                 $.get('/json/latest-products-json/6?page='+page, (res)=>{
//                     this.products = res;
//                 })
//             },
//             search_product: _.debounce(function(key){
//                 key.length > 0 ?
//                     $.get('/json/search-product-json/6/'+key, (res)=>{
//                         this.products = res;
//                     })
//                 :
//                     this.get_latest_product();
//             },500),
//             add_product_to_pos_list : function(product){
//                 let product_check = this.pos_product_list.find((item)=>item.id === product.id);

//                 if(product_check){
//                     product_check.qty++;
//                 }else{
//                     let pos_product = {
//                         id: product.id,
//                         name: product.name,
//                         image: product.thumb_image,
//                         price: product.price,
//                         qty: 1,
//                     }
//                     this.pos_product_list.unshift(pos_product);
//                 }
//             },
//             remove_pos_product: function(product){
//                 this.pos_product_list = this.pos_product_list.filter((item)=>item.id !== product.id);
//             },
//             update_pos_qty: function(product, qty){
//                 let check_product = this.pos_product_list.find((item)=>item.id === product.id);
//                 check_product.qty = qty;
//             },
//         },
//         computed: {
//             get_pos_total_price: function(){
//                 return this.pos_total_price = this.pos_product_list.reduce((total, product)=>{
//                     return total + (product.price * product.qty)
//                 },0);
//             }
//         }
//     });
// }

// if(document.getElementById('test')){
//     const app = new Vue({
//         el: '#test',
//         created: function(){
    
//         },
//         data: function(){
//             return{
//                 a: 10,
//                 b: 20,
//                 sum: 0,
//                 sub: 0,
//                 div: 0,
//             }
//         },
//         methods: {
//             calculate: function(){
//                 this.sum = +(this.a) + +(this.b);
//                 this.sub = +(this.a) - +(this.b);
//                 this.div = +(this.a) / +(this.b);
//             }
//         }
//     });
// }

