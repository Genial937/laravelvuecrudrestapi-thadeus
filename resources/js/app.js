require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter)

import App from './App.vue';
import Home from './components/Home.vue';
import Supplier from './components/suppliers/Supplier';
import AddSupplier from './components/suppliers/AddSupplier';
import EditSupplier from './components/suppliers/EditSupplier';
import Products from './components/products/Products';
import AddProduct from './components/products/AddProduct';
import EditProduct from './components/products/EditProduct';
import Orders from './components/orders/Orders';
import AddOrder from './components/orders/AddOrder';
import SuppliedProduct from './components/SuppliedProducts/SuppliedProduct';
import AddSuppliedProduct from './components/SuppliedProducts/AddSuppliedProduct';
import OrderedProducts from './components/OrderedProducts/OrderedProducts';
import AddOrderDetail from './components/OrderedProducts/AddOrderDetail';
import OrderDetail from './components/OrderedProducts/OrderDetail'
import ViewSupply from './components/SuppliedProducts/ViewSupply'

// swert alert2
 import Vueswertalert2 from 'vue-sweetalert2'
 window.Swal = require('sweetalert2');
 Vue.use(Vueswertalert2);
 import utils from './helpers/utilities';
 Vue.prototype.$utils = utils;

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';

Vue.use(VueAxios,axios);

// routes
const routes = [
    {
        name: '/',
        path: '/',
        component: Home,
    },
   
    {
        name: 'suppliers',
        path: '/suppliers',
        component: Supplier,
    },
    {
        name: 'add_suppliers',
        path: '/add_suppliers',
        component: AddSupplier,
    },
    {
        name: 'edit_supplier',
        path: '/edit_supplier/edit/:id?',
        component: EditSupplier,
    },
    {
        name: 'products',
        path: '/products',
        component: Products,
    },
    {
        name: 'add_product',
        path: '/add_product',
        component: AddProduct,
    },
    {
        name: 'edit_product',
        path: '/edit_product/:id',
        component: EditProduct,
    },
    {
        name: 'orders',
        path: '/orders',
        component: Orders,
    },
    {
        name: 'add_order',
        path: '/add_order',
        component: AddOrder,
    },
    {
        name: 'supplied_products',
        path: '/supplied_products',
        component: SuppliedProduct,
    },
    {
        name: 'add_supplied_product',
        path: '/add_supplied_product',
        component: AddSuppliedProduct,
    },
    {
        name: 'view_supply',
        path: '/view_supply/:id',
        component: ViewSupply,
    },
    {
        name: 'ordered_products',
        path: '/ordered_products',
        component: OrderedProducts,
    },
    {
        name: 'add_ordered_products',
        path: '/add_ordered_products',
        component: AddOrderDetail,
    },
    {
        name: 'view_order_details',
        path: '/view_order_details/view/:id?',
        component: OrderDetail,
    },
]

const router = new VueRouter({mode: 'history',routes:routes});
const app = new Vue(Vue.util.extend({router},App)).$mount('#app');
