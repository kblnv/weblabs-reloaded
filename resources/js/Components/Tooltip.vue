<template>
  <div
    @mouseenter="openTooltip"
    @mouseleave="closeTooltip"
    class="tooltip-container"
  >
    <slot />

    <Transition name="fade">
      <div v-if="tooltipIsActive" class="tooltip fade-element">
        <span class="text">{{ text }}</span>
      </div>
    </Transition>
  </div>
</template>

<script>
const DELAY_MS = 500;

export default {
  props: {
    text: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      tooltipIsActive: false,
      timeoutId: -1,
    };
  },
  methods: {
    openTooltip() {
      this.timeoutId = setTimeout(() => {
        this.tooltipIsActive = true;
      }, DELAY_MS);
    },
    closeTooltip() {
      clearTimeout(this.timeoutId);
      setTimeout(() => {
        this.tooltipIsActive = false;
      }, DELAY_MS);
    },
  },
};
</script>

<style lang="scss" scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}
.tooltip-container {
  position: relative;
  display: inline-block;

  .tooltip {
    position: absolute;
    z-index: 2;

    width: 240px;

    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);

    padding: 5px 5px;
    text-align: center;

    color: #ffffff;
    background-color: #1b1b1b;

    border-radius: 8px;
  }

  .fade-element {
    animation: fadeIn 0.5s forwards;
  }

  .fade-leave-to {
    animation: fadeOut 0.5s forwards;
  }

  .text::after {
    position: absolute;

    top: 100%;
    left: 50%;

    content: "";

    margin-left: -5px;
    border-width: 5px;

    border-style: solid;
    border-color: #ffffff transparent transparent transparent;
  }
}
</style>
