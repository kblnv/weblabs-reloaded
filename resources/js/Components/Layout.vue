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
import { initStorage } from "@src/Utils/storage.js";

export default {
  components: {
    Navbar,
  },
  mounted() {
    initStorage();
  }
}
</script>