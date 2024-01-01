<template>
  <tr class="border border-gray-400">
    <td class="border border-gray-400 px-5">{{ foodDetails.name }}</td>
    <td class="border border-gray-400 px-5">{{foodDetails.desc}}</td>
    <td class="border border-gray-400 px-5">
      <span v-show="foodDetails.isFavorite" class="bg-green-600 text-white rounded-xl px-2 font-medium text-xs uppercase">{{foodDetails.isFavorite}}</span>
      <span v-show="!foodDetails.isFavorite" class="bg-red-600 text-white rounded-xl px-2 font-medium text-xs uppercase">{{foodDetails.isFavorite}}</span>
    </td>
    <td class="border border-gray-400 px-5">
      <div class="w-10 h-6 bg-gray-300 rounded-xl p-[2px] cursor-pointer" @click="handleToggleBtn">
        <button :class="`h-5 w-5  rounded-full ${bgColor} ${toggleBtnclassName} transform transition-all duration-300`"></button>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["foodDetails"],
  data() {
    return {
      toggleBtnclassName: "",
      bgColor: "",
    };
  },
  mounted() {
    if(this.foodDetails.isFavorite){
      this.toggleBtnclassName = "ml-4";
      this.bgColor = "bg-green-600";
    }else{
      this.toggleBtnclassName = "";
      this.bgColor = "bg-red-600";
    }
  },
  methods: {
    handleToggleBtn() {
      this.toggleBtnclassName = this.foodDetails.isFavorite ? "" : "ml-4";
      this.bgColor = this.foodDetails.isFavorite ? "bg-red-600" : "bg-green-600";
      this.$emit("toggle-favorite", this.foodDetails);
    },
  },
};
</script>

<style></style>
