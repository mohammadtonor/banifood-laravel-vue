/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import swal from "sweetalert";

require('./bootstrap');

window.Vue = require('vue');
import Swal from 'sweetalert2'
import {id} from "../../public/dist/vendors/typeahead/handlebars-v4.5.3";
import {timer} from "../../public/dist/vendors/c3/d3.v5.min";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data:{
        locationName:"",
        parent_id:"",
        locations:[],
        basketItems:[],
        itemReserved:[],
        menu_id:"",
        menuRemove_id:"",
        show:true,
        location_id:"",
        showLocEdit:true,
        editLocationMenu:"",
        editLocationOrder:"",
        getMenu:[],
        checkDate:"",
        checkMeal:"",
        subTotalBasket:0,
        second:0,
        minute:0,
        hour:0,
        primaryTime:10800,
        timer:'03:00:00'
    },
    mounted:function (){
        this.getLocations();
        this.showBasket();
        this.showPayForm();
        this.showEditForm();
        this.showMenu();
        this.subTotal()
    },
    created:function() {
        //this.addToBasket();
        this.collapsed();
        //this.showPayForm();
        this.getOrderReserved();
    },
    methods:{
        addLocation:function () {
           axios.post('/admin/locationcreate',{
                title:this.locationName,
                parent_id:this.parent_id,
           }).then(response => {
               console.log(response.data)
                swal('با موفقیت ثبت شد!!!');
           },response =>{
               console.log('error');
           });
        },

        getLocations:function (){
            axios.get('/admin/getLocation').then(response => {
                this.locations = response.data
            });
            setTimeout(this.getLocations,2000);
        },

        showBasket:function (){
            axios.get('/getbasket').then(response => {
                this.basketItems = response.data;

            });
            setTimeout(this.showBasket,1000);
            setTimeout(this.subTotal,1000);
        },
        addToBasket:function ($id){
            axios.post('/addBasket',{
                menu_id:$id,
            }).then( response => {

            }, response =>{

            });


        },

        deleteFromBasket:function (id){
            axios.post('/deleteBasket',{
                menuRemove_id:id,
            }).then( response => {

            }, response =>{

                console.log(response.data);
            });
        },
        checkItemBasket:function (id){
            for(let i=0;i < this.basketItems.length ; i++)
            {
                if (this.basketItems[i].id == id) {
                    swal('تکراری !!!1');
                    return;
                }

            }
            for(let i=0;i < this.itemReserved.length ; i++)
            {
                if (this.itemReserved[i].id == id) {
                    swal('تکراری !!!1');
                    return;
                }

            }
            for(let i=0;i < this.getMenu.length ; i++)
            {
                if (this.getMenu[i].id == id) {
                   this.checkDate = this.getMenu[i].date;
                   this.checkMeal = this.getMenu[i].meal_id;
                }

            }
            for(let i=0;i < this.basketItems.length ; i++)
            {
                if (this.basketItems[i].date == this.checkDate && this.basketItems[i].meal_id == this.checkMeal) {
                    swal('وعده غذایی تکراااااارییییییی !!!');
                    return;
                }

            }
            this.addToBasket(id);
        },
        showPayForm:function (){
            console.log(this.location_id)
            if (this.show){
                $("#paymethod").hide();
                $("#LocationForm").show();
                this.show = false;
            }else {
                let text = $("#locationslc :selected").text();
                $("#locationseleced").text(text);
                console.log(text);
                $("#paymethod").show();
                $("#LocationForm").hide();
                this.show=true;
            }
        },
        showEditForm:function (order, menu){
            this.editLocationOrder = order;
            this.editLocationMenu = menu;
            if (this.showLocEdit){
                $("#showlocform").hide();
                this.showLocEdit=false;
            }
            else {
                $("#showlocform").show();
                this.showLocEdit = true;
            }
        },

        collapsed:function ()
        {
            return $("#collapse").click();
        },

        editLocReserve:function (){
           axios.post('/order/edit',{
               order_id : this.editLocationOrder,
               menu_id: this.editLocationMenu,
               location_id:this.location_id
           }).then(response => {

           },response => {

           })
        },

        deleteLocReserve:function (order, menu){
            this.editLocationOrder = order;
            this.editLocationMenu = menu.id;
            let newdate =  new Date(menu.date).getTime();
            let now = Date.now();
            const oneDay = 1000 * 60 * 60 * 24
            let diffInDayTime = now - newdate
            let diffInDay = Math.round(diffInDayTime/oneDay)
            if (diffInDay < 1 ){
                axios.post('/order/delete',{
                    order_id : this.editLocationOrder,
                    menu_id: this.editLocationMenu,
                }).then(response => {
                    swal('با موفقیت حذف گردید!!');
                },response => {
                    swal(response);
                });
            }
           else{
               swal('محدودیت زمانی')
            }
        },
        getOrderReserved:function (){
            axios.get('/itemsReserved').then(response => {
                this.itemReserved = response.data;
            });
            setTimeout(this.getOrderReserved,1000);
        },

        showMenu:function (){
            axios.get('/getMenu').then(response => {
                this.getMenu = response.data;
            });
            setTimeout(this.showMenu,1000);

        },



        calculateTimer:function (){

            setInterval( ()=>{
                if (this.primaryTime>0){
                    this.timer = this.filterTime()
                    --this.primaryTime
                }else{

                }
            },1000)
        },

        prettyTime:function (){
            let time = this.primaryTime/3600
            let hour = parseInt(time)
            let baseMinute = (time - hour) * 60
            let minute = parseInt(baseMinute)
            let second = Math.round(( baseMinute -  minute ) * 60)
            return hour + ':' + minute + ':' + second
        },

        filterTime:function () {
            let value = this.prettyTime()
            let data = value.split(':')
            let hour = "0" + data[0]
            let minute = data[1]
            let second = data[2]
            if (minute < 10){
                minute = "0" + minute
            }
            if (second < 10 ){
                second = "0" + second
            }
            return hour + ':' + minute + ':' + second
        },

        subTotal:function (){
            let TotalBasket = 0
            for (let i = 0; i < this.basketItems.length ; i++){
                 TotalBasket += this.basketItems[i].price
            }
            this.subTotalBasket = TotalBasket
        }

    },
});
