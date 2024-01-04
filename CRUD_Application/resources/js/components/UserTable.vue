<template>
    <div class="w-full">
        <Header />
        <Table />
    </div>
</template>

<script>
import Header from "./user/Header.vue";
import Table from "./user/Table.vue";
export default {
    components: {
        Header,
        Table,
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
