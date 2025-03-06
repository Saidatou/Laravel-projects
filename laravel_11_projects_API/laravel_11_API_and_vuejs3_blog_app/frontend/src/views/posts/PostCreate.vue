<script setup lang="ts">
import axiosInstance from '@/lib/axios';
import router from '@/router';
import type { FormKitNode } from '@formkit/core';
import { AxiosError } from 'axios';

type PostForm={
    title:string;
    body:string;
};

const createPost = async (payload: PostForm, node?:FormKitNode) => {
    try {
        await axiosInstance.post("/dashboard/posts",payload);
        router.push("/dashboard/posts");
    } catch (e) {
        if(e instanceof AxiosError && e.response?.status === 422){
                node?.setErrors([], e.response?.data.errors)
            }  
    }
};

</script>
<template>
    <h1 class="text-3xl text-slate-900 p-4">Post Create</h1>

    <div class="max-w-[24em] mx-auto bg-slate-950 rounded-lg p-4">
        <FormKit
            type="form"
            submit-label="create"
            @submit="createPost"> 
            <FormKit type="text" label="Title" name="title"/>
            <FormKit type="textarea" label="Body" name="body"/>
        </FormKit> 
    </div>  
</template>