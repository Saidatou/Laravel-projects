<script setup lang="ts">
import axiosInstance from "@/lib/axios";
import { AxiosError } from "axios";
import { reactive } from "vue"

//because we are using typescrypt
interface RegisterForm{
    name:string;
    email:string;
    password:string;
    password_confirmation:string;
}

const form = reactive<RegisterForm>({
    name:"",
    email:"",
    password:"",
    password_confirmation:"", 
});

const errors = reactive({
    name:[],
    email:[],
    password:[],
});




const register = async (payload:RegisterForm)=>{
    await axiosInstance.get("/sanctum/csrf-cookie",{
        baseURL:"http://localhost:8000",
    });
    errors.name = [];
    errors.email = [];
    errors.password = [];
    try {
        await axiosInstance.post('/register', payload);
    } catch (e) {
        if(e instanceof AxiosError && e.response?.status === 422){
            errors.name = e.response.data.errors.name;
            errors.email = e.response.data.errors.email;
            errors.password = e.response.data.errors.password;
        }       
    }
};


</script>

<template>
    <!-- <h1 class="text-3xl text-slate-200 p-4">Register</h1> -->
    <h1 class="text-3xl text-slate-900 p-4">Register</h1>

    

    <form @submit.prevent="register(form)"
    class="max-w-sm mx-auto p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input 
            type="name" 
            id="name"
            v-model="form.name" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            placeholder="name" />
            <template v-if="errors.name?.length">
                <span
                 v-for="error in errors.name"
                 :key="error"
                  class="text-red-500 text-xs italic">
                    {{ error }}
                </span>
            </template>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
            <input 
            type="email" 
            id="email" 
            v-model="form.email" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            placeholder="name@flowbite.com" />
            <template v-if="errors.email?.length">
                <span
                 v-for="error in errors.email"
                 :key="error"
                  class="text-red-500 text-xs italic">
                    {{ error }}
                </span>
            </template>
        </div>
        
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input 
            type="password" 
            id="password"
            v-model="form.password"  
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
             />
             <template v-if="errors.password?.length">
                <span
                 v-for="error in errors.password"
                 :key="error"
                  class="text-red-500 text-xs italic">
                    {{ error }}
                </span>
            </template>
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Confirmation</label>
            <input 
            type="password" 
            id="password_confirmation" 
            v-model="form.password_confirmation" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
             />
        </div>

        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
    </form>

</template>