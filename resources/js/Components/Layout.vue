<template>
  <main>
    <header>
      <Navbar />
    </header>

    <slot />
  </main>
</template>
<script>
import Navbar from "./Navbar.vue";

export default {
  components: {
    Navbar,
  }  
}
</script>