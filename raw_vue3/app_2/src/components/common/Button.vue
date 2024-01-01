<template>
  <a
    :class="`block font-medium ${bgColor} py-1 px-2 cursor-pointer rounded-md text-white hover:${hoverBgColor}`"
  >
    <i :class="icon"></i>
  </a>
</template>

<script>
export default {
  props: ["icon", "bgColor","hoverBgColor"],
  data() {
    return {};
  },
  methods: {},
};
</script>

<style></style>
