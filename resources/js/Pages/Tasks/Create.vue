<template>
  <div>
    <h1 class="text-2xl font-bold mb-6">Create New Task</h1>

    <TaskForm @submitted="handleSuccess" />
  </div>
</template>

<script setup>
import TaskForm from '@/Components/Tasks/TaskForm.vue'
import { router } from '@inertiajs/vue3'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'

defineOptions({ layout: DefaultLayout })

function handleSuccess() {
  router.visit('/tasks', { method: 'get' })
}
</script>
