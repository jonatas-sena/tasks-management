import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useTaskFilterStore = defineStore('taskFilters', () => {
  const status = ref('')
  const priority = ref('')
  const dateFrom = ref('')
  const dateTo = ref('')
  const search = ref('')

  const query = computed(() => {
    const q = {}
    if (status.value) q.status = status.value
    if (priority.value) q.priority = priority.value
    if (dateFrom.value) q.date_from = dateFrom.value
    if (dateTo.value) q.date_to = dateTo.value
    if (search.value) q.search = search.value
    return q
  })

  function reset() {
    status.value = null
    priority.value = null
    dateFrom.value = null
    dateTo.value = null
    search.value = ''
  }

  return {
    status,
    priority,
    dateFrom,
    dateTo,
    search,
    query,
    reset
  }
})
