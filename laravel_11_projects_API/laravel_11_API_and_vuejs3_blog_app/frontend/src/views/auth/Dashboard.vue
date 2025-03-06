<script setup lang="ts">
import { useAuthStore } from '@/store/auth';
import { onMounted } from 'vue';





const auth = useAuthStore();
onMounted(() => {
    auth.getUser();
})


</script>

<template>
    <h1 class="text-3xl text-slate-900">Dashboard</h1>
    <div class="flex items-center justify-between">
        <div>
            <p class="text-lg text-slate-900"> Welcome back, {{ auth.user?.name }}</p>
            <p class="text-sm text-slate-900">{{ auth.user?.email }}</p>
        </div>
        <button @click="auth.logout" class="btn btn-primary">Logout</button>
    </div>
</template>