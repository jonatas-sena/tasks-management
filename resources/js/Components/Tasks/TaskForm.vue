<template>
  <form @submit.prevent="submit">
    <div class="mb-4">
      <label class="block text-sm font-medium mb-1">Title</label>
      <input v-model="form.title" type="text" class="w-full border px-3 py-2 rounded" />
      <div v-if="form.errors.title" class="text-red-600 text-sm">{{ form.errors.title }}</div>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium mb-1">Description</label>
      <textarea v-model="form.description" class="w-full border px-3 py-2 rounded" rows="4"></textarea>
      <div v-if="form.errors.description" class="text-red-600 text-sm">{{ form.errors.description }}</div>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium mb-1">Status</label>
      <select v-model="form.status" class="w-full border px-3 py-2 rounded">
        <option disabled value="">Select a status</option>
        <option value="pending">Pending</option>
        <option value="in_progress">In Progress</option>
        <option value="done">Done</option>
      </select>
      <div v-if="form.errors.status" class="text-red-600 text-sm">{{ form.errors.status }}</div>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium mb-1">Priority</label>
      <select v-model="form.priority" class="w-full border px-3 py-2 rounded">
        <option disabled value="">Select a priority</option>
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
      </select>
      <div v-if="form.errors.priority" class="text-red-600 text-sm">{{ form.errors.priority }}</div>
    </div>

    <div class="mb-6">
      <label class="block text-sm font-medium mb-1">Due Date</label>
      <input v-model="form.due_date" type="date" class="w-full border px-3 py-2 rounded" />
      <div v-if="form.errors.due_date" class="text-red-600 text-sm">{{ form.errors.due_date }}</div>
    </div>

    <button
      type="submit"
      class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      :disabled="form.processing"
    >
      {{ props.task ? 'Update Task' : 'Create Task' }}
    </button>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const emit = defineEmits(['submitted'])

const props = defineProps({
  task: {
    type: Object,
    default: null
  }
})

const form = useForm({
  title: props.task?.title || '',
  description: props.task?.description || '',
  status: props.task?.status || '',
  priority: props.task?.priority || '',
  due_date: props.task?.due_date || '',
})

function submit() {
  const route = props.task
    ? `/tasks/${props.task.id}`
    : '/tasks'

  const method = props.task ? 'put' : 'post'

  form[method](route, {
    onSuccess: () => {
      form.reset()
      emit('submitted')
    }
  })
}
</script>
