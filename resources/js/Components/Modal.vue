<template>
  <div v-show="modalIsActive" class="modal">
    <div class="modal__content">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modalIsActive: false,
    };
  },
  methods: {
    openModal() {
      this.modalIsActive = true;
    },
    closeModal() {
      this.modalIsActive = false;
    },
  },
};
</script>

<style lang="scss" scoped>
.modal {
  display: flex;
  flex-direction: column;

  justify-content: center;
  align-items: center;

  position: fixed;
  z-index: 3;

  width: 100%;
  height: 100%;

  top: 0;
  left: 0;

  background-color: rgba(0, 0, 0, 0.6);

  &__content {
    padding: 20px 30px;
    background-color: #1b1b1b;
    border-radius: 8px;
  }
}
</style>
