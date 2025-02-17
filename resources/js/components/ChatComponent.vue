<template>
  <div>
    <h1>Chat</h1>
    <input v-model="message" placeholder="Type a message">
    <button @click="sendMessage">Send</button>
    <ul>
      <li v-for="msg in messages" :key="msg">{{ msg }}</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const message = ref('')
const messages = ref([])

onMounted(() => {
  console.log('Listening on Channel2x for Event2x...')
  window.Echo.channel('Channel2x')
    .listen('.Event2x', (e) => {
      console.log('Event received:', e)
      try {
        const eventData =e.message;
        console.log('Parsed data:', eventData)
        messages.value.push(eventData)
        alert(eventData)
      } catch (error) {
        console.error('Failed to parse event data:', e.data, error)
      }
    })
}) 


function sendMessage() {
  // implement send message logic here
  console.log('Send message:', message.value)
}
</script>
