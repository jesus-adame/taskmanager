<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Card from '@/components/ui/card/Card.vue';
import Select from '@/components/ui/select/Select.vue';
import { onMounted } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tareas',
        href: '/dashboard',
    },
];

const props = defineProps<{
    task: any,
    flash: {
        success: string | null,
        message: string | null,
        error: string | null,
    },
}>()

const priorities = [
    { value: 'low', label: 'Baja' },
    { value: 'medium', label: 'Media' },
    { value: 'high', label: 'Alta' }
]

const form = useForm({
    title: '',
    description: '',
    status: 'pending',
    priority: 'low'
})

const submit = () => {
    form.post('/tasks')
}

onMounted(() => {
    form.title = props.task.title
    form.description = props.task.description
    form.status = props.task.status
    form.priority = props.task.priority
})
</script>
<template>

    <Head title="Tareas" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6">
            <Card class="p-4">
                <form @submit.prevent="submit" class="grid gap-4">
                    <label for="">Nombre</label>
                    <Input v-model="form.title" class="block fluid" />
                    <div v-if="form.errors.title" class="text-red-600">{{ form.errors.title }}</div>
                    <label for="">Descripción</label>
                    <Input v-model="form.description" class="block fluid" />
                    <div v-if="form.errors.description" class="text-red-600">{{ form.errors.description }}</div>
                    <label for="">Prioridad</label>
                    <Select v-model="form.priority" class="block fluid">
                        <option v-for="priority in priorities" :key="priority.value" :value="priority.value">
                            {{ priority.label }}
                        </option>
                    </Select>
                    <div v-if="form.errors.priority" class="text-red-600">{{ form.errors.priority }}</div>

                    <Button type="submit">Guardar</Button>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>