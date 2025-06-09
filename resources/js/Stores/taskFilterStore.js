import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useTaskFilterStore = defineStore('taskFilters', () => {
  const status = ref(null)
  const priority = ref(null)
  const dateFrom = ref(null)
  const dateTo = ref(null)
  const search = ref('')

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
    reset
  }
})
