<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">My Tasks</h1>

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
      </li>
    </ul>
  </div>
</template>

<script setup>
defineProps({
  tasks: Array
});
</script>
