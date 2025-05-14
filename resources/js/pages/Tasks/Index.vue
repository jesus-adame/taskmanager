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
    tasks: any,
    flash: {
        success: string | null,
        message: string | null,
        error: string | null,
    },
}>()

const gotoCreateTask = () => {
    router.visit('/tasks/create')
}

const deleteTask = (task: any) => {
    if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) {
        router.delete(`/tasks/${task.id}`)
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
                <template v-for="(item, index) in tasks.data" :key="index">
                    <TaskItem :task="item" @delete="deleteTask" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>