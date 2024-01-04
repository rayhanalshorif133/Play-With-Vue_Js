<template>
    <div class="w-fit my-3 flex flex-col mx-auto justify-center shadow-sm space-y-4">
        <div class="flex ml-auto">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-1 px-4 rounded">
                Add New User
            </button>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="bg-gray-100 border text-left px-8 py-4">ID</th>
                    <th class="bg-gray-100 border text-left px-8 py-4">Name</th>
                    <th class="bg-gray-100 border text-left px-8 py-4">Email</th>
                    <th class="bg-gray-100 border text-left px-8 py-4">Created At</th>
                    <th class="bg-gray-100 border text-left px-8 py-4">Updated At</th>
                    <th class="bg-gray-100 border text-left px-8 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in 10" :key="item" :class="`hover:bg-gray-300 ${item %2 == 0 && 'bg-gray-200'}`">
                    <td class="border px-8 py-2">{{ item }}</td>
                    <td class="border px-8 py-2">John Doe</td>
                    <td class="border px-8 py-2">john.doe@gmail.com</td>
                    <td class="border px-8 py-2">2020-01-01</td>
                    <td class="border px-8 py-2">2020-01-01</td>
                    <td class="border px-8 py-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-1 px-4 rounded">
                            Edit
                        </button>
                        <button id="user-deleted" class="bg-red-500 hover:bg-red-700 text-white font-medium py-1 px-4 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
