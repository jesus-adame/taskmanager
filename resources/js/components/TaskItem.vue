<script lang="ts" setup>
import Button from './ui/button/Button.vue';


const { task } = defineProps(['task'])
</script>
<template>
    <div class="bg-gray-200 p-4 text-black flex justify-between items-center rounded-lg">
        <div class="">
            <h1 class="w-full font-bold">{{ task.title }}</h1>
            <div class="flex gap-4 items-center">
                <p>{{ task.description }}</p>
                <p>Estatus: {{ task.status }}</p>
                <p>Prioridad: {{ task.priority }}</p>
            </div>
        </div>

        <Button @click="$emit('delete', task)">Borrar</Button>
    </div>
</template>