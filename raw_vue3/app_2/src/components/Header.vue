<template>
    <nav class="bg-sky-800">
        <h1 class="text-2xl text-white font-semibold text-center py-5">
            {{ title }}
        </h1>
    </nav>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true,
        },
    },
};
</script>

<style>

</style>