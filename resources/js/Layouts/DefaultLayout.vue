<template>
  <div class="min-h-screen bg-gray-100 text-gray-800">
    <header class="bg-white shadow py-4 px-6 mb-6">
      <a href="/tasks">
        <h1 class="text-xl font-bold">Task Manager</h1>
      </a>
    </header>

    <main class="max-w-4xl mx-auto px-4">
      <slot />
    </main>
  </div>
</template>

<script setup></script>
