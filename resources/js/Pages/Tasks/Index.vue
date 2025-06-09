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

    <!-- Filters -->
    <div class="mb-6 bg-white p-4 rounded shadow">
      <h2 class="text-lg font-semibold mb-2">Filters</h2>
      <div class="flex flex-wrap gap-4">
        <input
            type="text"
            v-model="filters.search"
            @keyup.enter="applyFilters"
            placeholder="Search by title..."
            class="border rounded px-2 py-1 w-full sm:w-128"
        />

        <select v-model="filters.status" @change="applyFilters" class="border rounded px-2 py-1" style="padding-right: 30px;">
          <option value="">All Statuses</option>
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="done">Done</option>
        </select>

        <select v-model="filters.priority" @change="applyFilters" class="border rounded px-2 py-1" style="padding-right: 30px;">
          <option value="">All Priorities</option>
          <option value="low">Low</option>
          <option value="medium">Medium</option>
          <option value="high">High</option>
        </select>

        <input type="date" v-model="filters.dateFrom" @change="applyFilters" class="border rounded px-2 py-1" />
        <input type="date" v-model="filters.dateTo" @change="applyFilters" class="border rounded px-2 py-1" />
      </div>
    </div>
    
    <div v-if="tasks.length === 0" class="text-gray-500">
      No tasks found.
    </div>

    <ul v-else class="space-y-2">
      <li
        v-for="task in tasks.data"
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

    <div class="mt-6 flex flex-wrap gap-2">
        <Link
            v-for="link in tasks.links"
            :key="link.label"
            :href="link.url"
            v-html="link.label"
            :class="[
            'px-3 py-1 rounded border',
            link.active ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'
            ]"
            :disabled="!link.url"
        />
    </div>

  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import { useTaskFilterStore } from '@/Stores/taskFilterStore'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'

defineOptions({ layout: DefaultLayout })

defineProps({
  tasks: Object
})

const filters = useTaskFilterStore()

function applyFilters() {
  router.get('/tasks', filters.query, { preserveState: true, replace: true })
}
</script>
