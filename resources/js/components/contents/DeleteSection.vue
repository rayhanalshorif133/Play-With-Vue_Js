<template>
    <div class="mx-auto justify-center text-center w-full mt-2">
        <h1 class="text-center mt-3 text-2xl font-bold underline space-x-8">
            <span></span>
        </h1>
        <div class="border border-red-600 mt-2">
            <h2
                class="text-center text-xl font-semibold py-1 bg-red-600 text-white"
            >
                Delete Section
            </h2>
            <div class="my-6">
                <button
                    @click="deleteAllBtn"
                    class="border border-red-600 text-red-600 hover:bg-red-600 hover:text-white px-5 py-1 rounded-md"
                >
                    Delete All <i class="fa-solid fa-trash mx-1"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
export default {
    setup() {
        const deleteAllBtn = () => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete("/api/content")
                        .then((response) => {
                            const {message, status } = response.data;
                            if (status === true) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: message,
                                    icon: "success",
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }else{
                                Swal.fire({
                                    title: "Error!",
                                    text: message,
                                    icon: "error",
                                });
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                title: "Error!",
                                text: error,
                                icon: "error",
                            });
                        });
                } else {
                    Swal.fire({
                        title: "Cancelled!",
                        text: "Your file is safe.",
                        icon: "error",
                    });
                }
            });
        };
        return {
            deleteAllBtn,
        };
    },
};
</script>
