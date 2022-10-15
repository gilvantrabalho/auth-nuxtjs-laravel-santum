<template>
  <button :type="type" @click="click" :class="`btn ${classStyle}`">
    {{ title }}
  </button>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      required: true,
    },
    classStyle: {
      type: String,
      required: false,
    },
    click: {
      type: Function,
      required: false,
      default: () => {},
    },
  },
};
</script>