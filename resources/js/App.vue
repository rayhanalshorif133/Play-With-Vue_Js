<template>
    <div class="flex w-full">
        <div class="mx-auto justify-center text-center w-4/12 mt-2 mb-10">
            <h1
                class="text-center mt-10 text-2xl font-bold underline space-x-8"
            >
                <span>{{ left_message }}</span>
            </h1>
        </div>
        <div
            class="mx-auto justify-center text-center w-4/12 flex flex-col space-y-4 mt-2 mb-10"
        >
            <h1
                class="text-center mt-10 text-2xl font-bold underline space-x-8"
            >
                <span>{{ right_message }}</span>
            </h1>
            <table class="table">
                <thead class="bg-blue-200 h-8">
                    <tr>
                        <th>#</th>
                        <th>Chapter</th>
                        <th>Title</th>
                        <th>Page</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(item, index) in items"
                        :key="index"
                        :class="`cursor-pointer hover:bg-gray-300 ${
                            (index + 1) % 2 === 0 ? 'bg-gray-200' : ''
                        }`"
                    >
                        <td>{{ index + 1 }}</td>
                        <td>{{ item.chapter }}</td>
                        <td>{{ item.title }}</td>
                        <td>{{ item.page }}</td>
                        <td>
                            <button
                                @click="deleteItem(item.id)"
                                class="rounded-full h-6 w-6 bg-red-300 hover:bg-red-600 text-white"
                            >
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
import axios from "axios";
const items = ref([]);
export default {
    setup() {
        const count = ref(0);

        return {
            left_message: "Content\'s info and modified",
            right_message: "Table of Contents",
            count: count,
            items: items,
        };
    },
    mounted() {
        axios.get("/api/content").then((response) => {
            items.value = response.data.data;
        });
    },
    methods: {
        deleteItem: function (id) {
            axios.delete("/api/content/" + id);
            items.value = items.value.filter((item) => item.id !== id);
        },
    },
};
</script>
