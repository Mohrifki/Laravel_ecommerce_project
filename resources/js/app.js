/**
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('home-section', require('./components/homeSection.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if(document.getElementById('app')) {
    const app = new Vue({
        el: "#app",
        created: function(){
            $.get('/json/latest-products-json/6', (res)=>{
                console.log(res);
                this.products = res.data;
            })
        },
        data: function(){
            return {
                products: [

                ]
            }
        }
    });
}

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

