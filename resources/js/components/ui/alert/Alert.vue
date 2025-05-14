<script lang="ts" setup>

const props = defineProps<{
    flash: {
        success: string | null,
        message: string | null,
        error: string | null,
    },
}>()
</script>
<template>
    <div v-if="props.flash?.success"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold mr-2">Éxito!</strong>
        <span class="block sm:inline">{{ props.flash.success }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="props.flash.success = null">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path d="M10 9l5.5-5.5L17 5l-5.5 5.5L17 16l-1.5 1.5L10 10z" />
            </svg>
        </span>
    </div>
    <div v-if="props.flash?.message"
        class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold mr-2">Mensaje!</strong>
        <span class="block sm:inline">{{ props.flash.message }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="props.flash.message = null">
            <svg class="fill-current h-6 w-6 text-blue-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path d="M10 9l5.5-5.5L17 5l-5.5 5.5L17 16l-1.5 1.5L10 10z" />
            </svg>
        </span>
    </div>
    <div v-if="props.flash?.error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
        role="alert">
        <strong class="font-bold mr-2">Error!</strong>
        <span class="block sm:inline">{{ props.flash.error }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="props.flash.error = null">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path d="M10 9l5.5-5.5L17 5l-5.5 5.5L17 16l-1.5 1.5L10 10z" />
            </svg>
        </span>
    </div>
</template>