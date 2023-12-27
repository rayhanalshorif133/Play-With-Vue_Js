<template>
    <content-container></content-container>
</template>
<script>
import Content from "./components/contents/Index.vue";
import { ref } from "vue";
import axios from "axios";
const items = ref([]);
// eslint-disable-next-line
export default {
    components: {
        "content-container": Content,
    },

    setup() {
        const count = ref(0);

        return {
            left_message: "Content's info and modified",
            right_message: "Table of Contents",
            count: count,
            items: items,
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
