<script lang="ts" setup>
import TaskItem from '@/components/TaskItem.vue';
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import Alert from '@/components/ui/alert/Alert.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tareas',
        href: '/dashboard',
    },
];

const props = defineProps<{
    page_result: any,
    flash: {
        success: string | null,
        message: string | null,
        error: string | null,
    },
}>()

const gotoCreateTask = () => {
    router.visit('/tasks/create')
}

const gotToEditTask = (task: any) => {
    router.visit(`/tasks/${task.id}/edit`)
}

const deleteTask = (task: any) => {
    if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) {
        router.delete(`/tasks/${task.id}`)
    }
}

const completeTask = (task: any) => {
    if (confirm('¿Estás seguro de que deseas completar esta tarea?')) {
        router.put(`/tasks/${task.id}`, { status: 'completed' })
    }
}
</script>
<template>

    <Head title="Tareas" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6">
            <!-- Alerta success -->
            <Alert :flash="props.flash"></Alert>
            <!-- Alerta error -->

            <Button @click="gotoCreateTask" class="mb-6">Crear tarea</Button>

            <div class="grid gap-4">
                <template v-for="(item, index) in page_result.data" :key="index">
                    <TaskItem :task="item" @delete="deleteTask" @complete="completeTask" @edit="gotToEditTask" />
                </template>

                <!-- Paginación -->
                <div class="flex justify-center items-center gap-6 mt-4 border-t pt-4">
                    <button @click="router.get(page_result.prev_page_url)"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2" :class="{
                            'opacity-50 cursor-not-allowed': page_result.current_page <= 1
                        }">
                        Anterior
                    </button>


                    <span class="ml-4">
                        Página {{ page_result.current_page }} de {{ page_result.last_page }}
                    </span>

                    <span class="ml-4">
                        Resultados: {{ page_result.total }}

                    </span>
                    <span class="ml-4">
                        Resultados por página: {{ page_result.per_page }}
                    </span>

                    <button @click="router.get(page_result.next_page_url)"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg ml-2" :class="{
                            'opacity-50 cursor-not-allowed': page_result.current_page >= page_result.last_page
                        }">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>