<template>
  <div>
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">My Tasks</h1>
      <Link
        href="/tasks/create"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        + Create Task
      </Link>
    </div>

    <div v-if="$page.props.flash.success" class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-300">
        {{ $page.props.flash.success }}
    </div>

    <div v-if="tasks.length === 0" class="text-gray-500">
      No tasks found.
    </div>

    <ul v-else class="space-y-2">
      <li
        v-for="task in tasks"
        :key="task.id"
        class="border p-4 rounded shadow-sm bg-white"
      >
        <h2 class="text-lg font-semibold">{{ task.title }}</h2>
        <p class="text-sm text-gray-600">{{ task.description }}</p>
        <p class="text-xs text-gray-500">
          Status: {{ task.status }} | Priority: {{ task.priority }}
        </p>
        <Link
            :href="`/tasks/${task.id}/edit`"
            class="text-sm text-blue-600 hover:underline"
        >
            Edit
        </Link>

      </li>
    </ul>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'

defineOptions({ layout: DefaultLayout })

defineProps({
  tasks: Array
})
</script>
