<template>
  <div>
    <h1 class="text-2xl font-bold mb-6">Edit Task</h1>
    <TaskForm :task="task" @submitted="handleSuccess" />
  </div>
</template>

<script setup>
import TaskForm from '@/Components/Tasks/TaskForm.vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: DefaultLayout })

defineProps({
  task: Object
})

function handleSuccess() {
  router.visit('/tasks')
}
</script>
