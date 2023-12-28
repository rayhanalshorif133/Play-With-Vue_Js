<template>
    <div class="flex w-full">
        <InsertSection :isInsert="{isInsert}"/>
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
                        <th class="w-10">#</th>
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
                        <td class="space-x-2">
                            <button
                                @click="deleteItem(item.id)"
                                class="rounded-full h-7 w-7 bg-blue-300 hover:bg-blue-600 text-white"
                            >
                                <i class="fa-solid fa-pen-to-square text-[12px]"></i>
                            </button>
                            <button
                                @click="deleteItem(item.id)"
                                class="rounded-full h-7 w-7 bg-red-300 hover:bg-red-600 text-white"
                            >
                                <i class="fa-solid fa-xmark text-[12px]"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import InsertSection from "./InsertSection.vue";
import { ref } from "vue";
import axios from "axios";
const items = ref([]);
export default {

    components: {
        "InsertSection": InsertSection,
    },

    setup() {
        const count = ref(0);
        const isInsert = ref(false);

        return {
            left_message: "Content's info and modified",
            right_message: "Table of Contents",
            count: count,
            items: items,
            isInsert: isInsert,
        };
    },
    data() {
        this.fetch();
    },
    methods: {
        fetch: function () {
            axios.get("/api/content").then((response) => {
                items.value = response.data.data;
            });
        },
        deleteItem: function (id) {
            axios.delete("/api/content/" + id);
            items.value = items.value.filter((item) => item.id !== id);
        },
        submitForm: function () {
            axios
                .post("/api/content", {
                    chapter: this.chapter,
                    title: this.title,
                    page: this.page,
                })
                .then((response) => {
                    this.chapter = "";
                    this.title = "";
                    this.page = "";
                    this.fetch();
                    Toastr.fire({
                        icon: "success",
                        title: "Content added successfully",
                    });
                });
        },
    },
};
</script>
