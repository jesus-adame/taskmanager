<script lang="ts" setup>
import Button from './ui/button/Button.vue';
import Select from './ui/select/Select.vue';

const { task } = defineProps(['task'])

const priorities = [
    { value: 'low', label: 'Baja' },
    { value: 'medium', label: 'Media' },
    { value: 'high', label: 'Alta' }
]
</script>
<template>
    <div class="bg-gray-100 p-4 text-black flex justify-between items-center rounded-lg border border-gray-300" :class="task.status === 'completed' ? 'bg-green-100' : task.status === 'pending' ? 'bg-gray-100' : ''
        ">
        <div class="">
            <h1 class="w-full font-bold">{{ task.title }}</h1>
            <div class="flex gap-4 items-center">
                <p>{{ task.description }}</p>
                <p>Estatus: {{ task.status }}</p>
                <p>Prioridad:</p>
                <div class="flex gap-2 items-center">
                    <span>
                        {{priorities.find(p => p.value === task.priority)?.label}}
                    </span>
                    <div>
                        <div class="w-4 h-4 rounded-full" :class="{
                            'bg-green-500': task.priority === 'low',
                            'bg-yellow-500': task.priority === 'medium',
                            'bg-red-500': task.priority === 'high'
                        }"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-4">
            <Button v-if="task.status != 'completed'" @click="$emit('complete', task)"
                variant="secondary">Completar</Button>
            <Button v-if="task.status != 'completed'" @click="$emit('edit', task)" variant="secondary">Editar</Button>
            <Button @click="$emit('delete', task)" variant="destructive">Borrar</Button>
        </div>
    </div>
</template>