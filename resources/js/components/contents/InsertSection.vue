<template>
    <div class="mx-auto justify-center text-center w-full mt-2">
        <h1 class="text-center mt-10 text-2xl font-bold underline space-x-8">
            <span
                >{{ left_message }} <br />
                {{ isInsert.isInsert }}</span
            >
        </h1>
        <div class="border border-green-600 mt-2">
            <h2
                class="text-center text-xl font-semibold py-1 bg-green-600 text-white"
            >
                Insert Section
            </h2>
            <div>
                <form
                    class="flex flex-col space-y-4 p-4"
                    @submit.prevent="submitForm"
                >
                    <div class="flex flex-col space-y-2">
                        <label for="chapter">Chapter</label>
                        <input
                            type="text"
                            id="chapter"
                            name="chapter"
                            v-model="chapter"
                            class="border border-gray-300 p-2 rounded-md"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            v-model="title"
                            class="border border-gray-300 p-2 rounded-md"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="page">Page</label>
                        <input
                            type="text"
                            id="page"
                            name="page"
                            v-model="page"
                            class="border border-gray-300 p-2 rounded-md"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <button
                            type="submit"
                            class="bg-green-600 text-white p-2 rounded-md"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, toRefs } from "vue";
import axios from "axios";
export default {
    props: {
        isInsert: {
            type: Boolean,
        },
    },
    mounted() {
        // console.log(this.isInsert);
    },
    data(props) {
        return {
            chapter: "1",
            title: "something",
            page: "1",
            isInsert: props.isInsert,
        };
    },
    setup(props) {
        const { isInsert } = toRefs(props);
        isInsert.value = true;

        return {
            left_message: "Content's info and modified",
            isInsert,
        };
    },
    methods: {
        logPropValue() {
            const { isInsert } = toRefs(this.$props);
            isInsert.value = true;
            console.log(isInsert.value);
        },
        submitForm: function () {
            this.logPropValue();
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
                    Toastr.fire({
                        icon: "success",
                        title: "Content added successfully",
                    });
                    this.logPropValue();
                    location.reload();
                });
        },
    },
};
</script>
