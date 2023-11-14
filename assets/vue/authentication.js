const { createApp } = Vue;

createApp({
    data(){
        return{
            fullname: '',
            lastname: '',
            email: '',
            password: '',
            confirmPassword: '',
        }
    },
    methods:{
        login:function(){
            const vue = this;
            var data = new FormData();
            data.append("Method","login");
            data.append("email", vue.email);
            data.append("password", vue.password);
            axios.post('Backend/mainRoutes.php',data)
            .then(function(r){
                if(r.data == 1){
                    window.location.href = "frontend/index.php";
                }else if(r.data == 2){
                    window.location.href = "frontend/admin/index.php";
                }else{
                    alert("No data existed!");
                }
            });
        },
        register:function(){
            const vue = this;
            var data = new FormData();
            data.append("Method","register");
            data.append('fullname', vue.lastname +", "+ vue.fullname);
            data.append('email', vue.email);
            data.append('password', vue.password);
            axios.post('Backend/mainRoutes.php',data)
            .then(function(r){  
                if(r.data == 200){
                    window.location.href = "login.php";
                }else{
                    alert('Email is already registered');
                }
            });
        }
    },
    created:function(){

    }
}).mount('#authentication-vue')